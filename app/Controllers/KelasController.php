<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kelas_model;
use App\Models\Pengguna_model;
use App\Models\Training_model;

class KelasController extends BaseController
{
    protected $kelasModel;
    protected $penggunaModel;
    protected $validation;

    public function __construct()
    {
        $this->kelasModel = new Kelas_model();
        $this->penggunaModel = new Pengguna_model();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        if (!session()->get('email')) {
            return redirect()->to(base_url('/dashboard/login'));
        }

        $perPage = 10;
        $data['kelas'] = $this->kelasModel->getKelasWithMemberCount()->paginate($perPage);
        $data['pager'] = $this->kelasModel->pager;

        $data['jumlah_kelas'] = $this->kelasModel->getKelasNumRows();

        $data['daftar_pengguna'] = $this->penggunaModel->where('status', 'aktif')->findAll();

        $data['training'] = (new Training_model())->getTrainingNumRows();
        $data['jumlah_pengguna'] = $this->penggunaModel->getPenggunaNumRows();
        $data['jadwal'] = 0;

        $data['nomor'] = 1 + ($perPage * ($data['pager']->getCurrentPage() - 1));

        return view('pages/dashboard/kelas', $data);
    }

    public function create()
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $rules = [
            'nama_kelas'   => 'required|min_length[3]|max_length[255]',
            'deskripsi'    => 'permit_empty|max_length[500]',
            'jadwal_kelas' => 'required|valid_date[Y-m-d\TH:i]',
            'selected_users' => 'permit_empty',
        ];

        $messages = [
            'nama_kelas' => [
                'required'   => 'Nama kelas wajib diisi.',
                'min_length' => 'Nama kelas minimal 3 karakter.',
                'max_length' => 'Nama kelas maksimal 255 karakter.',
            ],
            'jadwal_kelas' => [
                'required'       => 'Jadwal kelas wajib diisi.',
                'valid_date'     => 'Format jadwal kelas tidak valid (YYYY-MM-DDTHH:MM).',
            ],
        ];

        $this->validation->setRules($rules, $messages);

