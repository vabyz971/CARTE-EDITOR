<?php

namespace App\Controllers;

use App\Models\CarteModel;

class Carte extends BaseController{

    // public function index(){
    //     return view('Editor/ShowCard');
    // }

    public function Share(int $id){

        $cartes = model(CarteModel::class);
        

        $data['carte'] = $cartes->where('id', $id)->first();

        return view('Editor/ShowCard', $data);

    }
}