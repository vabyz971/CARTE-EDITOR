<?php

namespace App\Controllers;

class Profile extends BaseController
{
	public function index()
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if(!logged_in()){
			return redirect()->to(base_url(route_to('/')));
		}

		return view("Profile/index");
	}

}
