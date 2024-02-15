<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;

class AllLoansController extends Controller
{
    public function show()
    {
        // Aquí recuperas todos los préstamos y los libros asociados
        $prestamos = Prestamo::with('user', 'book')->get();

        return view('books.AllLoans', ['prestamos' => $prestamos]);
    }

}
