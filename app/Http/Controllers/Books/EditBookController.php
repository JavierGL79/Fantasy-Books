<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BooksService;
use App\Models\Book;

class EditBookController extends Controller
{
    protected $booksService;
        public function __construct(BooksService $booksService)
        {
            $this->booksService = $booksService;
        }

        public function editDetail($id)
        {
            $libro = $this->booksService->bookDetail($id);
            return view('books.EditBook', compact('libro'));
        }

        public function update(Request $request, $id)
        {
            
            // Validación de los datos del formulario de edición
            $request->validate([
                'autor' => 'required|string',
                'titulo' => 'required|string',
                'year' => 'required|integer',
                'editorial' => 'required|string',
                'stock' => 'nullable|integer',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ejemplo de validación para la foto
                'information' =>'nullable|string',
            ]);
            
            // Obtener el libro a actualizar utilizando el BooksService
            $libro = $this->booksService->bookDetail($id);
            
            // Actualiza los campos del libro con los datos del formulario
            $libro->update($request->all());

            if ($request->hasFile('foto')) {
                // Almacenar la nueva foto y actualizar la ruta en la base de datos
                $fotoPath = $request->file('foto')->store('public/fotos');
                $libro->foto = Storage::url($fotoPath);
                $libro->save();

            // Redirecciona al detalle del libro con un mensaje de éxito
            return redirect()->route('books.BookPage', $libro->id)->with('success', 'Libro actualizado correctamente');

        }
    }
}