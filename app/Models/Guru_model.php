<?php
namespace App\Models;

use CodeIgniter\Model;

class Guru_model extends Model 
{
    protected $table      = 'guru';
    protected $primaryKey = 'id_guru';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_guru', 'jabatan', 'image'];

    public function getGuru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_guru' => $id])->first();
    }

    public function getFiveGuru()
    {
        return $this->orderBy('id_guru', 'DESC')->findAll(5);
    }
}