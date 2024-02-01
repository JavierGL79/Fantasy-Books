<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;

class NewBookController extends Controller
{
    public function showForm()
    {
        return view('books.New_Book');
    }
}
