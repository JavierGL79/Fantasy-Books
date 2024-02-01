<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class NewBookController extends Controller
{
    public function showForm()
    {
        $buttonText = 'Texto del Botón';
        return view('books.New_Book',);
    }
    public function bookStore(Request $request)
    {
        try{
        // Validación de los datos del formulario
        $request->validate([
            'autor' => 'required|string',
            'titulo' => 'required|string',
            'year' => 'required|integer',
            'editorial' => 'required|string',
            'stock' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'information' => 'nullable|string',
        ]);

        // Creación y persistencia del modelo Libro
        $libro = Book::create([
            'autor' => $request->input('autor'),
            'titulo' => $request->input('titulo'),
            'year' => $request->input('year'),
            'editorial' => $request->input('editorial'),
            'stock' => $request->input('stock'),
            'foto' => $request->input('foto'),
            'information' => $request->input('information')
        ]);
        $message = 'Libro almacenado exitosamente';
        $status = 'success';
    } catch (\Exception $e) {

        // Mensaje de error
        $message = 'Error al almacenar el libro: ' . $e->getMessage();
        $status = 'error';
    }

        // Redirección o Retorno de Vista
        return redirect()->route('welcome')->with('success', 'Libro registrado exitosamente');
    }
}