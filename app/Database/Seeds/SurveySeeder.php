<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SurveySeeder extends Seeder
{
	public function run()
	{
		$data = [
			'title' => 'Judul Survei',
			'description' => 'Selamat datang di survei ini. Silahkan jawab pertanyaan dibawah ini. Jawab sesuai dengan apa yang anda anggap benar.',
			'created_at' => Time::now()
		];

		$this->db->table('surveys')->insert($data);
	}
}
