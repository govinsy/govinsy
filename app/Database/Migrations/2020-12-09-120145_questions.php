<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Questions extends Migration
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
			'survey_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'question' => [
				'type' => 'TEXT'
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('survey_id', 'surveys', 'id');
		$this->forge->createTable('questions');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('questions');
	}
}
