<?php

namespace App\Controllers;

use App\Models\CarteModel;
use App\Models\LinkUserCarteModel;

class Editor extends BaseController
{

	public function index()
	{
		return view("Editor/index");
	}

	public function create()
	{
		helper(['url','auth']);
		
		if($this->request->getMethod() == 'post'){
			$carteModel = new CarteModel();
			$linkModel = new LinkUserCarteModel();

			$data = [
				"name" => esc($this->request->getVar("name")),
				"content" => $this->request->getVar("content"),
				"destinater" => $this->request->getVar("destinater"),
				"adresse" => $this->request->getVar("adresse"),
				"code_postal" => $this->request->getVar("codePost"),
			];

			if($carteModel->insert($data)){
				$linkModel->linkUserCarte(user_id(), $carteModel);
				echo json_encode(array("status" => true, "message" => "success", "data" => $data));
				return redirect()->route('editor')->with('message', lang('Editor.success_add_carte'));

			}
			else{
				echo json_encode(array("status" => false, "message" => "error", "data" => $data));
				return redirect()->route('editor')->with('message', lang('Editor.fail_add_carte'));
			}
		}
	}

	public function update(){

	}
}
