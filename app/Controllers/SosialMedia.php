<?php

namespace App\Controllers;

class SosialMedia extends BaseController
{
    public function kelasTransisi(): string
    {
        return view('sosial_media/kelas_transisi');
    }

    public function remedialTeaching(): string
    {
        return view('sosial_media/remedial_teaching');
    }

    public function interverensiOkupasi(): string
    {
        return view('sosial_media/interverensi_okupasi');
    }
}
