<?php
namespace App\Models;

use Carbon\Carbon;
use CodeIgniter\Model;

Carbon::setLocale('id');

class Training_model extends Model
{
    protected $table      = 'training';
    protected $primaryKey = 'id_training';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'tanggal', 'jam_mulai', 'jam_selesai', 'tempat', 'image'];

    public function getTraining($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_training' => $id])->first();
    }

    public function getTrainingNumRows()
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

    private function convertTimes($training)
    {
        if (isset($training['jam_mulai'])) {
            $training['jam_mulai'] = Carbon::parse($training['jam_mulai'])->translatedFormat('H:i');
        }
        if (isset($training['jam_selesai'])) {
            $training['jam_selesai'] = Carbon::parse($training['jam_selesai'])->translatedFormat('H:i');
        }
        return $training;
    }
}
