@extends('layouts.app')

@section('content')
<h1>Gestión de perfil</h1>
<div class="container">
        <h1>{{__('Profile')}}</h1>

        <p><strong>{{__('User Name')}}:</strong> {{ $user->username }}</p>
        <p><strong>{{__('Last Name')}}:</strong> {{ $user->last_name }}</p>
        @if ($user->last_name_2)
            <p><strong>{{__('Last Name 2')}}:</strong> {{ $user->last_name_2 }}</p>
        @endif
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <div class="text-center">
            <a href="{{ route('profiles.profile_edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
</div>
@endsection