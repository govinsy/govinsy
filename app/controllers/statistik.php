<?php 

class statistik extends Controller {

    // Lokasi definisi di config/config.php
    public $url = URL;
    public $field = FIELD;

    public function index()
    {   
        // Lokasi method getJSON di core/Controller.php
        // Kasus Covid-19 Indonesia
        $kasus = $this->getJSON($this->url['covid_ind']);

        // Kasus Covid-19 Provinsi
        $provinsi = $this->getJSON($this->url['covid_prov']);

        // Daftar Domain Provinsi
        $domain = $this->getJSON($this->url['bps_domain'], $this->field['key']['bps_key'] . $this->field['type']['prov']);

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Daftar Statistik';
        $data['indo'] = $kasus; // kasus covid se-indonesia
        $data['prov'] = $provinsi['list_data']; // kasus covid-19 per-provinsi
        $data['domain'] = $domain['data'][1]; // daftar domain provinsi

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