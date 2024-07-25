<?php

namespace App\Controllers;

class SosialMedia extends BaseController
{
    public function kelasTransisi(): string
    {
        return view('kelas_transisi');
    }

    public function remedialTeaching(): string
    {
        return view('remedial_teaching');
    }

    public function interverensiOkupasi(): string
    {
        return view('interverensi_okupasi');
    }
}
