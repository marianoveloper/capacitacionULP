<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $connection = 'mysql_capacitaciones';

    protected $fillable = [
        'reservable_type',
        'reservable_id',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'user_id',
        'reserva_at',
        'estado',
    ];

    public function reservable(){
        return $this->morphTo();
    }
}
