<?php

namespace App\Models;

use CodeIgniter\Model;

class IpModel extends Model
{
    protected $table = 'ip';

    protected $primaryKey = 'id_ip';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_ip', 'address'];
}