<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RumahSakitModel;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    protected $rumahsakitModel;
    protected $userModel;

    public function __construct()
    {
        $this->rumahsakitModel = new RumahSakitModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $dataUserRS =  $this->userModel->getDataUserRS()->getResult();
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Manage User',
            'desc' => 'Tabel berisi daftar User',
            'validation' => \Config\Services::validation(),
            'data' => $dataUserRS
        ];
        // dd($dataUserRS);
        return view('settings/manageuser', $data);
    }

    public function adduser()
    {
        $dataRS = $this->rumahsakitModel->findAll();
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Add User',
            'desc' => 'Tabel berisi daftar User',
            'validation' => \Config\Services::validation(),
            'datars' => $dataRS
        ];
        return view('settings/adduser', $data);
    }

    public function edit($id)
    {
        $dataRS = $this->rumahsakitModel->findAll();
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Edit User Lab PA',
            'desc' => 'Edit User Lab PA',
            'validation' => \Config\Services::validation(),
            'data' => $this->userModel->getData($id),
            'datars' => $dataRS
        ];
        return view('settings/edituser', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        //validasi input
        $rules = [
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.',
                    'is_unique' => 'Username tersebut sudah terdaftar.'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ],
            'id_rs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/user/add')->withInput();
        }

        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'id_rs' => $this->request->getVar('id_rs')
        ]);

        session()->setFlashdata('message', 'Data berhasil disimpan.');

        return redirect()->to('/user');
    }

    public function update($id)
    {
        //cek judul diubah
        $dataLama = $this->userModel->getData($id);
        if ($dataLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username]';
        }
        //validasi input
        $rules = [
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.',
                    'is_unique' => 'Username tersebut sudah terdaftar.'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ],
            'id_rs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/user/edit/' . $id)->withInput();
        }

        $this->userModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'id_rs' => $this->request->getVar('id_rs')
        ]);

        session()->setFlashdata('message', 'Data berhasil diubah.');

        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        // $this->rumahsakitModel->save([
        //     'id' => $id,
        //     'status' => '0'
        // ]);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/user');
    }
}
