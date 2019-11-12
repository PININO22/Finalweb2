@extends('layouts.app')
@auth
    

    @section('content')

    
        
        <div class="container">
                
            <h1>{{$data['escuela']->Nombre}}</h1>
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

                            <td> <a href="{{route('Planta.destroy',$pl) }}" class="btn btn-primary">Borrar</a></td>
                        </tr>
                    @endforeach
                    </table>
                
            </div>
            {!!$data['planta']->render()!!}
            <a class="btn btn-link" href="{{route('planta.select',$data['escuela']->id) }}" >Agregar docente</a>
    </div>
            

        

    @endsection
@endif




