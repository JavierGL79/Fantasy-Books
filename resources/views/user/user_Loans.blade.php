@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="text-center">{{__('Loans Assets')}}</h2>
    </div>
    <div class="card-body opacity-50">
        @if($loans->isEmpty())
            <p class="text-center">{{__('No books are currently on loan')}}.</p>
        @else
            <ul class="list-group">
                @foreach($loans as $loan)
                    <li class="list-group-item {{ $loan->due_date < now() ? 'text-danger' : '' }}">
                        <div class="d-flex justify-content-between">
                            <span>{{ $loan->id }}</span>
                            <span>{{ $loan->due_date->format('d/m/Y') }}</span>
                            @if($loan->fecha_devolucion->diffInDays($loan->fecha_prestamo) <= 3 && !$loan->extended)
                                <button class="btn btn-primary" onclick="window.location.href='{{ route('loans.extend', $loan->id) }}'">{{__('Extend loan')}}</button>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="text-center">{{__('Loan Register')}}</h2>
    </div>
    <div class="card-body">
        @if($allLoans->isEmpty())
            <p class="text-center">{{__('No previous loans found')}}.</p>
        @else
            <ul class="list-group">
                @foreach($allLoans as $loan)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <span>{{ $loan->id }}</span>
                            <span>{{ $loan->due_date->format('d/m/Y') }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection;
