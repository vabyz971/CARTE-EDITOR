<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		// Vérification si l'utilisateur est pas connecter et pas 'Administrator'
		if(!logged_in()){
			return redirect()->to(base_url(route_to('/')));
		}

		return view("Dashboard/index");
	}

}
