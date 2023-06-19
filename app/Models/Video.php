<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['name', 'path'];

    // Fungsi aksesori untuk mendapatkan URL video
    public function getVideoUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}

