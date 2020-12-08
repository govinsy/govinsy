<?php

namespace App\Controllers;

class PagesController extends BaseController
{
	public function home()
	{
		$data['judul'] = 'Home';
		$data['page'] = 'Home'; //Digunakan untuk indikator di Sidebar
		echo view('pages/home', $data);
    }

    public function berita()
    {
        // Kasus Covid-19 Indonesia
        $newsapi = $this->urlModel->where(['name' => 'newsapi'])->first();
        $berita = $this->getJSON($newsapi['url'] . $newsapi['key']);

        // Daftar variable yang bisa digunakan di /views/statistik/index.php
        $data['judul'] = 'Berita';
        $data['page'] = 'Berita'; //Digunakan untuk indikator di Sidebar
        $data['berita'] = $berita['articles']; // berita covid se-indonesia

        // Views
        echo view('berita/index', $data);
    }
    
    public function tentang()
	{
		$data['judul'] = 'Tentang Kami';
		$data['page'] = 'Tentang Kami'; //Digunakan untuk indikator di Sidebar
		echo view('pages/tentang', $data);
	}
}
