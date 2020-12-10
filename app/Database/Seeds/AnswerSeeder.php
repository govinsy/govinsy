<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnswerSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'question_id' => 1,
				'answer' => 
				'Dua tiga kucing berlari  
				Dua singgit mana nak cari',
				'type' => 'radio'
			],
			[
				'question_id' => 1,
				'answer' => 
				'Dua tiga ayam goreng 
				Kami datang nak tangkap Jarjit',
				'type' => 'radio'
			],
			[
				'question_id' => 1,
				'answer' => 
				'Sepandai-pandai tupai melompat 
				Polis lagi pandai lompat',
				'type' => 'radio'
			],
			[
				'question_id' => 1,
				'answer' => 
				'Pergi ke kedai beli barang 
				Kak Ros lah yang paling garang',
				'type' => 'radio'
			]
		];

		for ($i=0; $i < count($data); $i++) { 
			$this->db->table('answers')->insert($data[$i]);
		}
	}
}
