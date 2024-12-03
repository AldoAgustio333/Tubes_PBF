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
                'nama_kegiatan' => 'Kegiatan Outbond Reqlax, Refresh, Recharge UPTD LDPI',
                'tanggal_mulai' => '2023-12-14',
                'tanggal_selesai' => '2023-12-15',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Amet corrupti nesciunt et illum porro! Quia temporibus iure dignissimos 
                quos reprehenderit animi molestiae enim veniam ut? Debitis eaque quas ipsum ratione.',
                'image' => 'kegiatan1.jpg'
            ],
            [
                'nama_kegiatan' => 'Meeting UPTD LDPI',
                'tanggal_mulai' => '2023-12-14',
                'tanggal_selesai' => '2023-12-15',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Amet corrupti nesciunt et illum porro! Quia temporibus iure dignissimos 
                quos reprehenderit animi molestiae enim veniam ut? Debitis eaque quas ipsum ratione.',
                'image' => 'kegiatan2.jpg'
            ],
            [
                'nama_kegiatan' => 'Zoom Metting dengan Volunter LDPI Dari Australian Voluenters',
                'tanggal_mulai' => '2023-12-21',
                'tanggal_selesai' => '2023-12-21',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Amet corrupti nesciunt et illum porro! Quia temporibus iure dignissimos 
                quos reprehenderit animi molestiae enim veniam ut? Debitis eaque quas ipsum ratione.',
                'image' => 'kegiatan3.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan  Kelas Musik yang Didampingi Oleh Bapak Gilang',
                'tanggal_mulai' => '2023-09-29',
                'tanggal_selesai' => '2023-09-29',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Amet corrupti nesciunt et illum porro! Quia temporibus iure dignissimos 
                quos reprehenderit animi molestiae enim veniam ut? Debitis eaque quas ipsum ratione.',
                'image' => 'kegiatan4.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan Renang di Kolam Renang Radisa',
                'tanggal_mulai' => '2023-10-06',
                'tanggal_selesai' => '2023-10-06',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Amet corrupti nesciunt et illum porro! Quia temporibus iure dignissimos 
                quos reprehenderit animi molestiae enim veniam ut? Debitis eaque quas ipsum ratione.',
                'image' => 'kegiatan5.jpg'
            ],
            [
                'nama_kegiatan' => 'Kegiatan Kelas Musik yang Didampingi Oleh Bapak Gilang',
                'tanggal_mulai' => '2023-11-10',
                'tanggal_selesai' => '2023-11-10',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Amet corrupti nesciunt et illum porro! Quia temporibus iure dignissimos 
                quos reprehenderit animi molestiae enim veniam ut? Debitis eaque quas ipsum ratione.',
                'image' => 'kegiatan6.jpg'
            ]
        ];

        foreach($data_kegiatan as $kegiatan)
        {
            $this->db->table('galeri')->insert($kegiatan);
        }
    }
}
