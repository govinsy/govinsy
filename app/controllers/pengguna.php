<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation(); //Deklarasi objek validation yang akan digunakan di form validation
    }
    public function login()
    {

        // Validasi pengguna
        if (isset($_POST['login'])) {

            // Mengambil data pengguna dari database
            $pengguna = $this->pengguna_model->getAllPengguna();

            if ($this->validate([
                'email' =>
                [
                    'rules'                  => 'required|valid_email',
                    'errors'                => [
                        'required'       => 'Silahkan isi email anda',
                        'valid_email'  => 'Gunakan email anda yang valid',
                    ]
                ],
                'password' => 'required',
            ])) {

                $emailFound = false;
                foreach ($pengguna as $p) {
                    if ($p['email'] == $_POST['email']) { //Cek email yang terdaftar di database
                        if ($p['password'] == md5($_POST['password'])) { //Cek password 
                            $_SESSION['login']       = true;
                            $_SESSION['profile']    = $this->pengguna_model->getPenggunaById($p['id']);
                            header("Location: " . base_url());
                            exit;
                        } else {
                            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Password salah, harap masukkan password yang benar</div> ');
                        }
                        $emailFound = true;
                    }
                }
                if ($emailFound == false) {
                    session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar silahkan daftar terlebih dahulu</div> ');
                }
                return redirect()->back()->withInput(); //Refresh page dengan menyertakan inputan data
            }
        }

        $data['judul']              = 'Masuk Govinsy';
        $data['page']              = 'Masuk Govinsy';
        $data['validation']     = $this->validation;


        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('pengguna/login', $data);
        echo view('templates/footer', $data);
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

            //Deklarasi data validasi [rules]
            $validasi = $this->validate([
                'nama'         => [
                    'rules'        => 'required',
                    'errors'      => ['required' => 'Silahkan isi nama anda']
                ],
                'email'         => [
                    'rules'         => 'required|valid_email|is_unique[pengguna.email]',
                    'errors'       => [
                        'required'        => 'Silahkan isi email anda',
                        'valid_email'   => 'Gunakan email anda yang valid',
                        'is_unique'      => 'Email yang anda masukkan sudah terdaftar silahkan gunakan email anda yang lain'
                    ]
                ],
                'password1' => [
                    'rules'          => 'required|matches[password2]|min_length[8]',
                    'errors'        => [
                        'required'        => 'Silahkan isi password anda',
                        'matches'        => 'Password anda masukkan tidak cocok dengan confirm password',
                        'min_length'  => 'Password yang anda masukkan minimal harus 8 karakter'
                    ]
                ],
                'password2' => [
                    'rules'         => 'required|matches[password1]',
                    'errors'       => [
                        'required'        => 'Silahkan isi password anda',
                        'matches'        => 'Password yang anda masukkan tidak cocok dengan password',
                    ]
                ],
            ]);
            //End deklarasi data validasi [rules]

            if ($validasi) {

                if ($this->pengguna_model->tambahPengguna($_POST)  == true) {
                    session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Selamat anda berhasil mendaftar</div> ');
                    $_SESSION['login']       =   true;
                    $_SESSION['profile']    =   $this->pengguna_model->getPenggunaByEmail($_POST['email']);
                    header('location: ' . base_url());
                    exit;
                } else {
                    session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal mendaftar</div> ');
                    return redirect()->back()->withInput();
                }
            }
            return redirect()->back()->withInput();
        }

        $data['validation']  = $this->validation;
        $data['judul']           = 'Daftar Govinsy';
        $data['page']           = 'Daftar User';


        echo view('templates/header', $data);
        echo view('pengguna/daftar', $data);
        echo view('templates/footer', $data);
    }


    public function profile()
    {
        $data['validation']   = $this->validation;
        $data['judul']            = 'Profile Pengguna';
        $data['page']            = 'Profile';

        //Ganti gambar
        if (isset($_POST['crop'])) {
            $this->pengguna_model->editProfile();
        }
        //End ganti gambar

        if (isset($_POST['edit'])) {
            //Deklarasi data validasi [rules]
            $validasi = $this->validate([
                'nama' => [
                    'rules'     => 'required',
                    'errors'   => ['required' => 'Silahkan isi nama anda']
                ]
            ]);
            //End deklarasi data validasi [rules]

            if ($validasi) {

                if ($this->pengguna_model->editPengguna()  == true) {
                    session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Selamat anda berhasil mengubah data anda</div> ');
                    return redirect()->back();
                } else {
                    session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal mengubah profile</div> ');
                    return redirect()->back();
                }
            }
        }



        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('pengguna/profile', $data);
        echo view('templates/footer', $data);
    }

    //Method set gambar profile pengguna menjadi default
    public function removepic()
    {
        $this->pengguna_model->removeImage();
        header('location:' . base_url() . '/pengguna/profile');
    }
    //End method set gambar

    public function gantiTema()
    {
        $idUser                 = $_POST['userID'];
        $userTema           = $_POST['userTema'];
        $this->pengguna_model->ganti_tema();
    }



    // public function getubah()
    // {
    //     echo json_encode($this->model('Statistik')->getStatistikById($_POST['id']));
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
