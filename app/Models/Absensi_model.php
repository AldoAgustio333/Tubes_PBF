<?php

namespace App\Models;

use CodeIgniter\Model;

class Absensi_model extends Model
{
    protected $table            = 'absensi';
    protected $primaryKey       = 'id_absensi';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['id_kelas', 'id_pengguna', 'tanggal', 'status', 'keterangan', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'id_kelas'    => 'required|integer',
        'id_pengguna' => 'required|integer',
        'tanggal'     => 'required|valid_date[Y-m-d]',
        'status'      => 'required|in_list[hadir,izin,sakit,alpa]',
        'keterangan'  => 'permit_empty|max_length[500]',
    ];
    protected $validationMessages = [
        'id_kelas' => [
            'required' => 'Kelas wajib dipilih.',
            'integer'  => 'Kelas tidak valid.',
        ],
        'id_pengguna' => [
            'required' => 'Peserta wajib dipilih.',
            'integer'  => 'Peserta tidak valid.',
        ],
        'tanggal' => [
            'required'   => 'Tanggal absensi wajib diisi.',
            'valid_date' => 'Format tanggal tidak valid.',
        ],
        'status' => [
            'required' => 'Status absensi wajib dipilih.',
            'in_list'  => 'Status absensi tidak valid (hadir, izin, sakit, alpa).',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}