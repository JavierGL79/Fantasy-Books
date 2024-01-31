<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewBook extends Controller
{
    public function nuevoLibro()
    {
        if (Gate::allows('crearLibro')) {
            return view('libros.nuevo');
        }

        abort(403, 'No tienes permisos para realizar esta acción.');
    }

    public function almacenarLibro(Request $request)
    {
        if (Gate::allows('crearLibro')) {
            // Lógica para almacenar el nuevo libro
            $libro = new Libro();
            $libro->autor = $request->input('autor');
            $libro->titulo = $request->input('titulo');
            $libro->year = $request->input('year');
            $libro->editorial = $request->input('editorial');
            $libro->stock = $request->input('stock');
            $libro->foto = $request->input('foto');
            $libro->save();

 
            return view('BookPage', ['libro' => $libro]);
        }

        abort(403, 'No tienes permisos para realizar esta acción.');
    }
}