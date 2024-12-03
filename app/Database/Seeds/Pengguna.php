<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pengguna extends Seeder
{
    public function run()
    {
        $data_pengguna = [
            [
                'nama' => 'Aldo Agustio',
                'email' => 'aldoagustio222@gmail.com',
                'nomor_wa' => '08994231414',
                'created_at' => '2024-08-16 12:00:00',
                'updated_at' => '2024-08-16 12:00:00',
                'status' => 'aktif'
            ],
        ];

        foreach ($data_pengguna as $pengguna) {
            $this->db->table('pengguna')->insert($pengguna);
        }
    }
}
