<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateEvent extends Model
{
    use HasFactory;

    protected $connection = 'mysql_capacitaciones';
    public function reservas()
    {
        return $this->morphMany(Reserva::class, 'reservable'); //Relacion de muchos a muchos con la tabla aulas - una aula puede tener muchas reservas
    }
    public function categoria(){

        return $this->belongsTo(Categoria::class);//Relacion de uno a muchos con la tabla categorias - una reunion puede tener una categoria
       }
}
