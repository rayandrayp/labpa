<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RumahSakitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'RSI gondanglegi',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'RS Bala Keselamatan Bokor',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'Rumkitban Lawang',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'RS Prasetya Husada',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'RS Karsa Husada',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'RS Wajak Husada',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'RS Lawang Medika',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ],
            [
                'nama'          => 'Lab Patimura',
                'kota'          => 'Kabupaten Malang',
                'status'        => '1',
                'created_at'    => TIME::now(),
                'updated_at'    => TIME::now()
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO rumahsakit (nama, kota, status, created_at, updated_at) VALUES(:nama:, :kota:, :status: ,:created_at: ,:updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // hanya dapat insert 1 data saja
        // $this->db->table('rumahsakit')->insert($data);

        $this->db->table('rumahsakit')->insertBatch($data);
    }
}
