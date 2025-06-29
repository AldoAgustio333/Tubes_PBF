<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Absensi_model;
use App\Models\Kelas_model;
use App\Models\Pengguna_model;

class Absensi extends BaseController
{
    protected $absensiModel;
    protected $kelasModel;
    protected $penggunaModel;
    protected $validation;

    public function __construct()
    {
        $this->absensiModel = new Absensi_model();
        $this->kelasModel = new Kelas_model();
        $this->penggunaModel = new Pengguna_model();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        if (!session()->get('email')) {
            return redirect()->to(base_url('/dashboard/login'));
        }

        $data['daftar_kelas'] = $this->kelasModel
            ->orderBy('jadwal_kelas', 'DESC')
            ->findAll();

        return view('pages/dashboard/absensi', $data);
    }

    //Mengambil daftar peserta berdasarkan ID kelas
    public function getParticipantsByClass($id_kelas)
    {
        // Pastikan id_kelas adalah integer untuk keamanan
        if (!is_numeric($id_kelas)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'ID Kelas tidak valid.']);
        }

        $db = \Config\Database::connect();
        $builder = $db->table('kelas_pengguna');

        // PENTING: Memilih kolom id_pengguna, nama, dan email dari tabel 'pengguna'.
        $builder->select('pengguna.id_pengguna, pengguna.nama, pengguna.email');
        
        // Menggabungkan dengan tabel 'pengguna' untuk mendapatkan detail peserta.
        $builder->join('pengguna', 'pengguna.id_pengguna = kelas_pengguna.id_pengguna');
        
        // Memfilter berdasarkan id_kelas yang diberikan.
        $builder->where('kelas_pengguna.id_kelas', $id_kelas);
        
        // Mengambil hasil query sebagai array.
        $participants = $builder->get()->getResultArray();

        // Mengembalikan data peserta dalam format JSON.
        return $this->response->setJSON($participants);
    }


    public function simpanAbsensi()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $rules = [
            'id_kelas'      => 'required|integer',
            'tanggal'       => 'required|valid_date[Y-m-d]',
            'id_pengguna'   => 'required|is_array',
            'id_pengguna.*' => 'required|integer',
            'status'        => 'required|is_array',
            'status.*'      => 'required|in_list[hadir,izin,sakit,alpa]',
            'keterangan'    => 'permit_empty|max_length[500]',
        ];

        $messages = [
            'id_kelas' => [
                'required' => 'Kelas wajib dipilih.',
                'integer'  => 'Kelas tidak valid.',
            ],
            'tanggal' => [
                'required'   => 'Tanggal absensi wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.',
            ],
            'id_pengguna' => [
                'required' => 'Tidak ada peserta yang dipilih untuk diabsen.',
            ],
            'status.*' => [
                'required' => 'Status untuk setiap peserta wajib dipilih.',
                'in_list'  => 'Status absensi yang dipilih tidak valid.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id_kelas = $this->request->getPost('id_kelas');
        $tanggal = $this->request->getPost('tanggal');
        $keterangan = $this->request->getPost('keterangan');
        $selected_pengguna_ids = $this->request->getPost('id_pengguna');
        $statuses = $this->request->getPost('status');

        $dataToInsert = [];
        foreach ($selected_pengguna_ids as $key => $pengguna_id) {
            $dataToInsert[] = [
                'id_kelas'    => $id_kelas,
                'id_pengguna' => $pengguna_id,
                'tanggal'     => $tanggal,
                'status'      => $statuses[$key],
                'keterangan'  => $keterangan,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }

        if (!empty($dataToInsert)) {
            $this->absensiModel->insertBatch($dataToInsert);
        }

        return redirect()->to(base_url('/dashboard/absensi'))->with('success', 'Absensi berhasil disimpan.');
    }
}