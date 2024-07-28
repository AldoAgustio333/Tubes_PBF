<?php
namespace App\Models;

use CodeIgniter\Model;

class Galeri_model extends Model 
{
    protected $table      = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kegiatan', 'tanggal_mulai', 'tanggal_selesai', 'deskripsi', 'image'];

    public function getKegiatan($key = false)
    {
        if ($key == false) {
            return $this->findAll();
        }

        return $this->where(['id_galeri' => $key])->first();
    }

    public function getFiveKegiatan()
    {
        return $this->orderBy('id_galeri', 'ASC')->findAll(5);
    }
}