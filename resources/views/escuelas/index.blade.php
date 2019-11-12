@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            
            <table class="table table-striped">
                    <tr>
                            <th>Nombre</th><th>Orientacion</th><th>Telefono</th>
                            <th>Email</th><th>Provincia</th><th>Localidad</th><th>CUE</th>
                            
                            <th>Nivel</th>
                            <th>Editar</th><th>Info</th><th>Borrar</th>
                        </tr>

                @foreach ($escuelas as $esc)
                    <tr>
                        <td>{{$esc->Nombre}}</td>
                        <td>{{$esc->Orientacion}}</td>
                        <td>{{$esc->Telefono}} </td>
                        <td>{{$esc->Email}} </td>
                        <td>{{$esc->localidad->provincia->Nombre}} </td>
                        <td>{{$esc->localidad->Nombre}} </td>
                        <td>{{$esc->CUE}} </td>
                        <td>{{$esc->Nivel->Nombre}} </td>
                        
                        <td><a href="{{route('escuelas.edit',$esc->id) }}" ><img width="20" height="20" src="https://i.ibb.co/0QnP0qw/editar.png" alt="Editar"></a></td>
                        <td><a href="{{route('escuelas.show', Auth::User()->id) }}" ><img width="20" height="20" src="https://definicion.de/wp-content/uploads/2008/06/Informaci%C3%B3n.png" alt="Información"></a></td>
                        <td><a href="{{route('escuelas.destroy',$esc->id) }}" ><img width="20" height="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Octagon_delete.svg/1024px-Octagon_delete.svg.png" alt="Borrar"></a></td>
                        
                    
                        </form>
                    </tr>
                        
                    
                @endforeach
            </table>
            {!!$escuelas->render()!!}
            <a class="btn btn-success" href="{{route('escuelas.create') }}">Agregar Escuela</a>

            
        </div>
        @else
            <h1>Solicite una escuela para ser asignado</h1>
        @endif

    @endsection
@endif




