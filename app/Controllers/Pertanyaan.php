<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use CodeIgniter\API\ResponseTrait;

class Pertanyaan extends BaseController
{
    use ResponseTrait;

    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
    }

    public function index()
    {
        $data['tanya_jawab'] = $this->pertanyaanModel->where('jawaban IS NOT NULL')->orderBy('created_at', 'DESC')->findAll();
        return view('pages/tanya_jawab', $data);
    }

    public function submitFrontend()
    {
        if ($this->request->is('post')) { 
            if (!$this->validate($this->pertanyaanModel->validationRules, $this->pertanyaanModel->validationMessages)) {
                return $this->respond(['status' => 'fail', 'messages' => $this->validator->getErrors()], 400);
            }

            $data = [
                'nama_lengkap'      => $this->request->getPost('nama_lengkap'),
                'subjek_pertanyaan' => $this->request->getPost('subjek_pertanyaan'),
                'email'             => $this->request->getPost('email'),
                'pertanyaan'        => $this->request->getPost('pertanyaan'),
                'jawaban'           => null,
            ];

            if ($this->pertanyaanModel->insert($data)) {
                return $this->respondCreated(['status' => 'created', 'message' => 'Pertanyaan Anda berhasil dikirim!']);
            } else {
                return $this->respond(['status' => 'fail', 'message' => 'Gagal mengirim pertanyaan.'], 500);
            }
        } else {
            return $this->respond(['status' => 'fail', 'message' => 'Akses tidak diizinkan.'], 403);
        }
    }

    public function kelola()
    {
        $data['pertanyaan'] = $this->pertanyaanModel->orderBy('created_at', 'DESC')->findAll();
        return view('pages/dashboard/kelola_pertanyaan', $data);
    }

    public function jawab($id = null)
    {
        if ($this->request->is('post')) {
            if ($id === null) {
                return $this->respond(['status' => 'fail', 'message' => 'ID Pertanyaan tidak ditemukan.'], 404);
            }

            $rules = ['jawaban' => 'required'];
            $messages = [ 'jawaban' => [ 'required' => 'Jawaban wajib diisi.' ] ];

            if (!$this->validate($rules, $messages)) {
                return $this->respond(['status' => 'fail', 'messages' => $this->validator->getErrors()], 400);
            }

            $data = ['jawaban' => $this->request->getPost('jawaban')];

            if ($this->pertanyaanModel->update($id, $data)) {
                return $this->respondUpdated(['status' => 'updated', 'message' => 'Jawaban berhasil disimpan!']);
            } else {
                return $this->respond(['status' => 'fail', 'message' => 'Gagal menyimpan jawaban.'], 500);
            }
        } else {
            return $this->respond(['status' => 'fail', 'message' => 'Metode tidak valid.'], 403);
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is('delete')) {
            if ($id === null) {
                return $this->respond(['status' => 'fail', 'message' => 'ID Pertanyaan tidak ditemukan.'], 404);
            }
            if ($this->pertanyaanModel->delete($id)) {
                return $this->respondDeleted(['status' => 'deleted', 'message' => 'Pertanyaan berhasil dihapus.']);
            } else {
                return $this->respond(['status' => 'fail', 'message' => 'Gagal menghapus pertanyaan.'], 500);
            }
        } else {
            return $this->respond(['status' => 'fail', 'message' => 'Metode tidak valid.'], 403);
        }
    }
}