<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SyaratPendaftaran extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_syarat' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul_syarat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id_syarat', true);
        $this->forge->createTable('syarat_pendaftaran');
    }

    public function down()
    {
        //
        $this->forge->dropTable('syarat_pendaftaran');
    }
}
