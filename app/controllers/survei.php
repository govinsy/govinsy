<?php 

class survei extends Controller {
    public function index()
    {
        $data['judul'] = 'Survei Govinsy';
        $this->view('templates/header', $data);
        $this->view('survei/index', $data);
        $this->view('templates/footer');
    }
}