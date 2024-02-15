<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Carbon\Carbon;

class AllLoansController extends Controller
{
    public function show()
    {
        // Recuperar todos los préstamos y los libros asociados
        $prestamosActivos = Prestamo::with('user', 'book')
            ->whereDate('fecha_devolucion', '>', Carbon::now())
            ->paginate(10);

        $prestamosInactivos = Prestamo::with('user', 'book')
            ->whereDate('fecha_devolucion', '<=', Carbon::now())
            ->paginate(10);

        return view('books.AllLoans', ['prestamosActivos' => $prestamosActivos, 'prestamosInactivos' => $prestamosInactivos]);
    }

}
