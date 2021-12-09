<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    function getData() {
        $query = $this->db->get('planes');
        return $query->result();
    }
}
