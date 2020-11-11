<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['judul'] = 'Home';
		$data['page'] = 'Home'; //Digunakan untuk indikator di Sidebar
		echo view('templates/header', $data);
		echo view('templates/sidebar', $data);
		echo view('templates/topbar', $data);
		echo view('home/index', $data);
		echo view('templates/footer');
	}
}
