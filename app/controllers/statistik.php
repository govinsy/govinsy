<?php

// Lokasi method getJSON di core/Controller.php
// Lokasi daftar url dan field di config/config.php

class statistik extends Controller
{

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

        // XLS Eksperimen
        try {
            $statictable = $this->excelToArray(__DIR__ . '/../../public/img/Indo_13_7729776.xls');
        } catch (Exception $e) {
            echo json_decode("['error' => " . $e->getMessage() . "]");
        }

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Statistik';
        $data['indo'] = $kasus; // kasus covid se-indonesia
        $data['prov'] = $provinsi['list_data']; // kasus covid-19 per-provinsi
        $data['domain'] = $domain['data'][1]; // daftar domain provinsi
        !empty($indicators) ? $data['indicators'] = $indicators : $data['indicators'] = []; // strategic indocators
        $data['statictable'] = $statictable; // masih experimen

        // Diagram
        $data['dayone']['date'] = [];
        $data['dayone']['confirmed'] = [];
        $data['dayone']['recovered'] = [];
        $data['dayone']['deaths'] = [];
        $data['dayone']['active'] = [];
        for ($i = 0; $i < count($dayone); $i++) {
            array_push($data['dayone']['date'], date('M j', strtotime($dayone[$i]['Date'])));
            array_push($data['dayone']['confirmed'], $dayone[$i]['Confirmed']);
            array_push($data['dayone']['recovered'], $dayone[$i]['Recovered']);
            array_push($data['dayone']['deaths'], $dayone[$i]['Deaths']);
            array_push($data['dayone']['active'], $dayone[$i]['Active']);
        }

        // Views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('statistik/index', $data);
        $this->view('templates/footer');
    }
}
