@extends('layouts.app')

@section('content')
    <h1>Editar perfil</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div>
            <label for="username">Nombre de usuario</label>
            <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}">
        </div>

        <!-- Añade aquí más campos según sea necesario -->

        <div>
            <button type="submit">Actualizar perfil</button>
        </div>
    </form>
@endsection
