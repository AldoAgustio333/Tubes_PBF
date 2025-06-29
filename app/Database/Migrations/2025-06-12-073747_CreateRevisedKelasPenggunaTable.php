<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRevisedKelasPenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas_pengguna' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kelas' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_pengguna' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id_kelas_pengguna', true);
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pengguna', 'pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kelas_pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('kelas_pengguna');
    }
}