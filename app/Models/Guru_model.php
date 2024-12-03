<?php
namespace App\Models;

use CodeIgniter\Model;

class Guru_model extends Model 
{
    protected $table      = 'guru';
    protected $primaryKey = 'id_guru';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_guru', 'jabatan', 'image'];

    public function getGuru($name = false)
    {
        if ($name == false) {
            return $this->join('jabatan','jabatan.id_jabatan = guru.id_jabatan')->findAll();
        }

        return $this->join('jabatan','jabatan.id_jabatan = guru.id_jabatan')->like('nama_guru', $name)->findAll();
    }

    public function getFiveGuru()
    {
        return $this->join('jabatan', 'jabatan.id_jabatan = guru.id_jabatan')->findAll(5);
    }

    public function getGuruByJabatan($id)
    {
        return $this->join('jabatan','jabatan.id_jabatan = guru.id_jabatan')->where(['guru.id_jabatan' => $id])->findAll();
    }
}