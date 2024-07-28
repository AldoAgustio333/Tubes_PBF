<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Guru extends Seeder
{
    public function run()
    {
        //
        $data_guru = [
            [
                'nama_guru' => 'Guru 1',
                'jabatan' => 'Kepala Sekolah',
                'image' => 'guru1.jpg'
            ],
            [
                'nama_guru' => 'Guru 2',
                'jabatan' => 'Wakil Kepala Sekolah',
                'image' => 'guru2.jpg'
            ],
            [
                'nama_guru' => 'Guru 3',
                'jabatan' => 'Guru',
                'image' => 'guru3.jpg'
            ],
            [
                'nama_guru' => 'Guru 4',
                'jabatan' => 'Guru',
                'image' => 'guru4.jpg'
            ],
            [
                'nama_guru' => 'Guru 5',
                'jabatan' => 'Guru',
                'image' => 'guru5.jpg'
            ],
        ];

        foreach($data_guru as $guru)
        {
            $this->db->table('guru')->insert($guru);
        }
    }
}
