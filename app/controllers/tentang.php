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
    public function policy()
    {
        $data['judul'] = 'Privacy Policy';
        $data['page'] = 'Privacy Policy';//Digunakan untuk indikator di Sidebar
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('tentang/privacy_policy', $data);
        $this->view('templates/footer');
    }
}
