<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use Myth\Auth\Entities\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		//Initialisation des comptes

		$data = [
			'email'	   => 'admin@gencarte.com',
			'username' => 'admin',
			'password' => 'Password123',
			'active'   =>  1
		];

		$userModel = model(UserModel::class);
		$user = new User($data);
		$userModel->withGroup('admin');
		$userModel->save($user);
	}
}
