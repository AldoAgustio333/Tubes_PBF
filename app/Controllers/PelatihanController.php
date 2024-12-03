<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna_model;
use CodeIgniter\HTTP\ResponseInterface;

class PelatihanController extends BaseController
{

    public function __construct()
    {
        $this->pengguna = new Pengguna_model();
    }

    public function index()
    {
        return view('pages/pelatihan');
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "nama" => "required",
            "email" => "required",
            "nomor_wa" => "required",
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $this->pengguna->insert([
                "nama" => $this->request->getPost('nama'),
                "email" => $this->request->getPost('email'),
                "nomor_wa" => $this->request->getPost('nomor_wa'),
                "status" => 'aktif',
                "created_at" => date('Y-m-d H:i:s')
            ]);

            return redirect()->to('/pelatihan')->with('success', 'Pengguna added successfully.');
        }
        else {
            return redirect()->back()->with('error', 'There was a problem adding the pengguna.');
        }
    }
}
