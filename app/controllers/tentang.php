<?php 

class tentang extends Controller {
    public function index()
    {
        $data['judul'] = 'Tentang Govinsy';
        $this->view('templates/header', $data);
        $this->view('tentang/index', $data);
        $this->view('templates/footer');
    }
}




