<?php

namespace App\Models;

use CodeIgniter\Model;

class RumahSakitModel extends Model
{
    protected $table = 'rumahsakit';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $allowedFields = ['nama', 'kota', 'status'];

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
