<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profiler extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_profiler' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'visi' => [
                'type' => 'TEXT',
            ],
            'misi' => [
                'type' => 'TEXT',
            ],
            'tentang' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'sop_pelayanan_asesmen' => [
                'type' => 'TEXT'
            ],
            'sop_pelayanan_interversi_terpadu' => [
                'type' => 'TEXT'
            ],
            'waktu_pelayanan' => [
                'type' => 'TEXT'
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'twitter' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'youtube' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);
        $this->forge->addKey('id_profiler', true);
        $this->forge->createTable('profiler');
    }

    public function down()
    {
        //
        $this->forge->dropTable('profiler');
    }
}
