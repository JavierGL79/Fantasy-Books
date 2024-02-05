<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bibliotecario extends Model
{
    protected $fillable = [
        'es_bibliotecario',
    ];
    
    protected $primaryKey = 'id';

    // Relación uno a uno con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    //Relación de muchos bibliotecarios a muchas noificaciones
    public function notificaciones()
    {
        return $this->belongsToMany(Notificacion::class, 'bibliotecario_notificacion');
    }
}
