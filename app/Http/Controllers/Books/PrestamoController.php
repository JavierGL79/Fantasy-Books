<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Events\LibroPrestado;

class PrestamoController extends Controller
{
    public function prestarLibro($libroId)
    {
    // Obtener el libro por su ID
    $libro = Libro::findOrFail($libroId);

    // Verificar si hay stock disponible
    if ($libro->stock > 0) {
        
        $libro->decrement('stock'); // Reducir el stock en 1

        // Registrar el préstamo en tu lógica específica
        // ...

        // Activar el evento LibroPrestado
        event(new LibroPrestado());

        return response()->json(['message' => 'Libro prestado exitosamente']);
    } else {
        return response()->json(['message' => 'No hay stock disponible para prestar el libro'], 422);
    }
    }
}
