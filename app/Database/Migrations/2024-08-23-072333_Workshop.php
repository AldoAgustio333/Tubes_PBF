<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Workshop extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_workshop' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'jam_mulai' => [
                'type' => 'TIME',
            ],
            'jam_selesai' => [
                'type' => 'TIME',
            ],
            'tempat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_workshop', true);
        $this->forge->createTable('workshop');
    }

    public function down()
    {
        //
    }
}
