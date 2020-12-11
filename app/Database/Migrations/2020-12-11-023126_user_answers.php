<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAnswers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'answer_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			]
		]);
		$this->forge->addForeignKey('answer_id', 'answers', 'id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable('user_answers');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user_answers');
	}
}
