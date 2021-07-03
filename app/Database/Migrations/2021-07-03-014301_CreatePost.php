<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePost extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'userId' => [
                'type' => 'INT',
                'constraint' => 5
            ],
			'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
			'body' => [
                'type' => 'TEXT',
                'null' => false
            ],
		]);
		$this->forge->addPrimaryKey('id');
        $this->forge->createTable('post');
	}

	public function down()
	{
		$this->forge->dropTable('post');
	}
}
