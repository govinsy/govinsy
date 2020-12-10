<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'survey_id' => 1,
			'question' => 
			'Dua tiga kapal terbang 
			Lanun mana yang paling garang?'
		];

		$this->db->table('questions')->insert($data);
	}
}
