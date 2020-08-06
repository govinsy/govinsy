<?php

// Lokasi method getJSON di core/Controller.php
// Lokasi daftar url dan field di config/config.php

class berita extends Controller
{

    public function index()
    {
        // Kasus Covid-19 Indonesia
        $berita = $this->getJSON($this->url['newsapi'], $this->field['key']['newsapi_key']);

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Berita';
        $data['berita'] = $berita['articles']; // berita covid se-indonesia

        // Views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar');
        $this->view('berita/index', $data);
        $this->view('templates/footer');
    }
}
