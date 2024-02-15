<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Events\PrestamoFinalizadoEvent;

class UserLoansController extends Controller
{
    public function show()
    {
        // Comprueba los préstamos vencidos y disparar el evento
        $prestamosVencidos = Prestamo::whereDate('fecha_devolucion', '<', now())
        ->where('devuelto', 0)
        ->get();

        foreach ($prestamosVencidos as $prestamo) {
            event(new PrestamoFinalizadoEvent($prestamo));
            $prestamo->notificacion_enviada = true;
            $prestamo->save();
        }
        
        $prestamosActivos = Prestamo::with('user', 'book')
            ->where('user_id', Auth::id())
            ->whereDate('fecha_devolucion', '>', Carbon::now())
            ->paginate(10);

        // Recupera todos los préstamos inactivos del usuario autenticado
        $prestamosInactivos = Prestamo::with('user', 'book')
            ->where('user_id', Auth::id())
            ->whereDate('fecha_devolucion', '<=', Carbon::now())
            ->paginate(10);

        return view('books.AllLoans', ['prestamosActivos' => $prestamosActivos, 'prestamosInactivos' => $prestamosInactivos]);
    }

    public function devolverLibro($id)
{
    $prestamo = Prestamo::find($id);
    $prestamo->devuelto = true;
    $prestamo->fecha_devolucion = now(); // Actualiza la fecha de devolución al momento actual
    $prestamo->save();

    // Almacenar un mensaje flash en la sesión
    session()->flash('message', 'Libro devuelto con éxito');

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
