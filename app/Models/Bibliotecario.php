<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bibliotecario extends Model
{
    protected $fillable = [
        'es_bibliotecario',
    ];

    // Relación uno a uno con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
