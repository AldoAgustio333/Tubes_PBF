<?php

namespace App\Controllers;
use App\Models\Galeri_model;

class GaleriController extends BaseController
{
    public function index()
    {
        $data_galeri = new Galeri_model();
        if($key = $this->request->getGet('key')) {
            $data['galeri'] = $data_galeri->getKegiatanByName($key);
        } else {
            $data['galeri'] = $data_galeri->getKegiatan();
        }

        if($year = $this->request->getGet('tahun')) {
            $data['galeri'] = $data_galeri->getKegiatanByYear($year);
        }
        
        return view('pages/berita/berita', $data);
    }

    public function detail($key)
    {
        $data_galeri = new Galeri_model();
        $data['berita'] = $data_galeri->getKegiatan($key);
        
        return view('pages/berita/detail', $data);
    }
}
