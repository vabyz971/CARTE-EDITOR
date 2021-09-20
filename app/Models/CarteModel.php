<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\LinkUserCarteModel;


class CarteModel extends Model
{
    protected $table = 'carte';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'content', 'destinater', 'adresse', 'code_postal', 'image'];

    protected $useTimestamps = true;

    protected $afterInsert = ['AddLinkUser'];


    /** 
     * Crée un lien entre l'utilisateur et la carte crée
     *
     * @param int $userId
     * @return null
     */
    public function AddLinkUser(array $data)
    {
        helper("auth");
        $link = new LinkUserCarteModel();
        $link->insert([
            'user_id' => user_id(),
            'carte_id' => $data['id'],
        ]);
    }
}
