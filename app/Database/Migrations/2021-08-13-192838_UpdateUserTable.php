<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserTable extends Migration
{
	public function up()
	{
		// Add Avatar URL Users
		$fields = [
			'avatar' 			=> [
				'type' 				=> 'VARCHAR',
				'constraint' 	=> '255',
				'after'				=> 'username',
			]
		];

		$this->forge->addColumn('users', $fields);
	}

	public function down()
	{
		//
	}
}
