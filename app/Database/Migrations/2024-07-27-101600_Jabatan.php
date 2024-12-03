<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_jabatan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ]
        ]);

        $this->forge->addKey('id_jabatan', true);
        $this->forge->createTable('jabatan');
    }

    public function down()
    {
        //
    }
}
