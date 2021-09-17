<?php

namespace App\Models;

use CodeIgniter\Model;

class FriendlyModel extends Model
{
    protected $table = 'users_frendly';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['user_id', 'friend', 'status', 'created_at'];

    protected $useTimestamps = true;
}
