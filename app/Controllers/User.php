<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;

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
        return view('settings/manageuser', $data);
    }

    public function adduser()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Add User',
            'desc' => 'Tabel berisi daftar User',
            'type' => 'input'
        ];
        return view('settings/adduser', $data);
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
        return view('settings/adduser', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'username'          => 'required|min_length[3]|max_length[20]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'fullname'      => $this->request->getVar('fullname'),
                'username'      => $this->request->getVar('username'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status'        => '1',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
