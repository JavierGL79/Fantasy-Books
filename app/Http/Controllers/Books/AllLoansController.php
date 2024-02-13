<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;

class AllLoansController extends Controller
{
    public function prestamos()
    {
        // Aquí recuperas todos los préstamos y los libros asociados
        $prestamos = Prestamo::with('user', 'libro')->get();

        return view('bibliotecario.loans', ['prestamos' => $prestamos]);
    }
}
