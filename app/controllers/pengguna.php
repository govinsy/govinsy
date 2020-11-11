<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    public function login()
    {
        // Mengambil data pengguna dari database
        $pengguna = $this->pengguna_model->getAllPengguna();

        // Validasi pengguna
        if (isset($_POST['login'])) {
            $emailFound = false;
            foreach ($pengguna as $p) {
                if ($p['email'] == $_POST['email']) {
                    if ($p['password'] == md5($_POST['password'])) {
                        $_SESSION['login'] = true;
                        $_SESSION['profile'] = $this->pengguna_model->getPenggunaById($p['id']);
                        header("Location: " . base_url());
                        exit;
                    } else {
                        // Flasher::setFlash('gagal', 'password salah', 'danger');
                    }
                    $emailFound = true;
                }
            }
            if ($emailFound == false) {
                // Flasher::setFlash('gagal', 'email belum terdaftar', 'danger');
            }
        }

        $data['judul'] = 'Masuk Govinsy';
        $data['page'] = 'Masuk Govinsy';
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('pengguna/login', $data);
        echo view('templates/footer');
    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);

        header("Location: " . base_url());
        exit;
    }

    public function daftar()
    {
        if (isset($_POST['daftar'])) {
            if ($this->pengguna_model->tambahPengguna($_POST)  == true) {
                // Flasher::setFlash('berhasil', 'anda berhasil mendaftar', 'success');
                header('location: ' . base_url() . '/pengguna/login');
                exit;
            } else {
                // Flasher::setFlash('gagal', 'gagal mendaftar', 'danger');
                header('location: ' . base_url() . '/pengguna/daftar');
                exit;
            }
        }

        $data['judul'] = 'Daftar Govinsy';
        echo view('templates/header', $data);
        echo view('pengguna/daftar', $data);
        echo view('templates/footer');
    }

    public function profile()
    {
        $data['judul'] = 'Profile Pengguna';
        $data['page'] = 'Profile';
        if (isset($_POST['crop'])) {

            $this->pengguna_model->editProfile();
        }
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('pengguna/profile', $data);
        echo view('templates/footer');
    }
    public function removepic()
    {
        $this->pengguna_model->removeImage();
        header('location:' . base_url() . '/pengguna/profile');
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
    //         header('Location: ' . base_url() . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'ditambahkan', 'danger');
    //         header('Location: ' . base_url() . '/statistik');
    //         exit;
    //     }
    // }

    // public function hapus($id)
    // {
    //     if( $this->model('Statistik')->hapusDataStatistik($id) > 0 ) {
    //         Flasher::setFlash('berhasil', 'dihapus', 'success');
    //         header('Location: ' . base_url() . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'dihapus', 'danger');
    //         header('Location: ' . base_url() . '/statistik');
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
    //         header('Location: ' . base_url() . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'diubah', 'danger');
    //         header('Location: ' . base_url() . '/statistik');
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
