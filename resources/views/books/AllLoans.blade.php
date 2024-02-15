@extends('layouts.app')

@section('content')
    @section('card-header', 'Listado de préstamos activos')
    @section('card-body')
        <ul>
            @foreach ($prestamosActivos as $prestamo)
            <li>
                <strong>Préstamo:</strong> {{ $prestamo->id }}<br>
                <strong>Usuario:</strong> {{ $prestamo->user->name }}<br>
                <strong>Libro:</strong> {{ $prestamo->book->titulo }}<br>
            </li>
            @endforeach
        </ul>
    @endsection
    <div class="card bg-light" style="--bs-bg-opacity: .5;">
        <div class="card-header text-black bg-dark-subtle">
            <h2 class="text-center">Préstamos Inactivos</h2>
        </div>    
        <div class="card-body text-black">
            <ul>
                @foreach ($prestamosInactivos as $prestamo)
                <li>
                    <strong>ID del Préstamo:</strong> {{ $prestamo->id }}<br>
                    <strong>Nombre del Usuario:</strong> {{ $prestamo->user->name }}<br>
                    <strong>Nombre del Libro:</strong> {{ $prestamo->book->titulo }}<br>
                    <!-- Añade aquí más datos que quieras mostrar -->
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection