<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeri extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_galeri' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id_galeri', true);
        $this->forge->createTable('galeri');
    }

    public function down()
    {
        //
        $this->forge->dropTable('galeri');
    }
}
