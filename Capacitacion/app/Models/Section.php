<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // Relación de muchos a muchos con roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_sections');
    }

    // Método para obtener los usuarios con acceso a una sección
    public function usersWithAccess()
    {
        return $this->hasManyThrough(User::class, Role::class);
    }
}
