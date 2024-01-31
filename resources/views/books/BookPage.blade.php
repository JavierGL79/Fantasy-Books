@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Libro</h1>

        <div>
            <strong>Autor:</strong> {{ $libro->autor }}
        </div>
        <div>
            <strong>Título:</strong> {{ $libro->titulo }}
        </div>
        <!-- Agrega más campos del libro según sea necesario -->

        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
