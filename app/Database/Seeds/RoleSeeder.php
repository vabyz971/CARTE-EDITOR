<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
	public function run()
	{
		// Initialisation des Roles 
		$data = [
			[
				'name' => 'superadmin',
				'description' => 'super administrator',
			],
			[
				'name' => 'admin',
				'description' => 'administrator',
			],
			[
				'name' => 'vip',
				'description' => 'vip',
			],
			[
				'name' => 'guest',
				'description' => 'guest',
			],
		];

		$this->db->table('auth_groups')->insertBatch($data);
	}
}
