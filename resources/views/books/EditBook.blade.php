@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>

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
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div id="left_side">
                            <div class="row mb-3">
                                <label for="autor">Autor:</label>
                                <div class="col-md-6">
                                    <input type="text" name="autor" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="titulo">Título:</label>
                                <div class="col-md-6">
                                    <input type="text" name="titulo" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="year">Año:</label>
                                <div class="col-md-6">
                                    <input type="number" name="year" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="editorial">Editorial:</label>
                                <div class="col-md-6">
                                    <input type="text" name="editorial" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stock">Stock:</label>
                                <div class="col-md-6">
                                    <input type="number" name="stock">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="foto">Foto:</label>
                                <div class="col-md-6">
                                    <input type="file" name="foto">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-6" id="right_side">   
                            <div class="row mb-3">
                                <label for="information">{{__('Information')}}:</label>
                                <div class="col-md-6">
                                    <textarea name="information" rows="4"></textarea>
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