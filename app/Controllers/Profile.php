<?php

namespace App\Controllers;

use App\Models\FriendlyModel;
use Myth\Auth\Models\UserModel;

class Profile extends BaseController
{
	public function index()
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}


		// Récupere la list des users qui sont amie avec l'utilisateur connecter
		$users = model(UserModel::class);
		$users_friends = model(FriendlyModel::class);
		$friends = $users_friends->where('user_id', user_id())->findAll();

		$friend = [];

		for ($i = 0; $i < count($friends); $i++) {
			$friend[$i] = $users->find($friends[$i]['friend']);
		}

		$data = [
			'friends' => $friend,
		];

		return view("Profile/index", $data);
	}

	public function UserProfile($id_users)
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$users = model(UserModel::class);
		$users_friends = model(FriendlyModel::class);

		$data = [
			'user' => $users->where('id', $id_users)->first(),
		];
		return view("Profile/user", $data);
	}
}
