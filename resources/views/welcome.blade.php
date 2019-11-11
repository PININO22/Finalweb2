@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        @if(Auth::User()->rol=='admin')
            <h1>Sos Admin</h1>
            <a class="btn btn-primary" href="{{route('escuelas.index') }}">Escuelas</a>
            <a class="btn btn-primary" href="{{route('Usuarios.index') }}">Usuarios</a>
            <a class="btn btn-primary" href="{{route('Docentes.index') }}">Docentes</a>
            <a class="btn btn-primary" href="{{route('orden.index') }}">Orden de Mérito</a>
        @else
            <h1>Sos Encargado</h1>
        @endif    
    </div>
        

    @endsection
@endif




