@extends('layouts.app')

@section('content')
<div class="container"  id="notice">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session('success') )
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header"><h2 class="text-center">{{__('Search area')}}</h2></div>
        <div class="card-body">
            <form action="{{ route('books.search') }}" method="GET" class="text-center" style="max-width: 50%; margin: auto;">
                <div class="card-body">
                    <div class="input-group mb-3 d-flex align-items-center">
                        <h4 class="mb-0">
                            <label for="tittle_search_query" class="mb-0">{{__('By tittle')}}:&nbsp;</label>
                        </h4>
                        <input type="text" class="form-control" id="tittle_search_query" placeholder="{{__('Search books')}} {{__('by tittle')}}" name="tittle_search_query">
                    </div>
                    <div class="input-group mb-3 d-flex align-items-center">    
                        <h4 class="mb-0">
                            <label for="author_search_query" class="mb-0">{{__('By author')}}:&nbsp;</label>
                        </h4>
                        <input type="text" class="form-control" id="author_search_query" placeholder="{{__('Search books')}} {{__('by author')}}" name="author_search_query">
                    </div>

                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="custom-container ml-10 mr-10"  id="books">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 class="text-center">{{__('Our books')}}</h2></div>
                    <div class="card-body">
                    @if($libros && count($libros) > 0)
                        <ul>
                            @foreach($libros as $libro)
                            <div class="card card-body">
                                <li>
                                    <a href="{{ route('books.BookPage', ['id' => $libro->id]) }}">{{ $libro->titulo }}</a>
                                </li>
                            </div>
                            @endforeach
                        </ul>
                    @else
    <div class="alert alert-info text-center">
    {{__('Sorry, no books currently registered')}}.
    </div>
    @endif    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<form action="{{ route('enviar.correo.prueba') }}" method="GET">
    <button type="submit">Enviar Correo de Prueba</button>
</form>