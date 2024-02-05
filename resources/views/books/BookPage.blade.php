@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $libro->titulo }}</h1>

        <div>
            <strong>Autor:</strong> {{ $libro->autor }}
        </div>
        <div>
            <strong>Título:</strong> {{ $libro->titulo }}
        </div>
        <div>
            <strong>Año de edición:</strong> {{ $libro->year }}
        </div>
        <div>
            <strong>Editorial:</strong> {{ $libro->editorial }}
        </div>
        <div>
            {{ $libro->foto }}
        </div>

        @php
            $buttonText = 'Edit Book';
            $cancelButton = 'Back';
        @endphp
        @include('layouts.botonera', ['buttonText' => $buttonText, $cancelButton = 'Back'])
    </div>
@endsection
