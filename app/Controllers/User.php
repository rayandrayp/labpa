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
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $dataPwd = array();
            for ($i = 0; $i < count($dataUserRS); $i++) {
                $dataPwd[$i] = $this->decrypt($dataUserRS[$i]->password, 'ITrstds123#');
            }
            $nama_rs = 'Super Admin';
            $data = [
                'title' => 'Manage User',
                'desc' => 'Tabel berisi daftar User',
                'validation' => \Config\Services::validation(),
                'data' => $dataUserRS,
                'pwd' => $dataPwd,
                'rumahsakit' => $nama_rs
            ];

            // dd($data);
            return view('settings/manageuser', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function add()
    {
        $dataRS = $this->rumahsakitModel->findAll();
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';
            $data = [
                'title' => 'Add User',
                'desc' => 'Tabel berisi daftar User',
                'validation' => \Config\Services::validation(),
                'datars' => $dataRS,
                'rumahsakit' => $nama_rs
            ];
            return view('settings/adduser', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function edit($id)
    {
        $dataRS = $this->rumahsakitModel->findAll();
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';
            $data = [
                'title' => 'Edit User Lab PA',
                'desc' => 'Edit User Lab PA',
                'validation' => \Config\Services::validation(),
                'data' => $this->userModel->getData($id),
                'datars' => $dataRS,
                'rumahsakit' => $nama_rs
            ];
            return view('settings/edituser', $data);
        } else {
            return redirect()->to('/');
        }
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
        // $pass = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $pass = $this->encrypt($this->request->getVar('password'), 'ITrstds123#');
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'password' => $pass,
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
        // $pass = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $pass = $this->encrypt($this->request->getVar('password'), 'ITrstds123#');
        $this->userModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'password' => $pass,
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
