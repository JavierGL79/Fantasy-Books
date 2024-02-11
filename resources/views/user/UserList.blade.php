@extends('layouts.app')

@section('content')
    <h1>Usuarios</h1>
    @if($users->isEmpty())
        <p>Aún no hay usuarios registrados.</p>
    @else
        <ul>
            @foreach($users as $user)
                <li>
                    <a href="{{ route('profile.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
