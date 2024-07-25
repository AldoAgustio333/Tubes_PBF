<?php

namespace App\Controllers;

class Layanan extends BaseController
{
    public function about(): string
    {
        return view('about');
    }

    public function visiMisi(): string
    {
        return view('visi-misi');
    }

    public function asesmen(): string
    {
        return view('asesmen');
    }

    public function sopLayanan(): string
    {
        return view('sop_layanan');
    }
}
