<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_prestamo',
        'fecha_devolucion',
        'estado_id',
    ];

    protected $primaryKey = 'id';
    
    //Relaciones entre los modelos Book, state
    public function book()
    {
        return $this->belongsTo(Book::class, 'prestamo_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'estado_id');
    }
}
