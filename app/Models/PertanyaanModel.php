<?php

namespace App\Models;

use CodeIgniter\Model;

class PertanyaanModel extends Model
{
    protected $table            = 'pertanyaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 

    protected $allowedFields    = ['nama_lengkap', 'subjek_pertanyaan', 'email', 'pertanyaan', 'jawaban'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Aturan validasi untuk data yang masuk
    protected $validationRules    = [
        'nama_lengkap'      => 'required|min_length[3]|max_length[255]',
        'subjek_pertanyaan' => 'required|min_length[3]|max_length[255]',
        'email'             => 'required|valid_email|max_length[255]',
        'pertanyaan'        => 'required|min_length[10]',
    ];

    // Pesan validasi kustom
    protected $validationMessages = [
        'nama_lengkap' => [
            'required'   => 'Nama lengkap wajib diisi.',
            'min_length' => 'Nama lengkap minimal 3 karakter.',
            'max_length' => 'Nama lengkap maksimal 255 karakter.',
        ],
        'subjek_pertanyaan' => [
            'required'   => 'Subjek pertanyaan wajib diisi.',
            'min_length' => 'Subjek pertanyaan minimal 3 karakter.',
            'max_length' => 'Subjek pertanyaan maksimal 255 karakter.',
        ],
        'email' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'max_length'  => 'Email maksimal 255 karakter.',
        ],
        'pertanyaan' => [
            'required'   => 'Pertanyaan wajib diisi.',
            'min_length' => 'Pertanyaan minimal 10 karakter.',
        ],
    ];

    protected $skipValidation       = false; 
    protected $cleanValidationRules = true;
}