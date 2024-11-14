<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    protected $table = 'capacitaciones';
    protected $fillable = ['nombre', 'descripcion', 'duracion', 'cupo', 'url_inscripcion', 'modalidad', 'estado', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

  public function reservas(){
     return $this->morphMany(Reserva::class, 'reservable');
  }

    protected $casts = [
        'estado' => 'App\Enums\Enums\Estado',
        'modalidad' => 'App\Enums\Enums\Modalidad',
    ];
}
