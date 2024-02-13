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
        //'user_id',
    ];

    protected $primaryKey = 'id';
    
    //Relaciones entre los modelos User Book, state y notificaciones
    public function user()
    {
        return $this->belongsTo(User::class); // Assumiendo que la relación es de muchos préstamos a un usuario
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'prestamo_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'estado_id');
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }
}
