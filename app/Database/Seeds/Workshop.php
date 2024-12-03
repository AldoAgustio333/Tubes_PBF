<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Workshop extends Seeder
{
    public function run()
    {
        $data_workshop = [
            [
                'nama' => 'Strategi Komunikasi Alternatif untuk Anak dengan Gangguan Bicara',
                'tanggal' => '2024-08-16',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '16:30:00',
                'tempat' => 'Ruang Seminar, Universitas Pendidikan Indonesia, Bandung',
                'image' => 'workshop_1.png'
            ],
        ];

        foreach($data_workshop as $workshop)
        {
            $this->db->table('workshop')->insert($workshop);
        }
    }
}
