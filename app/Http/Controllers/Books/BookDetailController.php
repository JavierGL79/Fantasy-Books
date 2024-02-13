<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\BooksService;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

class BookDetailController extends Controller
{
    protected $booksService;

    public function __construct(BooksService $booksService)
    {
        $this->booksService = $booksService;
    }

    public function showDetail($id)
    {
        $libro = $this->booksService->bookDetail($id);
        return view('books.BookPage', compact('libro'));
    }

    public function destroy(Request $request, $id)
    {
        try {
            $libro = $this->booksService->bookDetail($id);
            $libro->delete();

            return redirect()->route('welcome')->with('success', 'Libro eliminado exitosamente');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Error al eliminar el libro: ' . $e->getMessage());
        }
    }

    public function prestarLibro($id)
    {
        try {
            $libro = $this->booksService->bookDetail($id);
            
            // Crea un nuevo registro de préstamo
            $prestamo = new Prestamo();
            $prestamo->fecha_prestamo = now();
            $prestamo->fecha_devolucion = now()->addDays(3); // Por defecto, devolución en 3 días
            $prestamo->user_id = Auth::id(); // Obtener el ID del usuario autenticado
            $prestamo->save();

            return back()->with('success', 'Préstamo registrado exitosamente. Tiene 3 días para devolver el libro.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al registrar el préstamo: ' . $e->getMessage());
        }
    }
}

