<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Dashboard',
            'desc' => 'Tabel Hasil Pemeriksaan Lab PA',
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
                ],
                [
                    'no_lab' => '2022051600004',
                    'tgl_terima' => '2022-05-10',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Widya',
                    'rs' => 'RS Bala Keselamatan Bokor',
                    'diagnosis' => 'suspect D',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600005',
                    'tgl_terima' => '2022-05-10',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Siska',
                    'rs' => 'Rumkitban Lawang',
                    'diagnosis' => 'suspect A',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600006',
                    'tgl_terima' => '2022-05-10',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Eka',
                    'rs' => 'RS Prasetya Husada',
                    'diagnosis' => 'suspect B',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600007',
                    'tgl_terima' => '2022-05-11',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Alex',
                    'rs' => 'RS Karsa Husada',
                    'diagnosis' => 'suspect C',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600008',
                    'tgl_terima' => '2022-05-11',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Izul',
                    'rs' => 'RS Wajak Husada',
                    'diagnosis' => 'suspect D',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600009',
                    'tgl_terima' => '2022-05-11',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Bobi',
                    'rs' => 'RS Lawang Medika',
                    'diagnosis' => 'suspect E',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600010',
                    'tgl_terima' => '2022-05-12',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Ayu',
                    'rs' => 'Lab Patimura',
                    'diagnosis' => 'suspect F',
                    'pemeriksaan' => 'NEGATIF'
                ],
                [
                    'no_lab' => '2022051600011',
                    'tgl_terima' => '2022-05-13',
                    'tgl_selesai' => '2022-05-16',
                    'pasien' => 'Adi',
                    'rs' => 'Lab Patimura',
                    'diagnosis' => 'suspect A',
                    'pemeriksaan' => 'NEGATIF'
                ]
            ]
        ];
        return view('pages/dashboard', $data);
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

    public function hasil()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Input Hasil Lab PA',
            'desc' => 'Input Hasil Pemeriksaan Lab PA'
        ];
        return view('pages/hasil', $data);
    }

    public function edithasil()
    {
        $data = [
            'user_name' => 'Admin Utama',
            'title' => 'Edit Hasil Lab PA',
            'desc' => 'Edit Hasil Pemeriksaan Lab PA',
            'type' => 'edit',
            'data_hasil' => [
                [
                    'no_lab' => '2022051600001',
                    'tgl_terima' => '2022-05-08',
                    'tgl_selesai' => '2022-05-16',
                    'namapasien' => 'Rayandra',
                    'umurpasien' => '30',
                    'jeniskelamin' => 'Laki-Laki',
                    'namadokter' => 'dr. Budi Prakoso, Sp. PD',
                    'rs' => 'RSI gondanglegi',
                    'diagnosis' => 'suspect A',
                    'pemeriksaan' => 'NEGATIF'
                ]
            ]
        ];
        return view('pages/hasil', $data);
    }
}
