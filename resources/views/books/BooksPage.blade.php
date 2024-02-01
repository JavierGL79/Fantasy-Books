<!-- resources/views/books/book_page.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Lista de Libros</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Título</th>
                <th>Año</th>
                <th>Editorial</th>
                <th>Stock</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->year }}</td>
                    <td>{{ $libro->editorial }}</td>
                    <td>{{ $libro->stock }}</td>
                    <td>{{ $libro->foto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
