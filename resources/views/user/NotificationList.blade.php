@extends('layouts.app')

@section('content')
    <h1>Notificaciones</h1>
    @if($notifications->isEmpty())
        <p>Aún no hay notificaciones disponibles.</p>
    @else
        <ul>
            @foreach($notifications as $notification)
                <li>{{ $notification->message }}</li>
            @endforeach
        </ul>
    @endif
@endsection