<?php

namespace App\Models;

use Carbon\Carbon;
use CodeIgniter\Model;

class Pengguna_model extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama', 'email', 'nomor_wa', 'status'];

    protected bool $allowEmptyInserts = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    public function getPengguna($id = false)
    {
        if ($id == false) {
            $pengguna = $this->findAll();
            return array_map([$this, 'convertDates'], $pengguna);
        }

        $pengguna = $this->where(['id_pengguna' => $id])->first();
        return $this->convertDates($pengguna);
    }

    public function getPenggunaNumRows()
    {
        return $this->countAll();
    }

    private function convertDates($pengguna)
    {
        if (isset($pengguna['created_at'])) {
            $pengguna['created_at'] = Carbon::parse($pengguna['created_at'])->translatedFormat('d/m/Y');
        }
        return $pengguna;
    }
}
