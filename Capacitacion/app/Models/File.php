<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function model()
    {
        return $this->morphTo();
    }
}
