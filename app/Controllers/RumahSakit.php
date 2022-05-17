<?php

namespace App\Controllers;

class RumahSakit extends BaseController
{
    public function index()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Manage RS/ Klinik',
            'desc' => 'Tabel',
            'data' => [
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'RSI gondanglegi'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'RS Bala Keselamatan Bokor'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'Rumkitban Lawang'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'RS Prasetya Husada'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'RS Karsa Husada'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'RS Wajak Husada'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'RS Lawang Medika'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'Lab Patimura'
                ],
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'Lab Patimura'
                ]
            ]
        ];
        return view('settings/managers', $data);
    }

    public function addrs()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Add User',
            'desc' => 'Tabel berisi daftar User',
            'type' => 'add'
        ];
        return view('settings/addrs', $data);
    }

    public function editrs()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Edit User Lab PA',
            'desc' => 'Edit User Lab PA',
            'type' => 'edit',
            'data' => [
                [
                    'id_rs' => '001',
                    'status' => '1',
                    'nama' => 'Lab Patimura'
                ]
            ]
        ];
        return view('settings/addrs', $data);
    }
}
