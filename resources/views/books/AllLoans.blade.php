@extends('layouts.app')

@section('content')
    @section('card-header')
        {{ __('Active Loans') }}
    @endsection
    @section('card-body')
        <ul class="list-group">
            @foreach ($prestamosActivos as $prestamo)

            <li class="list-group-item">
                <strong>{{__('Loan')}}:</strong> {{ $prestamo->id }}
                <strong>{{__('User')}}:</strong> {{ $prestamo->user->name }}
                <strong>{{__('Book')}}:</strong> {{ $prestamo->book->titulo }}<br>
                <strong>{{__('Date of loan')}}:</strong> {{ $prestamo->fecha_prestamo }}
                <strong>{{__('Date of return')}}:</strong> {{ $prestamo->fecha_devolucion }}
                <strong>{{__('Return status')}}: </strong><strong class="{{ $prestamo->devuelto ? 'text-success' : 'text-danger' }}">{{ $prestamo->devuelto ? 'Devuelto' : 'Sin Devolver' }}</strong>
                <div class="button-container">
                    <!-- Botón para devolver el libro -->
                    <form action="{{ route('devolver-libro', $prestamo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Devolver libro</button>
                    </form>
                    <!-- Botón para ampliar préstamo -->
                    @if (!$prestamo->devuelto && now() < $prestamo->fecha_devolucion && !$prestamo->ampliado)
                    <form action="{{ route('ampliar-prestamo', $prestamo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Ampliar préstamo</button>
                    </form>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
        {{$prestamosActivos->links()}}
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
                    <strong>{{__('Return status')}}: </strong><strong class="{{ $prestamo->devuelto ? 'text-success' : 'text-danger' }}">{{ $prestamo->devuelto ? 'Devuelto' : 'Sin Devolver' }}</strong>
                </li>
                @endforeach
            </ul>
        </div>
        {{$prestamosInactivos->links()}}
    </div>
    
@endsection