<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		return view("Auth/login");
	}

    public function register()
    {
        return view("Auth/register");
    }

}
