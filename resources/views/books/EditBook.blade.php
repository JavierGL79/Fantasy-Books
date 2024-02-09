@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h1>{{ __('Edit Book') }}</h1>
                </div>

                @if(isset($status) && $status === 'success')
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                @if(isset($status) && $status === 'error')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif
                <div class="card-body">
                <form method="POST" action="{{ route('books.update', ['id' => $libro->id]) }}">

                        @csrf
                        @method('PATCH')
                        <div class="row">    
                            <div id="left_side" class="col-md-6">
                                <div class="row mb-3">
                                    <label for="autor">{{__('Author')}}:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="autor" value="{{ $libro->autor }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="titulo">{{__('Tittle')}}:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="titulo" value="{{ $libro->titulo }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="year">{{__('Year of edition')}}:</label>
                                    <div class="col-md-6">
                                        <input type="number" name="year" value="{{ $libro->year }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="editorial">Editorial:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="editorial" value="{{ $libro->editorial }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="stock">Stock:</label>
                                    <div class="col-md-6">
                                        <input type="number" name="stock" value="{{ $libro->stock }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6" id="right_side">   
                            <div class="row mb-3">
                                
                                <label for="information">{{__('Information')}}:</label>
                                    <div class="row mb-3">
                                        <label for="foto">{{__('Photo')}}:</label>
                                        <div class="col-md-6">
                                            <input type="file" name="foto" value="{{ $libro->foto }}">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <textarea name="information" rows="4"value="{{ $libro->information }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $buttonText = 'Aplly modifications';
                        @endphp
                        @include('layouts.botonera', ['buttonText' => $buttonText])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection