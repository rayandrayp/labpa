<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HasilLab extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'namapasien'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nomorlab' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_rs' => [
                'type'        => 'INT',
                'constraint'  => 5,
            ],
            'namafile' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hasillab');
    }

    public function down()
    {
        $this->forge->dropTable('hasillab');
    }
}
