@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">LISTADO ACTUAL DE USUARIOS DE FANTASY BOOKS</h2>
    </div>
    <div class="card-body">
        @if($users->isEmpty())
            <p>Aún no hay usuarios registrados.</p>
        @else
            <ul>
                @foreach($users as $user)
                <div class="user-item">
                <div class="card">
                        <div class="card-body">
                        <li style="display: flex; align-items: center;">
                            <h4 style="margin-right: 10px;">{{ $user->last_name }}</h4> 
                            <h4 style="margin-right: 10px;">{{ $user->last_name_2 }},</h4>
                            <h4 style="margin-right: 10px;"> {{ $user->name }}</h4>
                            <span class="{{ $user->es_bibliotecario ? 'bibliotecario-badge' : 'usuario-badge' }}" style="{{ $user->es_bibliotecario ? '' : 'display: inline-block;' }}">
                                {{ $user->es_bibliotecario ? 'Bibliotecario' : 'Usuario' }}
                            </span>
                            <a class="btn btn-primary" href="{{ route('profile.show', ['id' => $user->id]) }}">{{__('Profile Management')}}</a>
                        </li>
                        </div>
                        </div>    
                    </div>
                @endforeach
            </ul>
        @endif
    </div>
</div>
{{ $users->links() }}
@endsection
