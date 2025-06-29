<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRevisedKelasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'jadwal_kelas' => [ // KOLOM BARU: Jadwal Kelas
                'type'       => 'DATETIME',
                'null'       => false, // Jadwal wajib diisi
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_kelas', true);
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}