<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'autor',
        'titulo',
        'year',
        'editorial',
        'stock',
        'foto',
    ];
    
    protected $primaryKey = 'id';
    
    // Relación uno a muchos con Prestamo
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'prestamo_id');
    }
}
