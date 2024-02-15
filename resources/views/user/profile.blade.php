@extends('layouts.app')

@section('content')
@if(auth()->check())
<div class="card">
    <div class="card-header">
        <h1 class="text-center">Gestión del perfil de usuario
        <p>ID del usuario: {{ auth()->user()->id }}</p>
        </h1>
    </div>    
    <div class="card-body">
        <p><strong>{{__('User Name')}}:</strong> {{ $user->username }}</p>
        <p><strong>{{__('Name')}}:</strong> {{ $user->name }}</p>
        <p><strong>{{__('Last Name')}}:</strong> {{ $user->last_name }}</p>
        @if ($user->last_name_2)
            <p><strong>{{__('Last Name 2')}}:</strong> {{ $user->last_name_2 }}</p>
        @endif
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <div class="text-center">
        @can('update', $user)
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{__('Edit Profile')}}</a>
        @endcan
        </div>
    </div>
    @include('layouts.botonera')

</div>
@else
    <!-- El usuario no está autenticado -->
    <p>Por favor, inicia sesión para ver esta página.</p>
@endif
@endsection