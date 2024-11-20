<?php

namespace App\Models;

use App\Models\Meeting;
use App\Models\Capacitacion;
use App\Models\PrivateEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;
    protected $connection = 'mysql_capacitaciones'; // Usar la base de datos de capacitaciones
    protected $guarded=['id'];


    //capacitaciones puede tener una categoria


    public function capacitaciones(){
        return $this->hasMany(Capacitacion::class);//Relacion de uno a muchos con la tabla capacitaciones - una categoria puede tener muchas capacitaciones
    }

    public function meetings(){
        return $this->hasMany(Meeting::class);//Relacion de uno a muchos con la tabla meetings - una categoria puede tener muchas meetings
    }

    public function privateEvents(){
        return $this->hasMany(PrivateEvent::class);//Relacion de uno a muchos con la tabla private_events - una categoria puede tener muchos eventos privados
    }

    //Agregar un scope
    public function scopeType($query, $type){
        return $query->where('type', $type);//Filtrar por tipo - una categoria puede ser de tipo capacitacion, meeting o private_event
    }
}
