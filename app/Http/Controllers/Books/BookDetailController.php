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
    public function showDetail(BooksService $booksService, $id)
    {
        $libro = $booksService->bookDetail($id);
        return view('books.BookPage', compact('libro'));
    }

    public function destroy(Request $request, $id)
    {
        try {
            $libro = Book::findOrFail($id);
            $libro->delete();

            Session::flash('success', 'El libro se eliminó correctamente.');

            return Redirect::route('welcome');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Error al eliminar el libro: ' . $e->getMessage());
        }
    }
}

