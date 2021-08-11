<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if(!logged_in() && !in_groups("Administrator")){
			return redirect()->to(base_url(route_to('/')));
		}

		return view("Dashboard/index");
	}

}
