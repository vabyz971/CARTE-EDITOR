<?php

namespace App\Models;

use CodeIgniter\Model;

class FriendlyModel extends Model
{
    protected $table = 'users_frendly';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['user_id', 'friend', 'status', 'created_at'];

    protected $useTimestamps = true;



    /** 
     * Retourn ue list des amies d'un utilisateur donnée
     *
     * @param int $userId
     * @return array()
     */
    public function ListFriend(int $userId){

        $builder = $this->db->table($this->table);
        $query = $builder->select('*');
        $query = $builder->join('users', 'users_frendly.friend = users.id');
        $query = $builder->where('user_id', $userId);
        $query = $builder->get();

        return $query->getResult();
    }
}
