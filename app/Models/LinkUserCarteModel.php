<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CarteModel;

class LinkUserCarteModel extends Model{

    protected $table = 'users_carte';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'user_id', 'carte_id', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;


    /** 
    * Crée un lien entre l'utilisateur et la carte crée
    *
    * @param int $userId
    * @param CarteModel $carteId
    * @return null
    */

    public function linkUserCarte(int $userId, CarteModel $carteId){
        
        $date = [
            'user_id' => (int) $userId,
            'carte_id' => $carteId->id,
        ];

        return $this->insert($date);
    }
}