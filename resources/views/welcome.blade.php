
@section('content')
<div class="container"  id="notice">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @extends('layouts.app')
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')  && !session('success')}}
                    </div>
                @endif
                @if (session('status'))
                    <div class="card-header">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                </div>
            </div>
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