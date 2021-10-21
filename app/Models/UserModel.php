<?php namespace App\Models;

use Myth\Auth\Models\UserModel as MythUserModel;

class UserModel extends MythUserModel
{

    protected $returnType = 'App\Entities\User';

    protected $allowedFields = [
        'email', 'username','avatar', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];


    protected $validationRules = [
        'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
        'username'      => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
        'password_hash' => 'required',
    ];


    public function ListNotInUser(int $userId){

        $builder = $this->db->table($this->table);
        $query = $builder->select('*');
        $query = $builder->whereNotIn('id', [$userId]);
        $query = $builder->get();

        return $query->getResult();
    }

}
