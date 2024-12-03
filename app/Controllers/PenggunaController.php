<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna_model;
use App\Models\Training_model;
use CodeIgniter\HTTP\ResponseInterface;

class PenggunaController extends BaseController
{

    public function __construct()
    {
        $this->training = new Training_model();
        $this->pengguna = new Pengguna_model();
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
        $validation = \Config\Services::validation();
        $validation->setRules([
            "nama" => "required",
            "email" => "required",
            "nomor_wa" => "required",
            "status" => "required",
        ]);

        if ($validation->withRequest($this->request)->run()) {
                $this->pengguna->insert([
                    "nama" => $this->request->getPost('nama'),
                    "email" => $this->request->getPost('email'),
                    "nomor_wa" => $this->request->getPost('nomor_wa'),
                    "status" => $this->request->getPost('status'),
                    "created_at" => date('Y-m-d H:i:s')
                ]);
                return redirect()->to('dashboard')->with('success', 'Pengguna added successfully.');
            }
            else {
                return redirect()->back()->with('error', 'There was a problem adding the pengguna.');
            }
    }

    public function getPenggunaData($id)
    {
        $data = $this->pengguna->getPengguna($id);
        return $this->response->setJSON($data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "nama" => "required",
            "email" => "required",
            "nomor_wa" => "required",
            "status" => "required",
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $this->pengguna->update($id, [
                "nama" => $this->request->getPost('nama'),
                "email" => $this->request->getPost('email'),
                "nomor_wa" => $this->request->getPost('nomor_wa'),
                "status" => $this->request->getPost('status'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            return redirect()->to('/dashboard')->with('success', 'Pengguna updated successfully.');
        } else {
            return redirect()->back()->with('error', 'There was a problem updating the pengguna.');
        }
    }

    public function delete($id)
    {
        $this->pengguna->delete($id);
        return redirect()->to('/dashboard')->with('success', 'Pengguna deleted successfully.');
    }
}
