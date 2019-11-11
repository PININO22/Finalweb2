@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            <h1>{{$data['escuela']->Nombre}}</h1>
            <table class="table">
                    <tr>
                            <th>Nombre</th><th>Apellido</th><th>Materia</th><th>Curso</th><th>División</th><th>Nivel</th>
                            <th>Horas</th><th>Situasión de Revista</th>
                        </tr>
                @foreach ($data['planta'] as $pl)
                    
                    <tr>
                        <td>{{$pl->docentes->Nombre}}</td>
                        <td>{{$pl->docentes->Apellido}}</td>
                        <td>{{$pl->Materia}}</td>
                        <td>{{$pl->Curso}}</td>
                        <td>{{$pl->Division}}</td>
                        <td>{{$pl->Escuela->Nivel->Nombre}}</td>
                        <td>{{$pl->Horas??'Sin asignar'}}</td>
                        <td>{{$pl->SituacionRevista}}</td>
                        
                        {{-- <td><a class="btn btn-link" href="{{route('escuelas.edit',$esc->id) }}" >Editar</a></td>
                        <form method='GET' action="{{route('escuelas.destroy',$esc->id) }}">
                            @method('DELETE')
                        <td><input type=submit class="btn btn-link" value ="Borrar"></td> --}}
                    </tr>
                @endforeach
            </table>
            <td><a class="btn btn-link" href="{{route('planta.select',$data['escuela']->id) }}" >Agregar docente</a></td>
        </div>
            

        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




