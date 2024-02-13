<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

class LoansController extends Controller
{
    public function show()
    {
        // Obtener todos los préstamos activos del usuario autenticado
        $loans = Prestamo::where('user_id', Auth::id())
            ->whereNull('fecha_devolucion') // Préstamos que aún no han sido devueltos
            ->get();

        // Obtener todos los préstamos del usuario autenticado (independientemente de si han sido devueltos o no)
        $allLoans = Prestamo::where('user_id', Auth::id())->get();

        return view('profiles.user_Loans', compact('loans', 'allLoans'));
    }
}
