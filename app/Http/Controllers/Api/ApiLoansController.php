<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrestamoCollection;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class ApiLoansController extends Controller
{
    public function index()
    {
        return new PrestamoCollection(Prestamo::all());
    }

    //Agregar otros métodos para manejar las operaciones de la API, como DELETE, por ejemplo
}