<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna_model;
use App\Models\Training_model;
use App\Models\User_model;
use App\Models\Workshop_model;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->training = new Training_model();
        $this->pengguna = new Pengguna_model();
        $this->user = new User_model();
        $this->workshop = new Workshop_model();
    }
    public function index()
    {
        $data = [
            'training' => $this->training->getTrainingNumRows(),
            'jadwal' => $this->training->getTrainingNumRows() + $this->workshop->geWorkshopNumRows(),
            'pengguna' => $this->pengguna->paginate(5, 'group1'),
            'jumlah_pengguna' => $this->pengguna->getPenggunaNumRows(),
            'pager' => $this->pengguna->pager,
            'nomor' => nomor($this->request->getVar('page_group1'), 5)
        ];
        if (session()->get('email')) {
            return view('pages/dashboard/main', $data);
        } else {
            return redirect()->to(base_url('/dashboard/login'));
        }
    }

    public function login()
    {
        if(session()->get('email')){
            return redirect()->to(base_url('/dashboard'));
        } else {
            return view('pages/dashboard/login');
        }
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $this->user->where('email', $email)->first();
        if ($data) {
            if (password_verify($password, $data['password'])) {
                $session = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'email' => $data['email']
                ];
                session()->set($session);
                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('msg', 'Password Salah');
                return redirect()->to(base_url('/dashboard/login'));
            }
        } else {
            session()->setFlashdata('msg', 'Email Tidak Terdaftar');
            return redirect()->to(base_url('/dashboard/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/dashboard/login'));
    }
}
