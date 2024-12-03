<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data_user = [
            [
                'nama' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
            ]
        ];

        $this->db->table('user')->insertBatch($data_user);
    }
}
