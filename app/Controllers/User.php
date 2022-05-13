<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Manage User',
            'desc' => 'Tabel berisi daftar User',
            'data_hasil' => [
                [
                    'id' => '001',
                    'username' => 'rayanrayan123',
                    'nama' => 'Rayandra',
                    'asal' => 'RSI Gondanglegi',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ],
                [
                    'id' => '002',
                    'username' => 'izul123',
                    'nama' => 'Izul',
                    'asal' => 'RS Wajak Husada',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ],
                [
                    'id' => '003',
                    'username' => 'eka123',
                    'nama' => 'Eka',
                    'asal' => 'RS Prasetya Husada',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ],
                [
                    'id' => '004',
                    'username' => 'alex123',
                    'nama' => 'Alex',
                    'asal' => 'Lab Patimura',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ],
                [
                    'id' => '005',
                    'username' => 'siska123',
                    'nama' => 'Siska',
                    'asal' => 'RS Lawang Medika',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ],
                [
                    'id' => '006',
                    'username' => 'widya123',
                    'nama' => 'Widya',
                    'asal' => 'Rumkitban Lawang',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ]
            ]
        ];
        return view('pages/manageuser', $data);
    }

    public function adduser()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Add User',
            'desc' => 'Tabel berisi daftar User',
            'type' => 'input'
        ];
        return view('pages/adduser', $data);
    }

    public function edituser()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Edit User Lab PA',
            'desc' => 'Edit User Lab PA',
            'type' => 'edit',
            'data_hasil' => [
                [
                    'id' => '001',
                    'username' => 'rayanrayan123',
                    'nama' => 'Rayandra',
                    'asal' => 'RSI Gondanglegi',
                    'kota' => 'Malang Kabupaten',
                    'created_at' => '2022-05-08'
                ]
            ]
        ];
        return view('pages/adduser', $data);
    }
}
