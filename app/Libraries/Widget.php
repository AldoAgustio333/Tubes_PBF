<?php namespace App\Libraries;

use App\Models\Galeri_model;

class Widget
{

    public function recentPost()
    {
        $kegiatan = new Galeri_model();
        $data['kegiatan'] = $kegiatan->getLimitedKegiatan(3);
        return view('widget/recent_post', $data);
    }
}