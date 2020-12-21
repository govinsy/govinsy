<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		// Kasus Covid-19 Indonesia
		$kasus = $this->getJSON($this->url['covid_ind']);

		// Kasus Covid-19 Provinsi
		$provinsi = $this->getJSON($this->url['covid_prov']);

		// Daftar Domain Provinsi
		$domain = $this->getJSON($this->url['bps_domain'], $this->field['key']['bps_key'] . $this->field['type']['prov']);

		// Kasus Covid-19 Indonesia
		$berita = $this->getJSON($this->url['newsapi'], $this->field['key']['newsapi_key'] . "&pageSize=4");

		$covProv = [];
		// Mencari Nama Provinsi yang tidak valid dari key $provinsi
		function namaProvinsiValid($nama_prov, $subject_prov)
		{
			$nama_prov = str_replace('.', '', $nama_prov);
			$nama_prov = explode(' ', $nama_prov);
			if (strlen($nama_prov[0]) <= 3) {
				return strpos($subject_prov, $nama_prov[1]);
			} else return false;
		}
		// End Cari nama Provinsi


		//Ambil Data COVID 19 Sesuai Nama Provinsi di url
		// @param ambil dari JSON provinsi
		if (isset($provinsi)) {
			for ($i = 0; $i < count($provinsi['list_data']); $i++) {
				foreach ($domain['data'][1] as $dom) {
					if (@$provinsi['list_data'][$i]['key'] == strtoupper($dom['domain_name'])) {
						array_push($covProv, array_merge($provinsi['list_data'][$i], ['prov_id' => $dom['domain_id']]));
					} elseif (namaProvinsiValid(strtoupper($dom['domain_name']), @$provinsi['list_data'][$i]['key'])) {
						array_push($covProv, array_merge($provinsi['list_data'][$i], ['prov_id' => $dom['domain_id']]));
					}
				}
			}
		}
		// End Ambil Data




		$data['judul'] = 'Daftar Statistik';
		$data['indo'] = $kasus; // kasus covid se-indonesia
		$data['prov'] = $covProv; // kasus covid-19 per-provinsi
		$data['berita'] = $berita['articles'];
		// $data['domains'] = $domain['data'][1]; // daftar domain provinsi


		$data['judul'] = 'Home';
		$data['page'] = 'Home'; //Digunakan untuk indikator di Sidebar
		echo view('templates/header', $data);
		echo view('templates/sidebar', $data);
		echo view('templates/topbar', $data);
		echo view('home/index', $data);
		echo view('templates/footer');
	}
}
