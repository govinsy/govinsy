<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

// Lokasi method getJSON di BaseController.php
// Lokasi daftar url dan field di BaseController.php

class StatisticsController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Daftar Statistik';
        $data['page'] = 'Statistik';
        $data['domain'] = base_url('/StatisticsController/domain');
        $data['covid_id'] = base_url('/StatisticsController/covid_id');
        $data['covid_dayone'] = base_url('/StatisticsController/covid_dayone');
        $data['covid_prov'] = base_url('/StatisticsController/covid_prov');
        $data['surveys'] = base_url('/StatisticsController/surveys');

        return view('statistics/index', $data);
    }

    public function domain()
    {
        $domains = $this->urlModel->where(['name' => 'bps_domain'])->first();
        $data['domains'] = $this->getJSON($domains['url'] . $domains['key']);
        echo view('statistics/domain', $data);
    }

    public function covid_id()
    {
        $covid_id = $this->urlModel->where(['name' => 'covid_id'])->first();
        $data['covid_id'] = $this->getJSON($covid_id['url']);
        echo view('statistics/covid_id', $data);
    }

    public function covid_dayone()
    {
        $covid_dayone = $this->urlModel->where(['name' => 'covid_dayone'])->first();
        $covid_dayone = $this->getJSON($covid_dayone['url']);

        $data['covid_dayone']['date'] = [];
        $data['covid_dayone']['confirmed'] = [];
        $data['covid_dayone']['recovered'] = [];
        $data['covid_dayone']['deaths'] = [];
        $data['covid_dayone']['active'] = [];
        if (isset($covid_dayone)) {
            for ($i = 1; $i < count($covid_dayone); $i++) {
                array_push($data['covid_dayone']['date'], date('M j', strtotime($covid_dayone[$i]['Date'])));
                array_push($data['covid_dayone']['confirmed'], $covid_dayone[$i]['Confirmed'] - $covid_dayone[$i-1]['Confirmed']);
                array_push($data['covid_dayone']['recovered'], $covid_dayone[$i]['Recovered'] - $covid_dayone[$i-1]['Recovered']);
                array_push($data['covid_dayone']['deaths'], $covid_dayone[$i]['Deaths'] - $covid_dayone[$i-1]['Deaths']);
                array_push($data['covid_dayone']['active'], $covid_dayone[$i]['Active']);
            }
        }
        
        echo view('statistics/covid_dayone', $data);
    }

    public function surveys()
    {
        $data['surveys'] = $this->surveyModel->findAll();
        $data['questions'] = $this->questionModel->findAll();
        $answers = $this->answerModel->findAll();
        $data['answers'] = $answers;
        $user_answers = $this->userAnswerModel->findAll();
        $data['user_answers'] = [];
        foreach ($user_answers as $ua) { array_push($data['user_answers'], $ua['answer_id']); }
        $data['user_answers'] = array_count_values($data['user_answers']);
        
        echo view('statistics/surveys', $data);
    }

    public function prov()
    {
        $domain = $this->request->getVar('domain');
        $prov_name = $this->request->getVar('prov');
        // Cek keterdediaan parameter GET
        if (empty($domain) || empty($prov_name)) {
            return redirect()->back();
        }
        
        /// Ambil JSON ///

        // Kasus Covid-19 Per Provinsi
        $covid_prov = $this->urlModel->where(['name' => 'covid_prov'])->first();
        $covid_prov = $this->getJSON($covid_prov['url']);
        //Ambil Data Satistik Sesuai domain ID di url 
        $strategic = $this->urlModel->where(['name' => 'bps_strategic'])->first();
        $strategic = $this->getJSON($strategic['url'] . $strategic['key'] . '&domain=' . $domain);
        // Data Rumah Sakit Rujukan
        $hospitals = $this->urlModel->where(['name' => 'hospitals'])->first();
        $hospitals = $this->getJSON($hospitals['url']);
        // Deskripsi Provinsi
        // $prov_desc = $this->urlModel->where(['name' => 'prov_desc'])->first();
        // $prov_desc = $this->getJSON($prov_desc['url']);
        
        /// End Ambil JSON ///
        
        // Mencari Nama Provinsi yang tidak valid dari key $covid_prov
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
        // @param ambil dari JSON covid_prov
        function ambilDataProvinsi($covid_prov, $prov_name)
        {
            if (isset($covid_prov)) {
                for ($i = 0; $i < count($covid_prov['list_data']); $i++) {
                    if ($covid_prov['list_data'][$i]['key'] == strtoupper($prov_name)) {
                        return $covid_prov['list_data'][$i];
                    } elseif (namaProvinsiValid(strtoupper($prov_name), $covid_prov['list_data'][$i]['key'])) {
                        return $covid_prov['list_data'][$i];
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
        //Ambil Data Strategic indicator sesuai title (Karena indicator id per covid_prov berbeda)
        if (isset($strategic['data'][1])) {
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

        // $desc = [];
        // // Deskripsi covid_prov
        // foreach ($prov_desc as $p) {
        //     if ($p['Provinsi'] == $_GET['nama_provinsi']) {
        //         $desc = [
        //             'pulau' => $p["Pulau"],
        //             'covid_prov' => $p["Provinsi"],
        //             'singkatan' => $p["Singkatan"],
        //             'ibu_kota' => $p["Ibu kota"],
        //             'diresmikan' => $p["Diresmikan"],
        //             'populasi' => $p["Populasi"],
        //             'luas_total' => $p["Luas Total"],
        //             'populasi_per_luas' => $p["Populasi / Luas"],
        //             'apbd' => $p["APBD 2014 (miliar rupiah)"],
        //             'prdb' => $p["PDRB 2014 (triliun rupiah)"],
        //             'prdb_per_kapita' => $p["PDRB per kapita 2014 (juta rupiah)"],
        //             'ipm' => $p["IPM 2014"]
        //         ];
        //     }
        // }

        $data['title'] = "Data Provinsi " . $prov_name;
        $data['page'] = 'Statistik'; //Digunakan untuk indikator di Sidebar
        $data['domain'] = $domain;
        $data['prov_name'] = $prov_name;
        $data['stat'] = $stat; //Data Strategic Indicator
        $data['covid'] = ambilDataProvinsi($covid_prov, $prov_name); //Data COVID 19 Provinsi
        $data['hospitals'] = $hospitals;

        //Views
        echo view('statistics/prov', $data);
    }

    public function covid_prov()
    {
        $covid_prov = $this->urlModel->where(['name' => 'covid_prov'])->first();
        $covid_prov = $this->getJSON($covid_prov['url']);

        $covid = [
            'highest' => array_slice($covid_prov['list_data'], 0, 5),
            'lowest' => array_slice($covid_prov['list_data'], -5, 5),
            'male' => 0,
            'female' => 0,
            'age' => [
                '0-5' => 0,
                '6-18' => 0,
                '19-30' => 0,
                '31-45' => 0,
                '46-59' => 0,
                '>= 60' => 0
            ]
        ];

        foreach ($covid_prov['list_data'] as $cp) {
            $covid['male'] = $covid['male'] + $cp['jenis_kelamin'][0]['doc_count'];
            $covid['female'] = $covid['female'] + $cp['jenis_kelamin'][1]['doc_count'];
            $covid['age']['0-5'] = $covid['age']['0-5'] + $cp['kelompok_umur'][0]['doc_count'];
            $covid['age']['6-18'] = $covid['age']['6-18'] + $cp['kelompok_umur'][1]['doc_count'];
            $covid['age']['19-30'] = $covid['age']['19-30'] + $cp['kelompok_umur'][2]['doc_count'];
            $covid['age']['31-45'] = $covid['age']['31-45'] + $cp['kelompok_umur'][3]['doc_count'];
            $covid['age']['46-59'] = $covid['age']['46-59'] + $cp['kelompok_umur'][4]['doc_count'];
            $covid['age']['>= 60'] = $covid['age']['>= 60'] + $cp['kelompok_umur'][5]['doc_count'];
        }

        $data['covid'] = $covid;
        echo view('statistics/covid_prov', $data);
    }
}
