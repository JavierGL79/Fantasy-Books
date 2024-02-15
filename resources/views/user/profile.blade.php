@extends('layouts.app')

@section('content')
@if(auth()->check())

    @section('card-header', 'Gestión del perfil de usuario')   
        {{ auth()->user()->iusername }}
    @endsection
    @section('card-body')
    </div>    
    <div class="card-body">
        <p><strong>{{__('User Name')}}:</strong> {{ $user->username }}</p>
        <p><strong>{{__('Name')}}:</strong> {{ $user->name }}</p>
        <p><strong>{{__('Last Name')}}:</strong> {{ $user->last_name }}</p>
        @if ($user->last_name_2)
            <p><strong>{{__('Last Name 2')}}:</strong> {{ $user->last_name_2 }}</p>
        @endif
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <a href="{{ route('user.edition', ['id' => $user->id]) }}" class="btn btn-primary">{{__('Profile Management')}}</a>
    </div>

    @include('layouts.botonera')

</div>
@else
    <!-- El usuario no está autenticado -->
    <p>Por favor, inicia sesión para ver esta página.</p>
@endif
@endsection