<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAnswerSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'user_id' => 1,
			'answer_id' => 4,
		];

		$this->db->table('user_answers')->insert($data);
	}
}
