<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_envio',
        'mensaje',
        'error_envio',
        'mensaje_error',
    ];

    //Relaciones con los modelos user, prestamo y bibliotecario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }

    public function bibliotecarios()
    {
        return $this->belongsToMany(Bibliotecario::class, 'bibliotecario_notificacion');
    }
}
