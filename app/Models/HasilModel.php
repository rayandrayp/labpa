<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasillab';
    protected $allowedFields = ['namapasien', 'nomorlab', 'id_rs', 'namafile', 'status', 'deleted_at'];
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

    public function getDataHasilLabRS($user_fullname)
    {
        if ($user_fullname == 'Admin Utama') {
            $query =  $this->db->table('hasillab')
                ->select('hasillab.id')
                ->select('hasillab.namapasien')
                ->select('hasillab.nomorlab')
                ->select('hasillab.namafile')
                ->select('hasillab.id_rs')
                ->select('hasillab.created_at')
                ->select('hasillab.status')
                ->select('rumahsakit.nama')
                ->select('rumahsakit.kota')
                ->join('rumahsakit', 'hasillab.id_rs = rumahsakit.id')
                ->get();
        } else {
            $query =  $this->db->table('hasillab')
                ->select('hasillab.id')
                ->select('hasillab.namapasien')
                ->select('hasillab.nomorlab')
                ->select('hasillab.namafile')
                ->select('hasillab.id_rs')
                ->select('hasillab.created_at')
                ->select('hasillab.status')
                ->select('rumahsakit.nama')
                ->select('rumahsakit.kota')
                ->join('rumahsakit', 'hasillab.id_rs = rumahsakit.id')
                ->join('users', 'hasillab.id_rs = users.id_rs')
                ->where('users.fullname', $user_fullname)
                ->where('hasillab.status', '1')
                ->get();
        }

        return $query;
    }
}
