<?php
namespace App\Models;

use CodeIgniter\Model;

class Jabatan_model extends Model 
{
   protected $table      = 'jabatan';
   
   protected $primaryKey = 'id_jabatan';

   protected $useAutoIncrement = true;

   protected $allowedFields = ['jabatan'];
   public function getJabatan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_jabatan' => $id])->first();
    }


}