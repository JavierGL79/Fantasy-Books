<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BooksService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $booksService = new BooksService();
        $libros = $booksService->listBooks();
        return view('welcome', ['libros' => $libros]);   
    }

}
