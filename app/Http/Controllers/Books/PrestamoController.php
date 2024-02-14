<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;


class PrestamoController extends Controller
{

    public function prestarLibro(Request $request, $id)
        {
            try {
                // Obtener el libro por su ID
                $libro = Book::findOrFail($id);

                // Verificar si hay stock disponible
                if ($libro->stock > 0) {
                    $libro->decrement('stock'); // Reducir el stock en 1

                    // Registrar el préstamo
                    $prestamo = new Prestamo([
                        'book_id' => $libro->id,
                        'user_id' => Auth::id(),
                        'fecha_prestamo' => now(),
                    ]);

                    $prestamo->save();

                    // Mensaje de éxito
                    return redirect()->back()->with('success', 'Libro prestado exitosamente');
                } else {
                    // Mensaje de error si no hay stock disponible
                    return redirect()->back()->with('error', 'No hay stock disponible para prestar el libro');
                }
            } catch (\Exception $e) {
                // Capturar excepciones y redirigir con un mensaje de error
                return redirect()->back()->with('error', 'Error al prestar el libro: ' . $e->getMessage());
            }
        }

}
    