<?php

namespace App\Controllers;

use App\Models\Galeri_model;
use App\Models\Guru_model;
use App\Models\PertanyaanModel;

class Pages extends BaseController
{
    protected $pertanyaanModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
    }

    public function index()
    {
        $data_guru = new Guru_model();
        
        $data['guru'] = []; 

        $data_kegiatan = new Galeri_model();
        
        $data['kegiatan'] = []; 

        return view('pages/home', $data);
    }

    public function about()
    {
        return view('pages/about');
    }

    public function visiMisi()
    {
        return view('pages/visi_misi');
    }

    public function asesmen()
    {
        return view('pages/asesmen');
    }

    public function sopLayanan()
    {
        return view('pages/sop_layanan');
    }

    public function syaratDaftar()
    {
        return view('pages/syarat_daftar');
    }

    public function kelasTransisi(): string
    {
        return view('pages/kelas_transisi');
    }

    public function remedialTeaching(): string
    {
        return view('pages/remedial_teaching');
    }

    public function interverensiOkupasi(): string
    {
        return view('pages/interverensi_okupasi');
    }

    public function binaWicara(): string
    {
        return view('pages/bina_wicara');
    }


    public function login(): string
    {
        return view('pages/login');
    }

    public function register(): string
    {
        return view('pages/register');
    }
    

    public function daftar(): string
    {
        return view('pages/daftar');
    }

    public function lupaPassword(): string
    {
        return view('pages/lupa-password');
    }

    public function help(): string
    {
        return view('pages/help');
    }

    public function tanyaJawab(): string
    {
        $data['tanya_jawab'] = $this->pertanyaanModel->where('jawaban IS NOT NULL')->orderBy('created_at', 'DESC')->findAll();
        return view('pages/tanya_jawab', $data);
    }

    public function galeriKegiatan(): string
    {
        return view('pages/galeri_kegiatan');
    }

    public function kritikSaran(): string
    {
        return view('pages/kritik_saran');
    }
}