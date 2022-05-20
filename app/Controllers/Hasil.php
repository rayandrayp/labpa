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
        $dataHasil =  $this->hasilModel->getDataHasilLabRS()->getResult();
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Dashboard',
            'desc' => 'Tabel Hasil Pemeriksaan Lab PA',
            'validation' => \Config\Services::validation(),
            'data' => $dataHasil
        ];
        // dd($data);
        return view('pages/hasillab', $data);
    }

    public function userlab()
    {
        $data = [
            'user_name' => 'RSI Gondanglegi',
            'title' => 'Dashboard',
            'desc' => 'Tabel Hasil Pemeriksaan Lab PA',
            'type' => 'input',
            'data_hasil' => [
                [
                    'no_lab' => '2022051600001',
                    'tgl_terima' => '2022-05-08',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Rayandra',
                    'rs' => 'RSI gondanglegi',
                    'diagnosis' => 'suspect A',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600002',
                    'tgl_terima' => '2022-05-09',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Yala',
                    'rs' => 'RSI gondanglegi',
                    'diagnosis' => 'suspect B',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600003',
                    'tgl_terima' => '2022-05-10',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Pratama',
                    'rs' => 'RSI gondanglegi',
                    'diagnosis' => 'suspect C',
                    'pemeriksaan' => 'NEGATIF'
                ]
            ]
        ];
        return view('pages/dashboard', $data);
    }

    public function add()
    {
        $dataRS = $this->rumahsakitModel->findAll();
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Input Hasil Lab PA',
            'desc' => 'Input Hasil Pemeriksaan Lab PA',
            'validation' => \Config\Services::validation(),
            'datars' => $dataRS
        ];
        return view('pages/addhasil', $data);
    }

    public function edit($id)
    {
        $dataHasil =  $this->hasilModel->getData($id);
        $dataRS = $this->rumahsakitModel->findAll();
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Edit Hasil Lab PA',
            'desc' => 'Edit Hasil Pemeriksaan Lab PA',
            'validation' => \Config\Services::validation(),
            'data' => $dataHasil,
            'datars' => $dataRS
        ];
        // dd($data);
        return view('pages/edithasil', $data);
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
            return redirect()->to('/hasil/edit')->withInput();
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
            'namafile' => $namaFile
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
            'namafile' => $namaFile
        ]);

        session()->setFlashdata('message', 'Data berhasil disimpan.');

        return redirect()->to('/hasil');
    }

    public function delete($id)
    {
        //cari nama file berdasarkan ID
        $hasil = $this->hasilModel->getData($id);

        //hapus file
        unlink('upload/' . $hasil['namafile']);

        $this->userModel->delete($id);
        // $this->rumahsakitModel->save([
        //     'id' => $id,
        //     'status' => '0'
        // ]);
        session()->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to('/user');
    }
}
