<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Services\BooksService;

class BookPageController extends Controller
{
    public function showBookDetail($id, BooksServive $BooksServive)
    {
        // Obtener los detalles de un solo libro por su ID
        $libro = $BooksServive->bookDetail($id);
        return view('books.bookPage', ['libro' => $libro]);
    }
}
