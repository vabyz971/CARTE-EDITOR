<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkUserCarteModel extends Model
{

    protected $table = 'users_carte';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['user_id', 'carte_id'];

    protected $useTimestamps = true;
}
