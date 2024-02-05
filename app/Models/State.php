<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        //
    ];

    protected $primaryKey = 'id';
    
    public function loans()
    {
        return $this->hasMany(Loan::class, 'estado_id');
    }
}
