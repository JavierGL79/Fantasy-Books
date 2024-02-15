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

    // Aquí recuperas todos los préstamos inactivos del usuario autenticado
    $prestamosInactivos = Prestamo::with('user', 'book')
        ->where('user_id', Auth::id())
        ->whereDate('fecha_devolucion', '<=', Carbon::now())
        ->get();

    return view('books.AllLoans', ['prestamosActivos' => $prestamosActivos, 'prestamosInactivos' => $prestamosInactivos]);
    }

    public function prolongarPrestamo($id)
    {
        $loan = Prestamo::find($id);

        if (!$loan) {
            return redirect()->back()->with('error', 'Loan not found');
        }

        if ($loan->extended) {
            return redirect()->back()->with('error', 'Loan has already been extended');
        }

        // Puedes ajustar la lógica de prolongación aquí según tus requerimientos
        $loan->update([
            'extended' => true,
            'extended_at' => Carbon::now(), // Esto registra la fecha en la que se extendió el préstamo
        ]);

        return redirect()->back()->with('success', 'Loan extended successfully');
    }
}
