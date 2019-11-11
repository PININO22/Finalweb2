@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            
            <table class="table">
                    <tr>
                            <th>Nombre</th><th>Apellido</th><th>Sexo</th><th>CUIL</th>
                            <th>Titulo</th><th>CategoriaTitulo</th><th>Localidad</th>
                        </tr>

                @foreach ($docentes as $docente)
                    <tr>
                        <td>{{$docente->Nombre}}</td>
                        <td>{{$docente->Apellido}}</td>
                        <td>{{$docente->Sexo}} </td>
                        <td>{{$docente->CUIL}} </td>
                        <td>{{$docente->Titulo}} </td>
                        <td>{{$docente->CategoriaTitulo}} </td>
                        <td>{{$docente->localidad->Nombre}} </td>
                        
                        
                        <td><a class="btn btn-link" href="{{route('Docentes.edit',$docente->id) }}" >Editar</a></td>
                        <form method='GET' action="{{route('Docentes.destroy',$docente->id) }}">
                            @method('DELETE')
                        <td><input type=submit class="btn btn-link" value ="Borrar"></td>
                    
                        </form>
                    </tr>
                        
                    
                @endforeach
            </table>
            
            <a class="btn btn-primary" href="{{route('Docentes.create') }}">Agregar docente</a>

            
        </div>
        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




