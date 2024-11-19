<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['topic', 'description', 'start_time', 'end_time'];

    public function reservas()
    {
        return $this->morphMany(Reserva::class, 'reservable'); //Relacion de muchos a muchos con la tabla aulas - una aula puede tener muchas reservas
    }
}
