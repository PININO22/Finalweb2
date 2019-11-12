@extends('layouts.app')
@auth
    

    @section('content')

    
        
        <div class="container">
            
            <table class="table table-striped">
                    <tr>
                            <th>Nombre</th><th>Apellido</th><th>Sexo</th><th>CUIL</th>
                            <th>Titulo</th><th>CategoriaTitulo</th><th>Localidad</th><th>Seleccionar</th>
                        </tr>

                @foreach ($data['docente'] as $docente)
                    <tr>
                        <td>{{$docente->Nombre}}</td>
                        <td>{{$docente->Apellido}}</td>
                        <td>{{$docente->Sexo}} </td>
                        <td>{{$docente->CUIL}} </td>
                        <td>{{$docente->Titulo}} </td>
                        <td>{{$docente->CategoriaTitulo}} </td>
                        <td>{{$docente->localidad->Nombre}} </td>
                        
                        
                        <td><a class="btn btn-link" href="{{route('planta.create',[$docente->id,$data['escuela']->id]) }}" ><img width="20" height="20" src="https://i.ibb.co/0QnP0qw/editar.png" alt="Seleccionar"></a></td>
                        
                        </form>
                    </tr>
                        
                    
                @endforeach
            </table> 
            {!!$data['docente']->render()!!}
            <h5>¿No se encuentra el docente en la lista? Agrégalo!</h5>
            <a class="btn btn-success" href="{{route('Docentes.create') }}">Agregar docente</a>           
        </div>
       

    @endsection
@endif




