@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="text-center">Gestión del perfil de usuario</h1>
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
            <a href="{{ route('profiles.profile_edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection