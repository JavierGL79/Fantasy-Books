<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;

class NewBookController extends Controller
{
    public function showForm()
    {
        $buttonText = 'Texto del Botón';
        return view('books.New_Book',);
    }
}