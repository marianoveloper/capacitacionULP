<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $connection = 'capacitaciones'; // Usar la base de datos de capacitaciones

    public function model()
    {
        return $this->morphTo();
    }
}
