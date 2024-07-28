<?php

use CodeIgniter\Model;

class Profiler_model extends Model
{
    private $_table = "profiler";
    
    public function getProfiler() {
        return $this->db->table($this->_table)->get()->getResultArray();
    }
}