<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

class UserLoansController extends Controller
{
    public function show()
    {
        // Obtener todos los préstamos activos del usuario autenticado
        $loans = Prestamo::where('user_id', Auth::id())
            ->whereNull('fecha_devolucion') // Préstamos que aún no han sido devueltos
            ->with('book')
            ->get();

        // Obtener todos los préstamos del usuario autenticado (independientemente de si han sido devueltos o no)
        $allLoans = Prestamo::where('user_id', Auth::id())->get();

        return view('user.user_Loans', compact('loans', 'allLoans'));
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
