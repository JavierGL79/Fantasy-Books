@extends('layouts.app')

@section('content')

<div class="card" id="active-loans">
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
                            <span>{{ $loan->book->titulo }}</span> <!-- Se muestra el título del libro -->
                            
                                <div>
                                    <!-- Botón para devolver el préstamo -->
                                    <form action="{{ route('devolver-prestamo', $loan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">{{__('Return')}}</button>
                                    </form>
                                    <!-- Botón para prolongar el préstamo -->
                                    @if(!$loan->extended)
                                        <form action="{{ route('prolongar-prestamo', $loan->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">{{__('Extend loan')}}</button>
                                        </form>
                                    @else
                                        <span>{{__('Loan cannot be extended further')}}</span>
                                    @endif
                                </div>  
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
    <div class="card-body justify-content-start">
        @if($allLoans->isEmpty())
            <p class="text-center">{{__('No previous loans found')}}.</p>
        @else
            <ul class="list-group">
                @foreach($allLoans as $loan)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <span>{{ $loan->id }}</span> 
                            <span>{{ $loan->book->titulo }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection
