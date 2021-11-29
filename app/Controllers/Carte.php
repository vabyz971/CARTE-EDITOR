<?php

namespace App\Controllers;

use App\Models\CarteModel;

class Carte extends BaseController
{

    public function Share(int $id)
    {
        $cartes = model(CarteModel::class);
        $data['carte'] = $cartes->where('id', $id)->first();
        return view('Editor/ShowCard', $data);
    }

    // Suppression de la carte
    public function deleteItem()
    {
        // Vérifie si l'utilisateur est connecter
        if (!logged_in()) {
            return redirect()->to(route_to('login'));
        }
        $cartes = model(CarteModel::class);

        if ($this->request->getPost()) {
            if ($cartes->where('id', $this->request->getVar("cardID"))->delete()) {
                return redirect()->to(route_to('profile'));
            }
        }
    }
}
