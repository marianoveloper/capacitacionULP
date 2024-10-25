<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $connection = 'capacitaciones'; // Usar la base de datos de capacitaciones

    protected $fillable = ['url'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
