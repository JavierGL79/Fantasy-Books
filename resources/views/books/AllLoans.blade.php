@extends('layouts.app')

@section('content')
<ul>
    @foreach ($prestamos as $prestamo)
    <li>
        <strong>ID del Préstamo:</strong> {{ $prestamo->id }}<br>
        <strong>Nombre del Usuario:</strong> {{ $prestamo->user->name }}<br>
        <strong>Nombre del Libro:</strong> {{ $prestamo->book->titulo }}<br>
        <!-- Añade aquí más datos que quieras mostrar -->
    </li>
    @endforeach
</ul>
@endsection