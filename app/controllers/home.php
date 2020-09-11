<?php

class home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['page'] = 'Home';//Digunakan untuk indikator di Sidebar
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
