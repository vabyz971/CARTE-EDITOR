<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\LinkUserCarteModel;


class CarteModel extends Model
{
    protected $table = 'carte';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'content', 'destinater', 'adresse', 'code_postal', 'image'];

    protected $returnType    = 'App\Entities\CarteEntity';
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

    /** 
     * Récuper la list des lettres crée par un utilisateur
     *
     * @param int $userId
     * @return null
     */
    public function ListCardUser(int $userId){

        $builder = $this->db->table($this->table);
        $query = $builder->select('*');
        $query = $builder->join('users_carte', 'users_carte.carte_id = carte.id');
        $query = $builder->join('users', 'users_carte.user_id = users.id');
        $query = $builder->where('users.id', $userId);
        $query = $builder->get();

        return $query->getResult();
    }

}
