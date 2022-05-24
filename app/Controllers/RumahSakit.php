<?php

namespace App\Controllers;

use App\Models\RumahSakitModel;

class RumahSakit extends BaseController
{
    protected $rumahsakitModel;

    public function __construct()
    {
        $this->rumahsakitModel = new RumahSakitModel();
    }

    public function index()
    {
        $datars = $this->rumahsakitModel->findAll();
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';

            $data = [
                'title' => 'Manage RS/ Klinik',
                'desc' => 'Tabel',
                'data' => $datars,
                'rumahsakit' => $nama_rs
            ];
            return view('settings/managers', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function add()
    {
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';

            $data = [
                'title' => 'Tambah RS/Klinik',
                'desc' => '',
                'validation' => \Config\Services::validation(),
                'rumahsakit' => $nama_rs
            ];
            return view('settings/addrs', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function edit($id)
    {
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';

            $data = [
                'title' => 'Edit User Lab PA',
                'desc' => 'Edit User Lab PA',
                'validation' => \Config\Services::validation(),
                'data' => $this->rumahsakitModel->getData($id),
                'rumahsakit' => $nama_rs
            ];
            return view('settings/editrs', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function save()
    {
        //validasi input
        $rules = [
            'nama' => [
                'rules' => 'required|is_unique[rumahsakit.nama]',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.',
                    'is_unique' => 'Nama RS/ Klinik sudah terdaftar.'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/rumahsakit/add')->withInput();
        }

        $this->rumahsakitModel->save([
            'nama' => $this->request->getVar('nama'),
            'kota' => $this->request->getVar('kota')
        ]);

        session()->setFlashdata('message', 'Data berhasil disimpan.');

        return redirect()->to('/rumahsakit');
    }

    public function update($id)
    {
        //cek judul diubah
        $dataLama = $this->rumahsakitModel->getData($id);
        if ($dataLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[rumahsakit.nama]';
        }
        //validasi input
        $rules = [
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.',
                    'is_unique' => 'Nama RS/ Klinik sudah terdaftar.'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/rumahsakit/edit/' . $id)->withInput();
        }
        $this->rumahsakitModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'kota' => $this->request->getVar('kota')
        ]);

        session()->setFlashdata('message', 'Data berhasil diubah.');

        return redirect()->to('/rumahsakit');
    }

    public function delete($id)
    {
        $this->rumahsakitModel->delete($id);
        // $this->rumahsakitModel->save([
        //     'id' => $id,
        //     'status' => '0'
        // ]);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/rumahsakit');
    }
}
