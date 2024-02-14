<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Book;
use App\Events\LibroPrestado;

class PrestamoController extends Controller
{
    public function prestarLibro($id)
    {
        try {
            // Obtener el libro por su ID
            $book = Books::findOrFail($id);

            // Verificar si hay stock disponible
            if ($book->stock > 0) {
                $book->decrement('stock'); // Reducir el stock en 1

                // Registrar el préstamo
                $prestamo = new Prestamo([
                    'book_id' => $book->id,
                    'user_id' => auth()->id(), // ID del usuario autenticado
                    'fecha_prestamo' => now(),
                ]);

                $prestamo->save();

                // Mensaje de éxito
                return response()->json(['message' => 'Libro prestado exitosamente'], 200);
            } else {
                // Mensaje de error si no hay stock disponible
                return response()->json(['message' => 'No hay stock disponible para prestar el libro'], 422);
            }
        } catch (\Exception $e) {
            // Capturar excepciones y devolver un mensaje de error
            return response()->json(['message' => 'Error al prestar el libro: ' . $e->getMessage()], 500);
        }
    }
}