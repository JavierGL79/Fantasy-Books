<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserLoansController extends Controller
{
    public function show()
    {
        $prestamosActivos = Prestamo::with('user', 'book')
        ->where('user_id', Auth::id())
        ->whereDate('fecha_devolucion', '>', Carbon::now())
        ->get();

    // Recuperar todos los préstamos inactivos del usuario autenticado
    $prestamosInactivos = Prestamo::with('user', 'book')
        ->where('user_id', Auth::id())
        ->whereDate('fecha_devolucion', '<=', Carbon::now())
        ->get();

    return view('books.AllLoans', ['prestamosActivos' => $prestamosActivos, 'prestamosInactivos' => $prestamosInactivos]);
    }

    public function devolverLibro($id)
    {
        $prestamo = Prestamo::find($id);
        $prestamo->devuelto = true;
        $prestamo->save();

        return redirect()->back();
    }

    public function ampliarPrestamo($id)
    {
        $prestamo = Prestamo::find($id);
        $fecha_devolucion = \Carbon\Carbon::parse($prestamo->fecha_devolucion);
        $prestamo->fecha_devolucion = $fecha_devolucion->addDays(3);
        $prestamo->ampliado = true;
        $prestamo->save();
    
        // Almacenar un mensaje flash en la sesión
        session()->flash('message', 'Préstamo ampliado con éxito');
    
        return redirect()->back();
    }
}
