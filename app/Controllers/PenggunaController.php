<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna_model;
use App\Models\Training_model;

class PenggunaController extends BaseController
{
    protected $pengguna;
    protected $training;
    protected $validation;

    public function __construct()
    {
        $this->pengguna = new Pengguna_model();
        $this->training = new Training_model();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['training'] = $this->training->getTrainingNumRows();
        $data['pengguna'] = $this->pengguna->getPengguna();
        $data['jumlah_pengguna'] = $this->pengguna->getPenggunaNumRows();

        if (session()->get('email')) {
            return view('pages/dashboard/main', $data);
        } else {
            return redirect()->to(base_url('/dashboard/login'));
        }
    }

    public function create()
    {
        $this->validation->setRules([
            "nama" => "required",
            "email" => "required|valid_email|is_unique[pengguna.email]",
            "nomor_wa" => "required|numeric",
            "status" => "required|in_list[aktif,tidak aktif]",
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $this->pengguna->insert([
                "nama" => $this->request->getPost('nama'),
                "email" => $this->request->getPost('email'),
                "nomor_wa" => $this->request->getPost('nomor_wa'),
                "status" => $this->request->getPost('status'),
                "created_at" => date('Y-m-d H:i:s')
            ]);
            return redirect()->to('dashboard')->with('success', 'Pengguna added successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', $this->validation->listErrors());
        }
    }

    public function getPenggunaData($id)
    {
        $data = $this->pengguna->find($id);
        return $this->response->setJSON($data);
    }

    public function update($id)
    {
        $this->validation->setRules([
            "nama" => "required",
            "email" => "required|valid_email|is_unique[pengguna.email,id_pengguna," . $id . "]",
            "nomor_wa" => "required|numeric",
            "status" => "required|in_list[aktif,tidak aktif]",
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $this->pengguna->update($id, [
                "nama" => $this->request->getPost('nama'),
                "email" => $this->request->getPost('email'),
                "nomor_wa" => $this->request->getPost('nomor_wa'),
                "status" => $this->request->getPost('status'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            return redirect()->to('/dashboard')->with('success', 'Pengguna updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', $this->validation->listErrors());
        }
    }

    public function delete($id)
    {
        if ($this->request->isAJAX()) {
            $this->pengguna->delete($id);
            return $this->response->setStatusCode(200)->setJSON(['message' => 'Pengguna deleted successfully.']);
        } else {
            return redirect()->back()->with('error', 'Invalid request.');
        }
    }
}