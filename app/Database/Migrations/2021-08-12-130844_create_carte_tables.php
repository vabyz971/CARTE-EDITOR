<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarteTables extends Migration
{
	public function up()
	{
		/*
		* Frendly Table
		*/
		$this->forge->addField([
			'id'               		=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'user_id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'friend' 				=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
			'etat'					=> ['type' => 'enum', 'constraint' => ['friend', 'waiting', 'locked'], 'default' => 'waiting'],
			'created_at' 			=> ['type' => 'datetime', 'null' => true],
			'validate_at'			=> ['type' => 'datetime', 'null' => true],
			'deleted_at' 			=> ['type' => 'datetime', 'null' => true],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('friend', 'users', 'id', '', 'CASCADE');
		$this->forge->createTable('users_frendly', true);


		/*
		* Carte Editor Table
		*/

		$this->forge->addField([
			'id'         		=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'name'		 		=> ['type' => 'varchar', 'constraint' => 255],
			'theme'			 	=> ['type' => 'enum', 'constraint' => ['letter', 'anniversary'], 'default' => 'letter'],
			'type'			 	=> ['type' => 'enum', 'constraint' => ['electronique', 'traditionnelle'], 'default' => 'traditionnelle'],
			'content'		 	=> ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'destinater'		=> ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'adresse'		 	=> ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'image'				=> ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'code_postal'		=> ['type' => 'int', 'constraint' => 11, 'null' => true],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('carte', true);



		/*
		* Users create carte by Table
		*/

		$this->forge->addField([
			'user_id'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'carte_id'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],

		]);

		$this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('carte_id', 'carte', 'id', '', 'CASCADE');
		$this->forge->createTable('users_carte', true);


		/*
		* Envoie carte Table
		*/

		$this->forge->addField([
			'id'         			 => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'id_user_send'		 => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'id_user_dest'		 => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'id_carte'				 => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'created_at'       => ['type' => 'datetime', 'null' => true],
			'updated_at'       => ['type' => 'datetime', 'null' => true],
			'deleted_at'       => ['type' => 'datetime', 'null' => true],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_user_send', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('id_user_dest', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('id_carte', 'carte', 'id', '', 'CASCADE');
		$this->forge->createTable('send_carte', true);
	}

	public function down()
	{

		$this->forge->dropTable('users_frendly', true);
		$this->forge->dropTable('carte', true);
		$this->forge->dropTable('users_carte', true);
		$this->forge->dropTable('send_carte', true);
	}
}
