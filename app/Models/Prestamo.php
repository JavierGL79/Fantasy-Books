<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'table_prestamos';

    protected $fillable = [
        'fecha_prestamo',
        'fecha_devolucion',
        'estado_id',
        'user_id',
        'libro_id',
        'devuelto',
        'ampliado',
        'notificacion_enviada',
    ];

    protected $primaryKey = 'id';
    
    //Relaciones entre los modelos User Book, state y notificaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'libro_id');
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }
}
