<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'id_karyawan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_karyawan', 'uid', 'id_finger', 'nama', 'level', 'password'];
}