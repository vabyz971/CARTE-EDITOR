<?php

namespace App\Controllers;

use App\Models\CarteModel;

class Editor extends BaseController
{

	public function index()
	{
		// Vérifie si l'utilisateur est connecter
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/login')));
		}

		helper(['url', 'auth']);


		// Si la méthode envoyé est POST avec Ajax
		if ($this->request->getPost()) {

			//Models
			$carteModel = new CarteModel();

			$data = [
				"name" => esc($this->request->getVar("name")),
				"content" => $this->request->getVar("content"),
				"destinater" => $this->request->getVar("destinater"),
				"adresse" => $this->request->getVar("adresse"),
				"code_postal" => $this->request->getVar("codePost"),
			];

			if ($carteModel->insert($data)) {
				$ajaxResponse = array(
					"status" => true,
					"title" => lang('Editor.valide'),
					"message" => lang('Editor.success_add_carte'),
				);
			} else {
				$ajaxResponse = array(
					"status" => false,
					"title" => lang('Editor.error'),
					"message" => lang('Editor.fail_add_carte'),
				);
			}
		}
		else{
			$ajaxResponse = array(
				"status" => false,
				"title" => lang('Editor.error'),
				"message" => lang('Editor.fail_form_carte'),
			);
		}

		json_encode($ajaxResponse);
		
		// Renvoi pas la page si c'est une request AJAX
		if($this->request->isAJAX()) return false;
		// Return view Editor
		return view("Editor/index");
	}
}
