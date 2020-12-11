<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation(); //Deklarasi objek validation yang akan digunakan di form validation
    }

    public function login()
    {
        $data['title'] = 'Masuk Govinsy';
        $data['page'] = 'Masuk Govinsy';
        $data['validation'] = $this->validation;
        
        echo view('users/login', $data);
    }

    public function check()
    {
        $validation = $this->validate([
            'email' =>
            [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Silahkan isi email anda',
                    'valid_email' => 'Gunakan email anda yang valid',
                ]
            ],
            'password' => 'required',
        ]);

        if ($validation) {
            $user = $this->userModel->where('email', $this->request->getVar('email'))->first();
            if ($user > 0) {
                if (password_verify($this->request->getVar('password'), $user['password'])) {
                    $this->userModel
                        ->set('is_active', 1)
                        ->set('last_login', Time::now())
                        ->where('id', $user['id'])
                        ->update();
                    session()->set([
                        'login' => true,
                        'profile' => $user
                    ]);
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Password salah, harap masukkan password yang benar</div>');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar silahkan daftar terlebih dahulu</div>');
                return redirect()->back()->withInput();
            }
        }
    }

    public function logout()
    {
        $this->userModel
            ->set('is_active', 0)
            ->set('last_login', Time::now())
            ->where('id', session()->get('profile')['id'])
            ->update();
        session()->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        $data['validation'] = $this->validation;
        $data['page'] = [];
        $data['title'] = 'Daftar Govinsy';

        echo view('users/register', $data);
    }

    public function create()
    {
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => ['required' => 'Silahkan isi nama anda']
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Silahkan isi email anda',
                    'valid_email' => 'Gunakan email anda yang valid',
                    'is_unique' => 'Email yang anda masukkan sudah terdaftar silahkan gunakan email anda yang lain'
                ]
            ],
            'password1' => [
                'rules' => 'required|matches[password2]|min_length[8]',
                'errors' => [
                    'required' => 'Silahkan isi password anda',
                    'matches' => 'Password anda masukkan tidak cocok dengan confirm password',
                    'min_length' => 'Password yang anda masukkan minimal harus 8 karakter'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password1]',
                'errors' => [
                    'required' => 'Silahkan isi password anda',
                    'matches' => 'Password yang anda masukkan tidak cocok dengan password',
                ]
            ],
        ]);

        if ($validation) {
            $this->userModel->save([
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'created_at' => Time::now()
            ]);
            session()->set([
                'login' => true,
                'profile' => $this->userModel->where('email', $this->request->getVar('email'))->first()
                ]);
            $this->userModel
                ->set('is_active', 1)
                ->set('last_login', Time::now())
                ->where('id', session()->get('profile')['id'])
                ->update();
            session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Selamat anda berhasil mendaftar</div> ');
            return redirect()->to('/');
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal mendaftar</div> ');
            return redirect()->back()->withInput();
        }
    }

    public function profile()
    {
        $data['title'] = 'Profile Pengguna';
        $data['page'] = 'Profile';

        //Ganti gambar
        if (isset($_POST['crop'])) {
            $this->pengguna_model->editProfile();
        }
        //End ganti gambar

        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('pengguna/profile', $data);
        echo view('templates/footer');
    }

    //Method set gambar profile pengguna menjadi default
    public function removepic()
    {
        $this->pengguna_model->removeImage();
        header('location:' . base_url() . '/pengguna/profile');
    }
}
