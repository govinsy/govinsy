<?php

namespace App\Controllers;

class Tentang extends BaseController
{
    public function index()
    {
        $data['judul'] = 'Tentang Kami';
        $data['page'] = 'Tentang Kami'; //Digunakan untuk indikator di Sidebar
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('tentang/index', $data);
        echo view('templates/footer');
    }

    public function glosarium()
    {
        $data['judul'] = 'Glosarium';
        $data['page'] = 'Glosarium'; //Digunakan untuk indikator di Sidebar
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('tentang/glosarium', $data);
        echo view('templates/footer');
    }
}
