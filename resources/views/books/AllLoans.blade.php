@extends('layouts.app')

@section('content')
    @section('card-header')
        {{ __('Active Loans') }}
    @endsection
    @section('card-body')
        @if($prestamosActivos->count())
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
        @else
            <p>No tienes préstamos activos.</p>
        @endif
    @endsection
    <div class="card bg-light" style="--bs-bg-opacity: .5;">
        <div class="card-header text-black bg-dark-subtle">
            <h2 class="text-center">{{__('Inactive Loans')}}</h2>
        </div>    
        <div class="card-body text-black">
            <ul class="list-group">
            @if($prestamosInactivos->count())
                @foreach ($prestamosInactivos as $prestamo)
                <li class="list-group-item">
                    <strong>{{__('Loan')}}:</strong> {{ $prestamo->id }}
                    <strong>{{__('User')}}:</strong> {{ $prestamo->user->name }}
                    <strong>{{__('Book')}}:</strong> {{ $prestamo->book->titulo }}
                    <strong>{{__('Return status')}}: </strong><strong class="{{ $prestamo->devuelto ? 'text-success' : 'text-danger' }}">{{ $prestamo->devuelto ? 'Devuelto' : 'Sin Devolver' }}</strong>
                    <strong>{{__('Notifications')}}: </strong><strong class="{{ $prestamo->notificacion_enviada ? 'text-success' : 'text-danger' }}">{{ $prestamo->notificacion_enviada ? 'Notificaciones enviadas' : 'Sin notificaciones' }}</strong>
                </li>
                @endforeach
                @else
                    <p>No hay registros en el historial de préstamos.</p>
                @endif
            </ul>
        </div>
        {{$prestamosInactivos->links()}}
    </div>
    
@endsection