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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
