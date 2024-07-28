<?php

namespace App\Controllers;
use App\Models\Galeri_model;

class GaleriController extends BaseController
{
    public function index()
    {
        $data_galeri = new Galeri_model();
        $key = $this->request->getGet('key');
        $data['galeri'] = $data_galeri->getKegiatan($key);
        
        return view('administrasi', $data);
    }
}
