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
                'nama_guru' => 'YOSZYA SILAWATI, S.Pd.M.Si',
                'id_jabatan' => 1,
                'image' => 'Picture1.jpg',
                'posisi' => 'Kepala'
            ],
            [
                'nama_guru' => 'GAMAHARTA DINI, S.IP., M.Si',
                'id_jabatan' => 2,
                'image' => 'Picture2.jpg',
                'posisi' => 'Kepala Sub Bagian Tata Usaha'
            ],
            [
                'nama_guru' => 'ARISUL MAHDI, M.Pd',
                'id_jabatan' => 3,
                'image' => 'Picrute3.jpg',
                'posisi' => 'Tenaga Ahli Pendidikan Khusus'
            ],
            [
                'nama_guru' => 'Dr. ROZI SASTRA PURNA, M. Psi, Psikolog',
                'id_jabatan' => 3,
                'image' => 'Picture4.jpg',
                'posisi' => 'Tenaga Ahli Psikolog'
            ],
            [
                'nama_guru' => 'YUSTISI MAHARANI S, M.Psi',
                'id_jabatan' => 3,
                'image' => 'Picture5.jpg',
                'posisi' => 'Tenaga Ahli Psikolog'
            ],
            [
                'nama_guru' => 'Dr. dr. ZUHRA TAUFIQA, M.Biomed',
                'id_jabatan' => 3,
                'image' => 'Picture6.jpg',
                'posisi' => 'Tenaga Ahli Gizi'
            ],
            [
                'nama_guru' => 'drg. VALENDRIYANI NINGRUM, MPH',
                'id_jabatan' => 3,
                'image' => 'Picture7.jpg',
                'posisi' => 'Tenaga Ahli Gigi'
            ],
            [
                'nama_guru' => 'GILANG DWI NANDA, S.Pd, Gr',
                'id_jabatan' => 3,
                'image' => 'Picture8.jpg',
                'posisi' => 'Tenaga Ahli Vokal'
            ],
            [
                'nama_guru' => 'FAJRUL SYAH KHAIRI, S.Pd',
                'id_jabatan' => 3,
                'image' => 'Picture9.jpg',
                'posisi' => 'Tenaga Ahli Musik'
            ],
            [
                'nama_guru' => 'FATRIA FEBRIANTI, S.Psi',
                'id_jabatan' => 4,
                'image' => 'Picture10.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'FIRMA DINA, S.Pd',
                'id_jabatan' => 4,
                'image' => 'Picture11.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'SHANIA DEALMA YUSRAN,  S.Psi',
                'id_jabatan' => 4,
                'image' => 'Picture12.jpg',
                'posisi' => 'Tenaga Administrasi'
            ],
            [
                'nama_guru' => 'NINGRUM YOLANDA PUTRI, S.Psi',
                'id_jabatan' => 4,
                'image' => 'Picture13.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'NOFRIADI, S.Pd. Gr',
                'id_jabatan' => 4,
                'image' => 'Picture14.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'RAJA IMAM AKBAR SIREGAR, S.H',
                'id_jabatan' => 4,
                'image' => 'Picture15.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'YUDHI MISWANDI, S.Psi',
                'id_jabatan' => 4,
                'image' => 'Picture16.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'YULIA SUSANTI, S.E',
                'id_jabatan' => 4,
                'image' => 'Picture17.jpg',
                'posisi' => 'Analis Peserta Didik - Asesmen'
            ],
            [
                'nama_guru' => 'ANNISA HARMIZA PUTRI, S.Pd',
                'id_jabatan' => 5,
                'image' => 'Picture18.jpg',
                'posisi' => 'Analis Peserta Didik - Interversi'
            ],
            [
                'nama_guru' => 'ANNISA YUNIKA SYAHRIL, A.Md. Kes',
                'id_jabatan' => 5,
                'image' => 'Picture19.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'ANNITA SEPTIARA SARI, S.Kes',
                'id_jabatan' => 3,
                'image' => 'Picture20.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'DEBY YOLANDA, S.Pd',
                'id_jabatan' => 5,
                'image' => 'Picture21.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'DEVIANA ETIKA K, S. Sn',
                'id_jabatan' => 5,
                'image' => 'Picture22.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'FITRIA MASROZA, S.Pd',
                'id_jabatan' => 5,
                'image' => 'Picture23.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'INDRA, S.Pd',
                'id_jabatan' => 5,
                'image' => 'Picture24.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'MIKE JUNI YANTI, S.Thi, M.Pd',
                'id_jabatan' => 5,
                'image' => 'Picture25.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'FIKRI FADHILLAH, S.Psi',
                'id_jabatan' => 5,
                'image' => 'Picture26.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'RAHMA DANIATI, S.Pd',
                'id_jabatan' => 5,
                'image' => 'Picture27.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'RIDHO RAMADHANDI,  S.Psi',
                'id_jabatan' => 5,
                'image' => 'Picture28.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'RIDO HERDIANSYAH,  S.Psi',
                'id_jabatan' => 5,
                'image' => 'Picture29.jpg',
                'posisi' => 'Analis Peserta Didik - Intervensi'
            ],
            [
                'nama_guru' => 'SRI WAHYUNI, S.Pd',
                'id_jabatan' => 6,
                'image' => 'Picture30.jpg',
                'posisi' => 'Tenaga Administrasi'
            ],
            [
                'nama_guru' => 'AMALIA PUTRI, S.Psi',
                'id_jabatan' => 6,
                'image' => 'Picture31.jpg',
                'posisi' => 'Tenaga Administrasi'
            ],
            [
                'nama_guru' => 'NADIRA HILMI ISRAR, SE',
                'id_jabatan' => 6,
                'image' => 'Picture32.jpg',
                'posisi' => 'Tenaga Administrasi'
            ],
            [
                'nama_guru' => 'NADYA SATYA DILOVA, S.AP',
                'id_jabatan' => 6,
                'image' => 'Picture33.jpg',
                'posisi' => 'Tenaga Administrasi'
            ],
            [
                'nama_guru' => 'DILLA APRI LAILA, S.M',
                'id_jabatan' => 6,
                'image' => 'Picture34.jpg',
                'posisi' => 'Tenaga Administrasi'
            ],
            [
                'nama_guru' => 'YUSMANTO, S.Kom',
                'id_jabatan' => 6,
                'image' => 'Picture35.jpg',
                'posisi' => 'Tenaga Administrasi'
            ]
            
        ];

        foreach($data_guru as $guru)
        {
            $this->db->table('guru')->insert($guru);
        }
    }
}
