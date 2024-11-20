<?php

namespace App\Models;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $connection = 'mysql_aulas'; // Usar la base de datos de capacitaciones
    protected $fillable = ['nombre', 'capacidad', 'piso', 'edificio', 'estado'];

    public function reservables(){

        return $this->morphedByMany(Reserva::class, 'reservable','aula_reservable');//Relacion de muchos a muchos con la tabla aulas - una aula puede tener muchas reservas
    }


}
