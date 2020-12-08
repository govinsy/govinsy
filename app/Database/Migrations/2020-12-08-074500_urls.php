<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Urls extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => TRUE
			],
			'author' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'url' => [
				'type' => 'TEXT'
			],
			'key' => [
				'type' => 'TEXT',
				'null' => TRUE
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('name', TRUE);
		$this->forge->createTable('urls');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('urls');
	}
}
