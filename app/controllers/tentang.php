<?php

class tentang extends Controller
{
    public function index()
    {
        $data['judul'] = 'Tentang Kami';
        $data['page'] = 'Tentang Kami';//Digunakan untuk indikator di Sidebar
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('tentang/index', $data);
        $this->view('templates/footer');
    }


     public function agree()
    {
        $data['judul'] = 'User Agreement';
        $data['page'] = 'User  Agreement';//Digunakan untuk indikator di Sidebar
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('tentang/user_agreement', $data);
    }
       
}
