<?php

namespace App\Controllers;

use App\Models\FriendlyModel;

class Profile extends BaseController
{
	public function index()
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$users_friends = model(FriendlyModel::class);
		
		$data = [
			"friends" => $users_friends->ListFriend(user_id()),
		];

		// La Vérification des amies est fait sur la view
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

		$user = $users->where('username', $id_users)->first();

		$data = [
			'user' => $user,
			"friends" => $users_friends->ListFriend($user->id),
		];
		return view("Profile/user", $data);
	}
}
