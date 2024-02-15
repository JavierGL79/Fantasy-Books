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
}