        if ($this->validation->withRequest($this->request)->run()) {
            $jadwalKelasInput = $this->request->getPost('jadwal_kelas');
            $timezone = 'Asia/Jakarta';
            $now = new \DateTime('now', new \DateTimeZone($timezone));
            $currentTime = $now->format('Y-m-d\TH:i');

            if (strtotime($jadwalKelasInput) < strtotime($currentTime)) {
                return redirect()->back()->withInput()->with('errors', ['jadwal_kelas' => 'Jadwal kelas tidak boleh sebelum tanggal dan waktu sekarang.']);
            }

            $kelasData = [
                'nama_kelas'   => $this->request->getPost('nama_kelas'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
                'jadwal_kelas' => $this->request->getPost('jadwal_kelas'),
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ];

            try { 
                $this->kelasModel->insert($kelasData);
                $id_kelas_baru = $this->kelasModel->insertID();
                log_message('debug', 'Kelas baru berhasil disimpan. ID Kelas: ' . $id_kelas_baru);
            } catch (\Exception $e) {
                log_message('error', 'Gagal menyimpan kelas utama: ' . $e->getMessage());
                return redirect()->back()->withInput()->with('errors', ['kelas' => 'Gagal menyimpan data kelas utama.']);
            }
            
            $selectedUsers = $this->request->getPost('selected_users') ?? [];
            $selectedUsers = array_filter($selectedUsers); 

            log_message('debug', 'Selected Users (setelah filter) untuk create: ' . json_encode($selectedUsers));

            if (!empty($selectedUsers) && $id_kelas_baru) {
                $db = \Config\Database::connect();
                $builder = $db->table('kelas_pengguna');
                log_message('debug', 'Memulai loop insert peserta ke kelas_pengguna (create).');
                foreach ($selectedUsers as $userId) {
                    if (!empty($userId)) { 
                        try {
                            $builder->insert(['id_kelas' => $id_kelas_baru, 'id_pengguna' => $userId]);
                            log_message('debug', 'Berhasil insert relasi (create): Kelas ID ' . $id_kelas_baru . ', User ID ' . $userId);
                        } catch (\Exception $e) {
                            log_message('error', 'Gagal insert relasi (create): Kelas ID ' . $id_kelas_baru . ', User ID ' . $userId . ' - Error: ' . $e->getMessage());
                        }
                    } else {
                        log_message('debug', 'Skipping empty userId in create loop.');
                    }
                }
                log_message('debug', 'Loop insert peserta selesai (create).');
            } else {
                log_message('debug', 'Tidak ada peserta yang dipilih atau id_kelas_baru kosong untuk create. SelectedUsers: ' . json_encode($selectedUsers) . ' id_kelas_baru: ' . $id_kelas_baru);
            }

            return redirect()->to('dashboard/kelas')->with('success', 'Kelas berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
    }

    public function update($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->back();
        }

        $rules = [
            'nama_kelas'   => 'required|min_length[3]|max_length[255]',
            'deskripsi'    => 'permit_empty|max_length[500]',
            'jadwal_kelas' => 'required|valid_date[Y-m-d\TH:i]',
            'selected_users' => 'permit_empty',
        ];

        $this->validation->setRules($rules);

        if ($this->validation->withRequest($this->request)->run()) {
            $jadwalKelasInput = $this->request->getPost('jadwal_kelas');
            $timezone = 'Asia/Jakarta';
            $now = new \DateTime('now', new \DateTimeZone($timezone));
            $currentTime = $now->format('Y-m-d\TH:i');

            if (strtotime($jadwalKelasInput) < strtotime($currentTime)) {
                return redirect()->back()->withInput()->with('errors', ['jadwal_kelas' => 'Jadwal kelas tidak boleh sebelum tanggal dan waktu sekarang.']);
            }

            $kelasData = [
                'nama_kelas'   => $this->request->getPost('nama_kelas'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
                'jadwal_kelas' => $this->request->getPost('jadwal_kelas'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ];

            try { 
                $this->kelasModel->update($id, $kelasData);
                log_message('debug', 'Kelas berhasil diupdate. ID Kelas: ' . $id);
            } catch (\Exception $e) {
                log_message('error', 'Gagal mengupdate kelas utama: ' . $e->getMessage());
                return redirect()->back()->withInput()->with('errors', ['kelas' => 'Gagal mengupdate data kelas utama.']);
            }

            $db = \Config\Database::connect();
            $builder = $db->table('kelas_pengguna');
            
            try { 
                $builder->where('id_kelas', $id)->delete();
                log_message('debug', 'Relasi lama untuk Kelas ID ' . $id . ' berhasil dihapus.');
            } catch (\Exception $e) {
                log_message('error', 'Gagal menghapus relasi lama untuk Kelas ID ' . $id . ' - Error: ' . $e->getMessage());
            }

            $selectedUsers = $this->request->getPost('selected_users') ?? [];
            $selectedUsers = array_filter($selectedUsers); 

            log_message('debug', 'Selected Users (setelah filter) untuk update: ' . json_encode($selectedUsers));

            if (!empty($selectedUsers)) {
                log_message('debug', 'Memulai loop insert peserta ke kelas_pengguna (update).');
                foreach ($selectedUsers as $userId) {
                    if (!empty($userId)) { 
                        try {
                            $builder->insert(['id_kelas' => $id, 'id_pengguna' => $userId]);
                            log_message('debug', 'Berhasil insert relasi (update): Kelas ID ' . $id . ', User ID ' . $userId);
                        } catch (\Exception $e) {
                            log_message('error', 'Gagal insert relasi (update): Kelas ID ' . $id . ', User ID ' . $userId . ' - Error: ' . $e->getMessage());
                        }
                    } else {
                        log_message('debug', 'Skipping empty userId in update loop.');
                    }
                }
                log_message('debug', 'Loop insert peserta selesai (update).');
            } else {
                log_message('debug', 'Tidak ada peserta yang dipilih untuk update. SelectedUsers: ' . json_encode($selectedUsers) . ' id_kelas: ' . $id);
            }

            return redirect()->to('dashboard/kelas')->with('success', 'Kelas berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
    }

    public function delete($id)
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            $builder = $db->table('kelas_pengguna');
            try { 
                $builder->where('id_kelas', $id)->delete();
                log_message('debug', 'Relasi berhasil dihapus untuk Kelas ID ' . $id);
            } catch (\Exception $e) {
                log_message('error', 'Gagal menghapus relasi untuk Kelas ID ' . $id . ' - Error: ' . $e->getMessage());
            }
            
            try { 
                $this->kelasModel->delete($id);
                log_message('debug', 'Kelas berhasil dihapus. ID Kelas: ' . $id);
            } catch (\Exception $e) {
                log_message('error', 'Gagal menghapus kelas utama: ' . $e->getMessage());
            }

            return $this->response->setStatusCode(200)->setJSON(['message' => 'Kelas berhasil dihapus.']);
        } else {
            return redirect()->back()->with('error', 'Permintaan tidak valid.');
        }
    }

    public function getKelasWithUsers($id)
    {
        $kelas = $this->kelasModel->find($id);
        if (!$kelas) {
            log_message('debug', 'getKelasWithUsers: Kelas ID ' . $id . ' tidak ditemukan.');
            return $this->response->setJSON(['error' => 'Kelas tidak ditemukan'])->setStatusCode(404);
        }
        log_message('debug', 'getKelasWithUsers: Kelas ditemukan: ' . json_encode($kelas));

        $db = \Config\Database::connect();
        $builder = $db->table('kelas_pengguna');
        $builder->select('pengguna.id_pengguna, pengguna.nama, pengguna.email');
        $builder->join('pengguna', 'pengguna.id_pengguna = kelas_pengguna.id_pengguna');
        $builder->where('kelas_pengguna.id_kelas', $id);
        
        $sql = $builder->getCompiledSelect(); 
        log_message('debug', 'getKelasWithUsers SQL Query for participants: ' . $sql);

        $selectedUsers = $builder->get()->getResultArray();
        log_message('debug', 'getKelasWithUsers Peserta ditemukan: ' . json_encode($selectedUsers));
        
        $kelas['selected_users_data'] = $selectedUsers; 
        $kelas['selected_users_ids'] = array_column($selectedUsers, 'id_pengguna'); 

        if (isset($kelas['jadwal_kelas'])) {
            $kelas['jadwal_kelas_formatted'] = date('Y-m-d\TH:i', strtotime($kelas['jadwal_kelas']));
        } else {
            $kelas['jadwal_kelas_formatted'] = '';
        }

        return $this->response->setJSON($kelas);
    }
}