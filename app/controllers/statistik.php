<?php

// Lokasi method getJSON di core/Controller.php
// Lokasi daftar url dan field di config/config.php

class Statistik extends Controller
{

    public function __construct()
    {
        set_time_limit(500);
    }
    public function index()
    {
        // Set Session Nomor Domain dan Nama Provinsi
        !empty($_POST['prov']) ? $_SESSION['prov'] = $_POST['prov'] : NULL;
        !empty($_POST['domain']) ? $_SESSION['domain'] = $_POST['domain'] : NULL;
        !empty($_SESSION['domain']) ? $no_domain = $_SESSION['domain'] : $no_domain = NULL;

        // Kasus Covid-19 Indonesia
        $kasus = $this->getJSON($this->url['covid_ind']);

        // Kasus Covid-19 Provinsi
        $provinsi = $this->getJSON($this->url['covid_prov']);

        // Daftar Domain Provinsi
        $domain = $this->getJSON($this->url['bps_domain'], $this->field['key']['bps_key'] . $this->field['type']['prov']);

        // Strategic Indicators
        $strategic = $this->getJSON($this->url['bps_strategic'], $this->field['key']['bps_key'] . $this->field['model']['indicators'] . 'domain=' . $no_domain);
        $indicators = [];
        // mengambil semua data tanpa per-page
        if (!empty($strategic['data'][0]['pages'])) {
            $pages = $strategic['data'][0]['pages'];
            for ($i = 1; $i <= $pages; $i++) {
                $indicators[$i] = $this->getJSON($this->url['bps_strategic'], $this->field['key']['bps_key'] . $this->field['model']['indicators'] . 'domain=' . $no_domain . '&page=' . $i);
            }
        }

        // Data Covid Dari Hari 1
        $dayone = $this->getJSON($this->url['covid_dayone']);

        // Survei
        try {
            $jmlJP = $this->model('survei_model')->countJawabanPengguna();
            $survei = $this->model('survei_model')->getAllJawabanPengguna();
            $pertanyaan = $this->model('survei_model')->getAllPertanyaan();
            $jawaban = $this->model('survei_model')->getAllJawaban();
            $pengguna = $this->model('pengguna_model')->getAllPengguna();
            $data['pertanyaan'] = $pertanyaan;
            $data['jawaban'] = $jawaban;
            $data['hasil_survei'] = [];
            foreach ($survei as $s) {
                array_push($data['hasil_survei'], $s['id_jawaban']);
            }
            $data['hasil_survey'] = array_count_values($data['hasil_survei']);
        } catch (Exception $e) {
            echo json_decode("['error' => " . $e->getMessage() . "]");
        }

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Daftar Statistik';
        $data['page'] = 'Statistik'; //Digunakan untuk indikator di Sidebar
        $data['indo'] = $kasus; // kasus covid se-indonesia
        $data['prov'] = $provinsi['list_data']; // kasus covid-19 per-provinsi
        $data['domain'] = $domain['data'][1]; // daftar domain provinsi
        !empty($indicators) ? $data['indicators'] = $indicators : $data['indicators'] = []; // strategic indocators

        // Diagram
        $data['dayone']['date'] = [];
        $data['dayone']['confirmed'] = [];
        $data['dayone']['recovered'] = [];
        $data['dayone']['deaths'] = [];
        $data['dayone']['active'] = [];
        if (isset($dayone)) {
            for ($i = 0; $i < count($dayone); $i++) {
                array_push($data['dayone']['date'], date('M j', strtotime($dayone[$i]['Date'])));
                array_push($data['dayone']['confirmed'], $dayone[$i]['Confirmed']);
                array_push($data['dayone']['recovered'], $dayone[$i]['Recovered']);
                array_push($data['dayone']['deaths'], $dayone[$i]['Deaths']);
                array_push($data['dayone']['active'], $dayone[$i]['Active']);
            }
        }

        // Views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('statistik/index', $data);
        $this->view('templates/footer');
    }



