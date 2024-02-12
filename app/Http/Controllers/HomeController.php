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
        $author_search_query = trim($request->get('author_search_query'));
        $year_search_query = trim($request->get('year_search_query'));
        $year_range_start = trim($request->get('year_range_start'));
        $year_range_end = trim($request->get('year_range_end'));

        // Comprueba si se ha realizado una búsqueda por título, autor, año o rango de años
        if ($title_search_query || $author_search_query || $year_search_query || ($year_range_start && $year_range_end)) {
            // Si se ha proporcionado algún criterio de búsqueda, realiza la búsqueda
            $query = Book::query();

            if ($title_search_query) {
                // Si se proporciona un título, añade la condición de búsqueda por título
                $query->where('titulo', 'LIKE', '%' . $title_search_query . '%');
            }

            if ($author_search_query) {
                // Si se proporciona un autor, añade la condición de búsqueda por autor
                $query->where('autor', 'LIKE', '%' . $author_search_query . '%');
            }

            if ($year_search_query) {
                // Si se proporciona un año, añade la condición de búsqueda por año
                $query->where('year', $year_search_query);

            }

            if ($year_range_start && $year_range_end) {
                // Si se proporciona un rango de años, añade la condición de búsqueda por rango de años
                $query->whereBetween('fyear', [$year_range_start, $year_range_end]);
            }

            // Ejecuta la consulta y obtiene los resultados paginados
            $libros = $query->orderBy('created_at', 'asc')->paginate(10);
        } else {
            // Si no se proporciona ningún criterio de búsqueda, muestra todos los libros
            $libros = Book::orderBy('created_at', 'asc')->paginate(10);
        }

        // Retorna la vista con los libros y los valores de búsqueda
        return view('welcome', [
            'libros' => $libros,
            'title_search_query' => $title_search_query,
            'author_search_query' => $author_search_query,
            'year_search_query' => $year_search_query,
            'year_range_start' => $year_range_start,
            'year_range_end' => $year_range_end
        ]);
    }
}
