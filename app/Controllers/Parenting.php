<?php

namespace App\Controllers;
use Guru_model;

class Parenting extends BaseController
{
    public function syaratDaftar(): string
    {
        return view('parenting/syarat-daftar');
    }

    public function tim(): string
    {
        return view('parenting/tim');
    }

    public function login(): string
    {
        return view('parenting/login');
    }

    public function register(): string
    {
        return view('parenting/register');
    }
    
}
