<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'name' => 'test',
			'email' => 'test@example.com',
			'password' => password_hash('test', PASSWORD_DEFAULT),
			'picture' => '430da.jpg',
			'created_at' => Time::now()
		];

		$this->db->table('users')->insert($data);
	}
}
