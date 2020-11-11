<?php

class pengguna extends Controller
{
    public function login()
    {
        // Mengambil data pengguna dari database
        $pengguna = $this->model('pengguna_model')->getAllPengguna();

        // Validasi pengguna
        if (isset($_POST['login'])) {
            $emailFound = false;
            foreach ($pengguna as $p) {
                if ($p['email'] == $_POST['email']) {
                    if ($p['password'] == md5($_POST['password'])) {
                        $_SESSION['login'] = true;
                        $_SESSION['profile'] = $this->model('pengguna_model')->getPenggunaById($p['id']);
                        header("Location: " . BASEURL);
                        exit;
                    } else {
                        Flasher::setFlash('gagal', 'password salah', 'danger');
                    }
                    $emailFound = true;
                }
            }
            if ($emailFound == false) {
                Flasher::setFlash('gagal', 'email belum terdaftar', 'danger');
            }
        }

        $data['judul'] = 'Masuk Govinsy';
        $data['page'] = 'Masuk Govinsy';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pengguna/login', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        setcookie('id', '', time() - 3600);
        setcookie('key', '', time() - 3600);

        header("Location: " . BASEURL);
        exit;
    }

    public function daftar()
    {
        if (isset($_POST['daftar'])) {
            if ($this->model('pengguna_model')->tambahPengguna($_POST) > 0) {
                Flasher::setFlash('berhasil', 'anda berhasil mendaftar', 'success');
            } else {
                Flasher::setFlash('gagal', 'gagal mendaftar', 'danger');
            }
        }

        $data['judul'] = 'Daftar Govinsy';
        $this->view('templates/header', $data);
        $this->view('pengguna/daftar', $data);
        $this->view('templates/footer');
    }

    public function profile()
    {
        $data['judul'] = 'Profile Pengguna';
        $data['page'] = 'Profile';
        if (isset($_POST['crop'])) {

            $this->model('pengguna_model')->editProfile();
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pengguna/profile', $data);
        $this->view('templates/footer');
    }
    public function removepic()
    {
        $this->model('pengguna_model')->removeImage();
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
