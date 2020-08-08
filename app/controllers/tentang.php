<?php

class tentang extends Controller
{
    public function index()
    {
        $data['judul'] = 'Tentang Kami';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('tentang/index', $data);
        $this->view('templates/footer');
    }
}
