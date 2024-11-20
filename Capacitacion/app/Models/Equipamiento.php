<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipamiento extends Model
{
    use HasFactory;
    protected $connection = 'mysql_aulas'; // Usar la base de datos de capacitaciones
}
