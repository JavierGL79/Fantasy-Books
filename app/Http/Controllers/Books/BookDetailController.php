<?php

namespace App\Http\Controllers\Books;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BooksService;
use App\Models\Book;

class BookDetailController extends Controller
{
    public function showDetail(BooksService $booksService, $id)
    {
        $libro = $booksService->bookDetail($id);
        return view('books.BookPage', compact('libro'));
    }
}
