<?php

namespace App\Models;

use CodeIgniter\Model;

class CarteModel extends Model
{
    protected $table = 'carte';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'name', 'content', 'destinater', 'adresse', 'code_postal','image'];

    protected $useTimestamps = true;

}
