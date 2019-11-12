@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            
            <table class="table table-striped">
                    <tr>
                            <th>Nombre</th><th>Apellido</th><th>Sexo</th><th>CUIL</th>
                            <th>Titulo</th><th>Categoria del Titulo</th><th>Localidad</th><th>Editar</th><th>Borrar</th>
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
                        
                        
                        <td><a class="btn btn-link" href="{{route('Docentes.edit',$docente->id) }}" ><img width="20" height="20" src="https://i.ibb.co/0QnP0qw/editar.png" alt="Editar"></a></td>
                        <td><a class="btn btn-link" href="{{route('Docentes.destroy',$docente->id) }}" ><img width="20" height="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Octagon_delete.svg/1024px-Octagon_delete.svg.png" alt="Borrar"></a></td>
                        
                    </tr>
                        
                    
                @endforeach
            </table>
            
            <a class="btn btn-success" href="{{route('Docentes.create') }}">Agregar docente</a>

            
        </div>
        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




