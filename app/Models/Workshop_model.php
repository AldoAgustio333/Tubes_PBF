<?php

namespace App\Models;

use Carbon\Carbon;
use CodeIgniter\Model;

class Workshop_model extends Model
{
    protected $table      = 'workshop';
    protected $primaryKey = 'id_workshop';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'tanggal', 'jam_mulai', 'jam_selesai', 'tempat', 'image'];

    public function getWorkshop($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_training' => $id])->first();
    }

    public function geWorkshopNumRows()
    {
        return $this->countAll();
    }

    private function convertDates($training)
    {
        if (isset($training['tanggal'])) {
            $training['tanggal'] = Carbon::parse($training['tanggal'])->translatedFormat('d F Y');
        }
        return $training;
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
