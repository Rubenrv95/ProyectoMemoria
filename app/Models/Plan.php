<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    function getData() {
        $query = $this->db->get('planes');
        return $query->result();
    }
}
