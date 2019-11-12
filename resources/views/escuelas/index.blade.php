@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            
            <table class="table">
                    <tr>
                            <th>Nombre</th><th>Orientacion</th><th>Telefono</th>
                            <th>Email</th><th>Provincia</th><th>Localidad</th><th>CUE</th>
                            
                            <th>Nivel</th>
                            <th></th><th></th>
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
                        
                        <td><a class="btn btn-primary" href="{{route('escuelas.edit',$esc->id) }}" >Editar</a></td>
                        <td><a class="btn btn-primary" href="{{route('escuelas.show',$esc->id) }}" >MásInfo</a></td>
                        <td><a class="btn btn-primary" href="{{route('escuelas.destroy',$esc->id) }}" >Borrar</a></td>
                        
                    
                        </form>
                    </tr>
                        
                    
                @endforeach
            </table>
            
            <a class="btn btn-primary" href="{{route('escuelas.create') }}">Agregar Escuela</a>

            
        </div>
        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




