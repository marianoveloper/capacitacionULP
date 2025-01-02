<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveSession extends Model
{
    protected $fillable = ['user_id', 'session_id', 'expires_at']; // Incluir expires_at

   public function user()
    {
         return $this->belongsTo(User::class);
    }
}
