<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'mysql'; // Usar la base de datos de usuarios
     // Relación de muchos a muchos con los usuarios
     public function users()
     {
         return $this->belongsToMany(User::class, 'user_roles');
     }

     // Relación con los permisos binarios (una relación uno a uno o uno a muchos)
     public function permissions()
     {
         return $this->hasMany(Permission::class);
     }
}
