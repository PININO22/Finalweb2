@extends('layouts.app')
@auth
    

    @section('content')

    
        
        <div class="container">
            
            <table class="table">
                    <tr>
                            <th>Nombre</th><th>Apellido</th><th>Sexo</th><th>CUIL</th>
                            <th>Titulo</th><th>CategoriaTitulo</th><th>Localidad</th>
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
                        
                        
                        <td><a class="btn btn-link" href="{{route('planta.create',[$docente->id,$data['escuela']->id]) }}" >Seleccionar</a></td>
                        
                        </form>
                    </tr>
                        
                    
                @endforeach
            </table>            
        </div>
       

    @endsection
@endif




