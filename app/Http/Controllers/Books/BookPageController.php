<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookPageController extends Controller
{
    public function show(Libro $libro)
    {
        return view('books.show', compact('book'));
    }
}
