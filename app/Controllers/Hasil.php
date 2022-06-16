<?php

namespace App\Controllers;

use App\Models\RumahSakitModel;
use App\Models\HasilModel;

class Hasil extends BaseController
{
    protected $rumahsakitModel;
    protected $hasilModel;

    public function __construct()
    {
        $this->rumahsakitModel = new RumahSakitModel();
        $this->hasilModel = new HasilModel();
    }
    public function index()
    {
        $user_fullname = $_SESSION['user_fullname'];
        $dataHasil =  $this->hasilModel->getDataHasilLabRS($user_fullname)->getResult();
        ($user_fullname == 'Admin Utama') ? $nama_rs = 'Super Admin' : $nama_rs = $this->rumahsakitModel->getData($_SESSION['user_id_rs'])['nama'];
        $data = [
            'title' => 'Dashboard',
            'desc' => 'Tabel Hasil Pemeriksaan Lab PA',
            'validation' => \Config\Services::validation(),
            'data' => $dataHasil,
            'rumahsakit' => $nama_rs
        ];
        // dd($data);
        return view('pages/hasillab', $data);
    }

    public function add()
    {
        $dataRS = $this->rumahsakitModel->findAll();
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';
            $data = [
                'user_name' => 'Admin Utama',
                'title' => 'Input Hasil Lab PA',
                'desc' => 'Input Hasil Pemeriksaan Lab PA',
                'validation' => \Config\Services::validation(),
                'datars' => $dataRS,
                'rumahsakit' => $nama_rs
            ];
            return view('pages/addhasil', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function edit($id)
    {
        $dataHasil =  $this->hasilModel->getData($id);
        $dataRS = $this->rumahsakitModel->findAll();
        $user_fullname = $_SESSION['user_fullname'];
        if ($user_fullname == 'Admin Utama') {
            $nama_rs = 'Super Admin';
            $data = [
                'user_name' => 'Admin Utama',
                'title' => 'Edit Hasil Lab PA',
                'desc' => 'Edit Hasil Pemeriksaan Lab PA',
                'validation' => \Config\Services::validation(),
                'data' => $dataHasil,
                'datars' => $dataRS,
                'rumahsakit' => $nama_rs
            ];
            // dd($data);
            return view('pages/edithasil', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function save()
    {
        // dd($this->request->getVar());
        //validasi input
        $rules = [
            'namapasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.',
                ]
            ],
            'nomorlab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom tidak boleh kosong.'
                ]
            ],
            'filehasil' => [
                'rules' => 'uploaded[filehasil]|ext_in[filehasil,pdf]',
                'errors' => [
                    'required' => 'File belum ter-upload.',
                    'ext_in' => 'Ekstensi file bukan PDF.'
                ]
            ]
        ];



        if (!$this->validate($rules)) {
            return redirect()->to('/hasil/add')->withInput();
        }

        //ambil file
        $fileHasil = $this->request->getFile('filehasil');

        //generate nama random
        $namaFile = $fileHasil->getRandomName();

        //pindahkan file ke folder upload
        $fileHasil->move('upload/', $namaFile);

        // dd($fileHasil);

        $this->hasilModel->save([
            'namapasien' => $this->request->getVar('namapasien'),
            'nomorlab' => $this->request->getVar('nomorlab'),
            'id_rs' => $this->request->getVar('id_rs'),
            'namafile' => $namaFile,
            'status' => '1'
        ]);

        session()->setFlashdata('message', 'Data berhasil disimpan.');

        return redirect()->to('/hasil');
    }

    public function update($id)
    {
        //ambil file
        $fileHasil = $this->request->getFile('filehasil');
        $namaLama = $this->request->getVar('namalama');

        //cek user upload baru
        if ($fileHasil->getError() == 4) {
            $namaFile = $namaLama;
            $uploadNewFile = false;
            $rules = [
                'namapasien' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong.',
                    ]
                ],
                'nomorlab' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong.'
                    ]
                ]
            ];
        } else {
            $uploadNewFile = true;
            $rules = [
                'namapasien' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong.',
                    ]
                ],
                'nomorlab' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong.'
                    ]
                ],
                'filehasil' => [
                    'rules' => 'uploaded[filehasil]|ext_in[filehasil,pdf]',
                    'errors' => [
                        'required' => 'File belum ter-upload.',
                        'ext_in' => 'Ekstensi file bukan PDF.'
                    ]
                ]
            ];
        }

        //validasi input


        if (!$this->validate($rules)) {
            return redirect()->to('/hasil/edit/' . $id)->withInput();
        }

        if ($uploadNewFile) {
            //generate nama random
            $namaFile = $fileHasil->getRandomName();

            //pindahkan file ke folder upload
            $fileHasil->move('upload/', $namaFile);

            //hapus file lama
            unlink('upload/' . $namaLama);
        }

        $this->hasilModel->save([
            'id' => $id,
            'namapasien' => $this->request->getVar('namapasien'),
            'nomorlab' => $this->request->getVar('nomorlab'),
            'id_rs' => $this->request->getVar('id_rs'),
            'namafile' => $namaFile,
            'status' => '1'
        ]);

        session()->setFlashdata('message', 'Data berhasil disimpan.');

        return redirect()->to('/hasil');
    }

    public function delete($id)
    {
        //hard delete: delete data
        $hasil = $this->hasilModel->getData($id); //cari nama file berdasarkan ID 
        $this->hasilModel->delete($id);
        unlink('upload/' . $hasil['namafile']); //hapus file
        //end of hard delete

        //soft delete
        // $this->hasilModel->save([
        //     'id' => $id,
        //     'status' => '0',
        //     'deleted_at' => date("Y-m-d H:i:s")
        // ]);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/hasil');
    }
}
