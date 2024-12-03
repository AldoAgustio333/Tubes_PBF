<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Training extends Seeder
{
    public function run()
    {
        $data_training = [
            [
                'nama' => 'Penggunaan Teknologi Bantu untuk Siswa Disabilitas',
                'tanggal' => '2024-08-16',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '16:30:00',
                'tempat' => 'Ruang Seminar, Universitas Pendidikan Indonesia, Bandung',
                'image' => 'training_1.png'
            ],
            [
                'nama' => 'Manajemen Perilaku dalam Pendidikan Inklusif',
                'tanggal' => '2024-08-25',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '13:00:00',
                'tempat' => 'Sekolah ABC, Surabaya',
                'image' => 'training_2.png'
            ],
            [
                'nama' => 'Implementasi Teknologi Bantu di Rumah dan Sekolah',
                'tanggal' => '2024-08-29',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:00:00',
                'tempat' => 'Pusat Pelatihan Pendidikan Inklusif, Jakarta',
                'image' => 'training_3.png'
            ]
        ];

        foreach($data_training as $training)
        {
            $this->db->table('training')->insert($training);
        }
    }
}
