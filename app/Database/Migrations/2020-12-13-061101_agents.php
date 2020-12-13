<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agents extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'agent' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'platform' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'browser' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'version' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'robot' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'mobile' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'referrer' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'ip' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'host' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE
			],
			'valid_ip' => [
				'type' => 'BOOLEAN',
				'null' => TRUE
			],
			'visited_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('agents');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('agents');
	}
}
