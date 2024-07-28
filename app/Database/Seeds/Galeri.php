<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Galeri extends Seeder
{
    public function run()
    {
        //
        $data_kegiatan = [
            [
                'nama_kegiatan' => 'Kegiatan 1',
                'tanggal_mulai' => '2021-01-01',
                'tanggal_selesai' => '2021-01-02',
                'deskripsi' => 'Kegiatan 1',
                'image' => 'kegiatan1.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan 2',
                'tanggal_mulai' => '2021-02-01',
                'tanggal_selesai' => '2021-02-02',
                'deskripsi' => 'Kegiatan 2',
                'image' => 'kegiatan2.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan 3',
                'tanggal_mulai' => '2021-03-01',
                'tanggal_selesai' => '2021-03-02',
                'deskripsi' => 'Kegiatan 3',
                'image' => 'kegiatan3.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan 4',
                'tanggal_mulai' => '2021-04-01',
                'tanggal_selesai' => '2021-04-02',
                'deskripsi' => 'Kegiatan 4',
                'image' => 'kegiatan4.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan 5',
                'tanggal_mulai' => '2021-05-01',
                'tanggal_selesai' => '2021-05-02',
                'deskripsi' => 'Kegiatan 5',
                'image' => 'kegiatan5.jpg'
            ]
        ];

        foreach($data_kegiatan as $kegiatan)
        {
            $this->db->table('galeri')->insert($kegiatan);
        }
    }
}
