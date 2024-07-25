<?php

namespace App\Controllers;

class Parenting extends BaseController
{
    public function syaratDaftar(): string
    {
        return view('syarat-daftar');
    }

    public function tim(): string
    {
        return view('tim');
    }
}
