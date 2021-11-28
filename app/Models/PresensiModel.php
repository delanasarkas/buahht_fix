<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table = 'presensi';

    protected $primaryKey = 'id_presensi';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_presensi', 'uid', 'id_user', 'state', 'date'];
}