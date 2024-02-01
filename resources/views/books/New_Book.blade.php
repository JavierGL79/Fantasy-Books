@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="autor">Autor:</label>
                            <div class="col-md-6">
                                <input type="text" nam e="autor" required>
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
                       </div> <div class="row mb-3">
                            <label for="editorial">Editorial:</label>
                            <div class="col-md-6">
                                <input type="text" name="editorial" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="stock">Stock:</label>
                            <div class="col-md-6">
                                <input type="number" name="stock" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="foto">Foto:</label>
                            <div class="col-md-6">                           
                                <input type="file" name="foto">
                            </div>
                        </div>
                        @php
                            $buttonText = 'Register New Book';
                        @endphp
                        @include('layouts.botonera', ['buttonText' => $buttonText])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
