<?php

namespace App\Controllers;

// Lokasi method getJSON di core/Controller.php
// Lokasi daftar url dan field di config/config.php

class Berita extends BaseController
{

    public function index()
    {
        // Kasus Covid-19 Indonesia
        $berita = $this->getJSON($this->url['newsapi'], $this->field['key']['newsapi_key']);

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Berita';
        $data['page'] = 'Berita'; //Digunakan untuk indikator di Sidebar
        $data['berita'] = $berita['articles']; // berita covid se-indonesia

        // Views
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('berita/index', $data);
        echo view('templates/footer');
    }
}
