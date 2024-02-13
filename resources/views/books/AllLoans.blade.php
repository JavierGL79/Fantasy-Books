@extends('layouts.app')

@section('content')
@foreach($prestamos as $prestamo)
    <p>{{ $prestamo->user->name }}</p>
    <p>{{ $prestamo->libro->titulo }}</p>
    <p>{{ $prestamo->fecha_prestamo }}</p>
    <p>{{ $prestamo->fecha_devolucion }}</p>
    <!-- Mostrar si se solicitó una renovación y si el plazo ha vencido -->
@endforeach