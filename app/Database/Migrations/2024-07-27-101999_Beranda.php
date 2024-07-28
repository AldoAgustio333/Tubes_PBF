<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Beranda extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_beranda' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_profiler' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_guru' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_galeri' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ]
        ]);

        $this->forge->addKey('id_beranda', true);
        $this->forge->addForeignKey('id_profiler', 'profiler', 'id_profiler', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_guru', 'guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_galeri', 'galeri', 'id_galeri', 'CASCADE', 'CASCADE');
        $this->forge->createTable('beranda');

    }

    public function down()
    {
        //
        $this->forge->dropTable('beranda');
    }
}
