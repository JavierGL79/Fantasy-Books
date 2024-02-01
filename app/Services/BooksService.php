<?php
namespace App\Services;

use App\Models\Book;

class BooksService
{
    public function listBooks()
    {
        // Obtener todos los libros de la base de datos
        return Book::all();
    }

    public function bookDetail($id)
    {
        // Obtener los detalles de un solo libro por su ID
        return Book::find($id);
    }
}
