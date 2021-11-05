<?php

namespace App\Controllers;

use App\Models\FriendlyModel;
use App\Models\UserModel;
use App\Models\CarteModel;

class Profile extends BaseController
{
	public function index()
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if (!logged_in()) {
			return redirect()->to(route_to('login'));
		}

		//Models
		$List_friend = model(FriendlyModel::class);
		$List_user = model(UserModel::class);
		$List_letter = model(CarteModel::class);


		// Si la méthode envoyé est GET
		if ($this->request->getPost()) {

			// Récuper le premier utilisateur avec le même speudo
			$newFriend = $List_user->where('username', $this->request->getVar('username'))->first();
			$isFriendExiste = $List_friend->IsFriend(user_id(), $newFriend->id);

			// Verifie si c'est un nouvelle amie et qu'il n'est pas en attent 
			if ($newFriend && !$isFriendExiste) {

				if ($List_friend->insert(['user_id' => user_id(), 'friend' => $newFriend->id])) {
					$ajaxResponse = array(
						"status" => true,
					);
				}
			}
		} else {
			$ajaxResponse = array(
				"status" => false,
			);
		}

		$ctx = [
			"letters" => $List_letter->ListCardUser(user_id()),
			"users" => $List_user->ListNotInUser(user_id()),
			"friends" => $List_friend->ListFriend(user_id()),
		];
		json_encode($ajaxResponse);

		// Ne renvoi pas la page si c'est une request AJAX
		if ($this->request->isAJAX()) return false;

		// La Vérification des amies est fait sur la view
		return view("Profile/index", $ctx);
	}

	public function UserProfile($id_users)
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$users = model(UserModel::class);
		$List_friend = model(FriendlyModel::class);

		$user = $users->where('username', $id_users)->first();

		$ctx = [
			'user' => $user,
			"friends" => $List_friend->ListFriend($user->id),
		];
		return view("Profile/user", $ctx);
	}
}
