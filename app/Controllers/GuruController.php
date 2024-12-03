<?php

namespace App\Controllers;
use App\Models\Guru_model;
use App\Models\Jabatan_model;

class GuruController extends BaseController
{
    public function index()
    {
        $data_guru = new Guru_model();
        if($key = $this->request->getGet('key')){
            $data['guru'] = $data_guru->getGuru($key);
        }else{
            $data['guru'] = $data_guru->getGuru();
        }

        if($jabatan = $this->request->getGet('jabatan')){
            $data['guru'] = $data_guru->getGuruByJabatan($jabatan);
        }
        
        $data_jabatan = new Jabatan_model();
        $data['jabatan'] = $data_jabatan->getJabatan();


        return view('pages/guru/tim', $data);
    }
}
