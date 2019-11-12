@extends('layouts.app')
@auth
    

    @section('content')

    
        
        <div class="container">
                
            <h1 style="float:left;">{{$data['escuela']->Nombre}}</h1><a style="float:right;"class="btn btn-success" href="{{route('planta.select',$data['escuela']->id) }}" >Agregar docente</a>
            <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Nombre</th><th>Apellido</th><th>Materia</th><th>Curso</th><th>División</th><th>Nivel</th>
                            <th>Horas</th><th>Situasión de Revista</th><th>Borrar</th>
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
                            
                            {{-- <form method='POST' action="{{route('Planta.destroy',$pl)}}">
                                    @method('DELETE')
                                <td><input type=submit class="btn btn-primary" value ="Borrar"></td>
                            </form> --}}

                            <td> <a href="{{route('Planta.destroy',$pl) }}"><img width="20" height="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Octagon_delete.svg/1024px-Octagon_delete.svg.png" alt="Borrar"></a></td>
                        </tr>
                    @endforeach
                    </table>
                
            </div>
            {!!$data['planta']->render()!!}
            
    </div>
            

        

    @endsection
@endif