    public function provinsi()
    {
        // Cek keterdediaan parameter GET
        if (empty($_GET['domain_id']) || empty($_GET['nama_provinsi'])) {
            header("Location: " . BASEURL);
            exit;
        }

        /// Ambil JSON ///

        // Kasus Covid-19 Per Provinsi
        $provinsi = $this->getJSON($this->url['covid_prov']);
        //Ambil Data Satistik Sesuai domain ID di url 
        $strategic = $this->getJSON($this->url['bps_strategic'], $this->field['key']['bps_key'] . $this->field['model']['indicators'] . 'domain=' . $_GET['domain_id']);
        // Data Rumah Sakit Rujukan
        $hospital = $this->getJSON($this->url['hospital']);
        // Deskripsi Provinsi
        $provdesc = $this->getJSON($this->url['provdesc']);

        /// End Ambil JSON ///


        // Mencari Nama Provinsi yang tidak valid dari key $provinsi
        function namaProvinsiValid($nama_prov, $subject_prov)
        {
            $nama_prov = str_replace('.', '', $nama_prov);
            $nama_prov = explode(' ', $nama_prov);
            if (strlen($nama_prov[0]) <= 3) {
                return strpos($subject_prov, $nama_prov[1]);
            } else return false;
        }
        // End Cari nama Provinsi


        //Ambil Data COVID 19 Sesuai Nama Provinsi di url
        // @param ambil dari JSON provinsi
        function ambilDataProvinsi($provinsi)
        {
            if (isset($provinsi)) {
                for ($i = 0; $i < count($provinsi['list_data']); $i++) {
                    if ($provinsi['list_data'][$i]['key'] == strtoupper($_GET['nama_provinsi'])) {
                        return $provinsi['list_data'][$i];
                    } elseif (namaProvinsiValid(strtoupper($_GET['nama_provinsi']), $provinsi['list_data'][$i]['key'])) {
                        return $provinsi['list_data'][$i];
                    }
                }
            }
        }
        // End Ambil Data


        $stat = [
            'jumlah_penduduk' => ['value' => null],
            'penduduk_miskin' => ['value' => null],
            'pengangguran' => ['value' => null],
            'impor' => ['value' => null],
            'ekspor' => ['value' => null],
            'triwulan' => ['value' => null],
            'harapan_hidup' => ['value' => null],
            'inflasi' => ['value' => null],
        ];
        //Ambil Data Strategic indicator sesuai title (Karena indicator id per provinsi berbeda)
        if (isset($strategic)) {
            for ($i = 0; $i < count($strategic['data'][1]); $i++) {
                if (strstr($strategic['data'][1][$i]['title'], 'Jumlah Penduduk')) {
                    $stat['jumlah_penduduk'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Persentase Penduduk')) {
                    $stat['penduduk_miskin'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Pengangguran')) {
                    $stat['pengangguran'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Impor')) {
                    $stat['impor'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Ekspor')) {
                    $stat['ekspor'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Ekonomi Triwulan')) {
                    $stat['triwulan'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Angka Harapan Hidup')) {
                    $stat['harapan_hidup'] = $strategic['data'][1][$i];
                } elseif (strstr($strategic['data'][1][$i]['title'], 'Inflasi')) {
                    $stat['inflasi'] = $strategic['data'][1][$i];
                }
            }
        }

        $desc = [];
        // Deskripsi provinsi
        foreach ($provdesc as $p) {
            if ($p['Provinsi'] == $_GET['nama_provinsi']) {
                $desc["pulau"] = $p["Pulau"];
                $desc["provinsi"] = $p["Provinsi"];
                $desc["singkatan"] = $p["Singkatan"];
                $desc["ibu_kota"] = $p["Ibu kota"];
                $desc["diresmikan"] = $p["Diresmikan"];
                $desc["populasi"] = $p["Populasi"];
                $desc["luas_total"] = $p["Luas Total"];
                $desc["populasi_per_luas"] = $p["Populasi / Luas"];
                $desc["apbd"] = $p["APBD 2014 (miliar rupiah)"]; 
                $desc["prdb"] = $p["PDRB 2014 (triliun rupiah)"];
                $desc["prdb_per_kapita"] = $p["PDRB per kapita 2014 (juta rupiah)"];
                $desc["ipm"] = $p["IPM 2014"];
            }
        }

        $data['stat'] = $stat; //Data Strategic Indicator
        $data['covid'] = ambilDataProvinsi($provinsi); //Data COVID 19 Provinsi
        $data['judul'] = "Data Provinsi " . $_GET['nama_provinsi'];
        $data['page'] = 'Statistik'; //Digunakan untuk indikator di Sidebar
        $data['hospital'] = $hospital; // Rumah sakit rujukan
        $data['provdesc'] = $desc; // Deskirpsi provinsi

        //Views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('statistik/data_provinsi', $data);
        $this->view('templates/footer');
    }
}
