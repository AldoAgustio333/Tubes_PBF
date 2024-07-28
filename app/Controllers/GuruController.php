<?php

namespace App\Controllers;
use App\Models\Guru_model;

class GuruController extends BaseController
{
    public function index()
    {
        $data_guru = new Guru_model();
        $key = $this->request->getGet('key');
        $data['guru'] = $data_guru->getGuru($key);
        return view('parenting/tim', $data);
    }
}
