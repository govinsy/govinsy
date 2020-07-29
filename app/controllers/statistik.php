<?php 

// Lokasi method getJSON di core/Controller.php
// Lokasi daftar url dan field di config/config.php

class statistik extends Controller {
    
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
        $strategic = $this->getJSON($this->url['bps_strategic'], $this->field['key']['bps_key'] . $this->field['model']['indicators'] .'domain=' . $no_domain);

        // Data Covid Dari Hari 1
        $dayone = $this->getJSON($this->url['covid_dayone']);

        // XLS Eksperimen
        try {
            $statictable = $this->excelToArray(__DIR__ . '/../../public/img/Indo_13_7729776.xls');
        } catch (Exception $e) {
            echo json_decode("['error' => " . $e->getMessage(). "]");
        }

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Daftar Statistik';
        $data['indo'] = $kasus; // kasus covid se-indonesia
        $data['prov'] = $provinsi['list_data']; // kasus covid-19 per-provinsi
        $data['domain'] = $domain['data'][1]; // daftar domain provinsi
        !empty($strategic['data'][1]) ? $data['strategic'] = $strategic['data'][1] : $data['strategic'] = []; // strategic indocators
        $data['statictable'] = $statictable;
        
        $data['dayone']['confirmed'] = [];
        $data['dayone']['date'] = [];
        for ($i=0; $i < count($dayone); $i++) { 
            array_push($data['dayone']['confirmed'], $dayone[$i]['Confirmed']);
        }
        for ($i=0; $i < count($dayone); $i++) { 
            array_push($data['dayone']['date'], date('j,', strtotime($dayone[$i]['Date'])));
        }

        // Views
        $this->view('templates/header', $data);
        $this->view('statistik/index', $data);
        $this->view('templates/footer');
        
    }



    // public function detail($id)
    // {
    //     $data['judul'] = 'Detail Statistik';
    //     $data['mhs'] = $this->model('Statistik')->getStatistikById($id);
    //     $this->view('templates/header', $data);
    //     $this->view('statistik/detail', $data);
    //     $this->view('templates/footer');
    // }

    // public function tambah()
    // {
    //     if( $this->model('Statistik')->tambahDataStatistik($_POST) > 0 ) {
    //         Flasher::setFlash('berhasil', 'ditambahkan', 'success');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'ditambahkan', 'danger');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     }
    // }

    // public function hapus($id)
    // {
    //     if( $this->model('Statistik')->hapusDataStatistik($id) > 0 ) {
    //         Flasher::setFlash('berhasil', 'dihapus', 'success');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'dihapus', 'danger');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     }
    // }

    // public function getubah()
    // {
    //     echo json_encode($this->model('Statistik')->getStatistikById($_POST['id']));
    // }

    // public function ubah()
    // {
    //     if( $this->model('Statistik')->ubahDataStatistik($_POST) > 0 ) {
    //         Flasher::setFlash('berhasil', 'diubah', 'success');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'diubah', 'danger');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } 
    // }

    // public function cari()
    // {
    //     $data['judul'] = 'Daftar Statistik';
    //     $data['mhs'] = $this->model('Statistik')->cariDataStatistik();
    //     $this->view('templates/header', $data);
    //     $this->view('statistik/index', $data);
    //     $this->view('templates/footer');
    // }

}