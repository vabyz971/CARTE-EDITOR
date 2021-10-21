<?php

namespace App\Models;

use CodeIgniter\Model;

class FriendlyModel extends Model
{
    protected $table = 'users_frendly';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['user_id', 'friend', 'etat'];
    
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';



    /** 
     * Retourn une list des amies d'un utilisateur donnée
     *
     * @param int $userId
     * @return array()
     */
    public function ListFriend(int $userId)
    {

        $builder = $this->db->table($this->table);
        $query = $builder->select('*');
        $query = $builder->join('users', 'users_frendly.friend = users.id');
        $query = $builder->where('user_id', $userId);
        $query = $builder->get();

        return $query->getResult();
    }


    /** 
     * Retourn une l'utilisateur qui est amies avec un autre utilisateur
     *
     * @param int $userId
     * @param int $friendId
     * @return True
     */
    public function IsFriend(int $userId, int $friendId)
    {

        $builder = $this->db->table($this->table);
        $query = $builder->select('*');
        $query = $builder->join('users', 'users_frendly.friend = users.id');
        $query = $builder->where('user_id', $userId);
        $query = $builder->where('friend', $friendId);
        $query = $builder->get();

        foreach ($query->getResult() as $row) {
            if ($row->etat == "waiting") {
                return true;
            }
        }
        return false;
    }
}
