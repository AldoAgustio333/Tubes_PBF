<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class AddPenggunaIdToAbsensiTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('absensi', [
            'id_pengguna' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => false,
                'after'      => 'id_kelas',
            ],
        ]);
        $this->forge->addForeignKey('id_pengguna', 'pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
    }
    public function down()
    {
        $this->forge->dropForeignKey('absensi', 'absensi_id_pengguna_foreign');
        $this->forge->dropColumn('absensi', 'id_pengguna');
    }
}