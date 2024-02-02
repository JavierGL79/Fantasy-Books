@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Nuestros libros</h2>
    @if(count($libros) > 0)
        <ul>
            @foreach($libros as $libro)
                <li>
                    <a href="{{ route('books.BookPage', ['id' => $libro->id]) }}">{{ $libro->titulo }}</a>
                </li>
            @endforeach
        </ul>
    @else
    <div class="alert alert-info text-center">
    {{__('Sorry, no books currently registered')}}.
    </div>
    @endif    
</div>

@endsection
