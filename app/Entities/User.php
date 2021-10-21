<?php 

namespace App\Entities;

use Myth\Auth\Entities\User as UserEntities;


class User extends UserEntities
{

    public function getId(){
        return $this->attributes['id'];
    }

}
