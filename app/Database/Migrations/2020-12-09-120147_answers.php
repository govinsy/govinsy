<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Answers extends Migration
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
			'question_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'answer' => [
				'type' => 'TEXT'
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('question_id', 'questions', 'id');
		$this->forge->createTable('answers');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('answers');
	}
}
