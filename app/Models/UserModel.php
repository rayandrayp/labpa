<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['fullname', 'username', 'password', 'id_rs'];
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getDataUserRS()
    {
        $query =  $this->db->table('users')
            ->select('users.id')
            ->select('users.username')
            ->select('users.fullname')
            ->select('users.id_rs')
            ->select('rumahsakit.nama')
            ->select('rumahsakit.kota')
            ->join('rumahsakit', 'users.id_rs = rumahsakit.id')
            ->get();
        return $query;
    }
}
