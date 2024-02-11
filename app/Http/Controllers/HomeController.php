<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BooksService;
use Illuminate\Support\Facades\DB;  ////Método Query Biuilder
use App\Models\Book;

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
    public function index(Request $request)
    {
        $booksService = new BooksService();
        $libros = [];
        $title_search_query = trim($request->get('title_search_query'));

        if ($title_search_query) {
            // Si se ha realizado una búsqueda por título, obtener los resultados
            //Método Query Biuilder
            $libros = DB::table('table_libros')
                ->select('id', 'titulo')
                ->where('titulo', 'LIKE', '%' . $title_search_query . '%')
                ->orderBy('titulo', 'asc')
                ->paginate(10);
                
        } else {
            // Si no se ha realizado una búsqueda, muestra todos los libros
            $libros = $booksService->listBooks();
        }
        
        return view('welcome', ['libros' => $libros, 'title_search_query' => $title_search_query]);   
    }
}
