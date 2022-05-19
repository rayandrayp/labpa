<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['fullname', 'username', 'password', 'status', 'created_at', 'updated_at'];
}
