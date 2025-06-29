<?php

namespace App\Models;

use Carbon\Carbon;
use CodeIgniter\Model;

class Workshop_model extends Model
{
    protected $table            = 'workshop';
    protected $primaryKey       = 'id_workshop'; 
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; 
    protected $allowedFields = ['nama', 'tanggal', 'jam_mulai', 'jam_selesai', 'tempat', 'image', 'created_at', 'updated_at'];

    public function getWorkshop($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where([$this->primaryKey => $id])->first();
    }

    public function getWorkshopNumRows()
    {
        return $this->countAllResults(); 
    }

    private function convertDates($workshop)
    {
        if (isset($workshop['tanggal'])) {
            $workshop['tanggal'] = Carbon::parse($workshop['tanggal'])->translatedFormat('d F Y');
        }
        return $workshop;
    }

    private function convertTimes($workshop)
    {
        if (isset($workshop['jam_mulai'])) {
            $workshop['jam_mulai'] = Carbon::parse($workshop['jam_mulai'])->translatedFormat('H:i');
        }
        if (isset($workshop['jam_selesai'])) {
            $workshop['jam_selesai'] = Carbon::parse($workshop['jam_selesai'])->translatedFormat('H:i');
        }
        return $workshop;
    }
}