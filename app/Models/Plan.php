<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    use HasFactory;


    function getData() {
        $query = $this->db->get('planes');
        return $query->result();
    }
}
