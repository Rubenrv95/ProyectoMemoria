<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{

    function getData() {
        $query = $this->db->get('carreras');
        return $query->result();
    }
}
