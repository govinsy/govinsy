<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UrlSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name' => 'covid_ind',
				'author' => 'Mathdroid',
				'url' => 'https://covid19.mathdro.id/api/countries/IDN',
				'created_at' => Time::now()
			],
			[
				'name' => 'covid_prov',
				'author' => 'Satgas Penanganan COVID-19',
				'url' => 'https://data.covid19.go.id/public/api/prov.json',
				'created_at' => Time::now()
			],
			[
				'name' => 'covid_dayone',
				'author' => 'Covid19 API',
				'url' => 'https://api.covid19api.com/dayone/country/indonesia',
				'created_at' => Time::now()
			],
			[
				'name' => 'hospitals',
				'author' => 'Dekontaminasi',
				'url' => 'https://dekontaminasi.com/api/id/covid19/hospitals',
				'created_at' => Time::now()
			],
			[
				'name' => 'newsapi',
				'author' => 'News API',
				'url' => 'http://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=',
				'key' => '6ea14b5ed1454324aa734a9db2808c19',
				'created_at' => Time::now()
			],
			[
				'name' => 'provdesc',
				'author' => 'Govinsy',
				'url' => base_url() . '/json/provdesc.json',
				'created_at' => Time::now()
			]
		];

		for ($i=0; $i < count($data); $i++) { 
			$this->db->table('urls')->insert($data[$i]);
		}
	}
}
