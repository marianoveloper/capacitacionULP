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

        'user_id',
        'reserva_at',
        'estado',
    ];

    public function reservable(){
        return $this->morphTo();
    }

  public function aulas()
  {
      return $this->morphToMany(Aula::class, 'reservable','aula_reservable');//Relacion de muchos a muchos con la tabla aulas - una aula puede tener muchas reservas
  }
}
