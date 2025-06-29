<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas_model extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey       = 'id_kelas';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['nama_kelas', 'deskripsi', 'jadwal_kelas', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Rules Validasi
    protected $validationRules = [
        'nama_kelas'   => 'required|min_length[3]|max_length[255]',
        'deskripsi'    => 'permit_empty|max_length[500]',
        'jadwal_kelas' => 'required|valid_date[Y-m-d\TH:i]',
    ];
    protected $validationMessages = [
        'nama_kelas' => [
            'required'   => 'Nama kelas wajib diisi.',
            'min_length' => 'Nama kelas minimal 3 karakter.',
            'max_length' => 'Nama kelas maksimal 255 karakter.',
        ],
        'jadwal_kelas' => [
            'required'        => 'Jadwal kelas wajib diisi.',
            'valid_date'      => 'Format jadwal kelas tidak valid (YYYY-MM-DDTHH:MM).',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getKelasNumRows()
    {
        return $this->countAllResults();
    }

    public function getKelasWithMemberCount()
    {
        return $this->select('kelas.*, COUNT(kp.id_pengguna) as jumlah_anggota')
                    ->join('kelas_pengguna kp', 'kp.id_kelas = kelas.id_kelas', 'left')
                    ->groupBy('kelas.id_kelas')
                    ->orderBy('kelas.jadwal_kelas', 'ASC');
    }
}