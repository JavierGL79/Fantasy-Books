<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooKCollection;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        return new BookCollection(Book::all());
    }

    //Agregar otros métodos para manejar las operaciones de la API, como DELETE, por ejemplo
}
