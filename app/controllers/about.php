<?php 

class about extends Controller {
    public function index()
    {
        $data['judul'] = 'Tentang Govinsy';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}




