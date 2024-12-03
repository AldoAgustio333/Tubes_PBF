<?php
namespace App\Models;

use Carbon\Carbon;
use CodeIgniter\Model;

Carbon::setLocale('id');

class Galeri_model extends Model 
{
    protected $table      = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kegiatan', 'tanggal_mulai', 'tanggal_selesai', 'deskripsi', 'image'];

    public function getKegiatan($key = false)
    {
        if ($key == false) {
            $kegiatan = $this->findAll();
            return array_map([$this, 'convertDates'], $kegiatan);
        }

        $kegiatan = $this->where(['id_galeri' => $key])->first();
        return $this->convertDates($kegiatan);
    }

    public function getKegiatanByName($name)
    {
        $kegiatan = $this->like('nama_kegiatan', $name)->findAll();
        return array_map([$this, 'convertDates'], $kegiatan);
    }

    public function getLimitedKegiatan($limit)
    {
        $kegiatan = $this->findAll($limit);
        return array_map([$this, 'convertDates'], $kegiatan);
    }

    private function convertDates($kegiatan)
    {
        if (isset($kegiatan['tanggal_mulai'])) {
            $kegiatan['tanggal_mulai'] = Carbon::parse($kegiatan['tanggal_mulai'])->translatedFormat('l, d F Y');
        }
        if (isset($kegiatan['tanggal_selesai'])) {
            $kegiatan['tanggal_selesai'] = Carbon::parse($kegiatan['tanggal_selesai'])->translatedFormat('l, d F Y');
        }
        return $kegiatan;
    }

    public function getKegiatanByYear($year)
    {
        $kegiatan = $this->where('YEAR(tanggal_mulai)', $year)->findAll();
        return array_map([$this, 'convertDates'], $kegiatan);
    }
}