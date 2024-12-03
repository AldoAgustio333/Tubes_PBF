<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jabatan extends Seeder
{
    public function run()
    {
        //
        $data_jabatan = [
            [
                'jabatan' => 'Kepala'
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Tata Usaha'
            ],
            [
                'jabatan' => 'Tenaga Ahli'
            ],
            [
                'jabatan' => 'Asesmen'
            ],
            [
                'jabatan' => 'Layanan Intervensi'
            ],
            [
                'jabatan' => 'Administrasi'
            ]
        ];

        foreach($data_jabatan as $jabatan)
        {
            $this->db->table('jabatan')->insert($jabatan);
        }
    }
}
