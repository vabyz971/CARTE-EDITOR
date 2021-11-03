<?php

namespace App\Controllers;

use App\Models\CarteModel;

class Editor extends BaseController
{

	public function index()
	{
		// Vérifie si l'utilisateur est connecter
		if (!logged_in()) {
			return redirect()->to(route_to('login'));
		}


		// Si la méthode envoyé est POST avec Ajax
		if ($this->request->getPost()) {

			//Models
			$carteModel = new CarteModel();

			$data = [
				"name" => esc($this->request->getVar("name")),
				"content" => esc($this->request->getVar("content")),
				"destinater" => esc($this->request->getVar("destinater")),
				"adresse" => esc($this->request->getVar("adresse")),
				"code_postal" => esc($this->request->getVar("codePost")),
			];

			
			if ($carteModel->where('name', $data['name'])->first()) {
				
				$updateCarte = $carteModel->where('name', $data['name'])->first();
				
				if ($carteModel->update($updateCarte['id'], $data)) {
					$ajaxResponse = array(
						"status" => true,
						"title" => lang('Editor.valide'),
						"message" => lang('Editor.success_update_carte'),
					);
				}
			} else {

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
		} else {
			$ajaxResponse = array(
				"status" => false,
				"title" => lang('Editor.error'),
				"message" => lang('Editor.fail_form_carte'),
			);
		}

		json_encode($ajaxResponse);

		// Ne renvoi pas la page si c'est une request AJAX
		if ($this->request->isAJAX()) return false;
		// Return view Editor
		return view("Editor/index");
	}
}
