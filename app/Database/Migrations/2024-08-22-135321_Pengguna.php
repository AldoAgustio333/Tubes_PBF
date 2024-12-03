<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
           'nama' => [
               'type' => 'VARCHAR',
                'constraint' => 255,
           ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
              ],
            'nomor_wa' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'tidak aktif'],
                'default' => 'aktif',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_pengguna', true);
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        //
    }
}
