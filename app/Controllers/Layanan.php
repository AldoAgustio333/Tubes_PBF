<?php

namespace App\Controllers;

class Layanan extends BaseController
{
    public function about(): string
    {
        return view('layanan/about');
    }

    public function visiMisi(): string
    {
        return view('layanan/visi-misi');
    }

    public function asesmen(): string
    {
        return view('layanan/asesmen');
    }

    public function sopLayanan(): string
    {
        return view('layanan/sop_layanan');
    }
}
