@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Préstamos Activos</h2>
    @if($loans->isEmpty())
        <p>No tiene ningún libro prestado actualmente.</p>
    @else
        <ul class="list-group">
            @foreach($loans as $loan)
                <li class="list-group-item {{ $loan->due_date < now() ? 'text-danger' : '' }}">
                    <div class="d-flex justify-content-between">
                        <span>{{ $loan->book->title }}</span>
                        <span>{{ $loan->due_date->format('d/m/Y') }}</span>
                        @if($loan->fecha_devolucion->diffInDays($loan->fecha_prestamo) <= 3 && !$loan->extended)
                             <button class="btn btn-primary" onclick="window.location.href='{{ route('loans.extend', $loan->id) }}'">{{__('Extend loan')}}</button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <h2 class="mt-5">Registro de Préstamos</h2>
    <ul class="list-group">
        @foreach($allLoans as $loan)
            <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <span>{{ $loan->book->title }}</span>
                    <span>{{ $loan->due_date->format('d/m/Y') }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection


