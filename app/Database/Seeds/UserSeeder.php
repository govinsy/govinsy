<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'name' => 'admin',
			'email' => 'admin@govinsy.com',
			'password' => password_hash('admin', PASSWORD_DEFAULT),
			'picture' => '430da.jpg',
			'is_admin' => 1,
			'created_at' => Time::now()
		];

		$this->db->table('users')->insert($data);
	}
}
