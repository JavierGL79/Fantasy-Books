<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'table_libros';
    use HasFactory;

    protected $fillable = [
        'autor',
        'titulo',
        'year',
        'editorial',
        'stock',
        'foto',
        'information',
    ];
}
