@extends('layouts.app')

@section('content')
    @section('card-header', 'Active Loans')
    @section('card-body')
        <ul class="list-group">
            @foreach ($prestamosActivos as $prestamo)
                <div class="card">
                    <div class="card-body">
                        <li class="list-group-item">
                            <strong>{{__('Loan')}}:</strong> {{ $prestamo->id }}
                            <strong>{{__('User')}}:</strong> {{ $prestamo->user->name }}
                            <strong>{{__('Book')}}:</strong> {{ $prestamo->book->titulo }}
                            <!-- Botón para devolver el libro -->
                            <form action="{{ route('devolver-libro', $prestamo->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Devolver libro</button>
                            </form>
                            <h2>Préstamos Activos</h2>
@foreach ($prestamosActivos as $prestamo)
<div class="card">
    <div class="card-body">
        <li class="list-group-item">
            <strong>Préstamo:</strong> {{ $prestamo->id }}<br>
            <strong>Usuario:</strong> {{ $prestamo->user->name }}<br>
            <strong>Libro:</strong> {{ $prestamo->book->titulo }}<br>
            <!-- Botón para devolver el libro -->
            <form action="{{ route('devolver-libro', $prestamo->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Devolver libro</button>
            </form>
        </li>
    </div> 
</div> 
@endforeach

                        </li>
                    </div> 
                </div> 
            @endforeach
        </ul>
    @endsection
    <div class="card bg-light" style="--bs-bg-opacity: .5;">
        <div class="card-header text-black bg-dark-subtle">
            <h2 class="text-center">{{__('Inactive Loans')}}</h2>
        </div>    
        <div class="card-body text-black">
            <ul class="list-group">
                @foreach ($prestamosInactivos as $prestamo)
                <li class="list-group-item">
                    <strong>{{__('Loan')}}:</strong> {{ $prestamo->id }}
                    <strong>{{__('User')}}:</strong> {{ $prestamo->user->name }}
                    <strong>{{__('Book')}}:</strong> {{ $prestamo->book->titulo }}

                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection