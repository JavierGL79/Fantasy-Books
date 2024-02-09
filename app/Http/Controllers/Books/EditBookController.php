<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BooksService;
use App\Models\Book;

class EditBookController extends Controller
{

        public function editDetail(BooksService $booksService, $id)
        {
            $libro = $booksService->bookDetail($id);
            return view('books.EditBook', compact('libro'));
        }
    
    /*
    public function showForm($id)
    {
        // Recuperar el libro que se desea editar
        $libro = Book::findOrFail($id);

        // Devolver la vista de edición con los datos del libro
        return view('books.EditBook', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario de edición si es necesario

        // Recuperar el libro que se desea actualizar
        $book = Book::findOrFail($id);

        // Actualizar los campos del libro con los datos del formulario
        $book->update($request->all());

        // Redireccionar a alguna vista de éxito o a la misma vista de edición con un mensaje de éxito
        return redirect()->route('books.edit', $book->id)->with('success', 'Libro actualizado correctamente');
    }
    */
}
