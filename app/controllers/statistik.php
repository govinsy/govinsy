<?php 

class statistik extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Statistik';
        // $data['stat'] = $this->model('Statistik')->getAllStatistik();
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