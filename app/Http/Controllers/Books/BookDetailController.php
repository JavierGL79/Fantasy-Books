<?php

namespace App\Http\Controllers\Books;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\BooksService;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

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
}

