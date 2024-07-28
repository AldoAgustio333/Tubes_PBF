<?php

namespace App\Controllers;
use App\Models\Galeri_model;
use App\Models\Guru_model;

class Home extends BaseController
{
    public function index(): string
    {
        $data_guru = new Guru_model();
        $data['guru'] = $data_guru->getGuru();

        $data_kegiatan = new Galeri_model();
        $data['kegiatan'] = $data_kegiatan->getFiveKegiatan();
        return view('home', $data);
    }

    public function help() : string
    {
        return view('help');
    }
}
