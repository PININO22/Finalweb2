@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            @if(!empty($data['erroneos']))
                <h4>Hay {{sizeof($data['erroneos'])-1}} órdenes fallidas, ¿Desea corregirlas o descartarlas?</h4>
                <a class="btn btn-primary" href="{{route('orden.edit', sizeof($data['erroneos'])-1) }}">Corregir</a><a></a>
                <a class="btn btn-primary" href="{{route('orden.delete') }}">Descartar</a>
            @endif
        </div>
            

        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




