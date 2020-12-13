<?php

namespace App\Controllers;

class PagesController extends BaseController
{
	public function home()
	{
		$data['title'] = 'Home';
		$data['page'] = 'Home'; //Digunakan untuk indikator di Sidebar
		echo view('pages/home', $data);
    }

    public function news()
    {
        // Berita Covid-19 Indonesia
        $newsapi = $this->urlModel->where(['name' => 'newsapi'])->first();
        $news = $this->getJSON($newsapi['url'] . $newsapi['key']);

        if (empty($news)) {
            $news['articles'] = [];
        }

        $data['title'] = 'Berita';
        $data['page'] = 'Berita'; //Digunakan untuk indikator di Sidebar
        $data['news'] = $news['articles']; // berita covid se-indonesia

        // Views
        echo view('pages/news', $data);
    }
    
    public function about()
	{
		$data['title'] = 'Tentang Kami';
        $data['page'] = 'Tentang Kami'; //Digunakan untuk indikator di Sidebar
        $data['visitor'] = $this->agentModel->countAll();
		echo view('pages/about', $data);
	}
}
