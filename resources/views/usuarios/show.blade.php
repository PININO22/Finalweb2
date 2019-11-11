@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <table>['Nombre','Orientacion','Telefono','TelefonoInterno','Email','EsBilingue','CantidadAlumnos','CUE','Direccion']
            @foreach ($escuelas as $esc)
                <tr>
                    <th>Nombre</th><th>Orientacion</th><th>Telefono</th><th>Telefono Interno</th><th>Email</th><th>Es Bilingüe</th><th>Cantidad de Alumnos</th><th>CUE</th><th>Direccion</th>
                </tr>
                <tr>
                    <td>{{$esc->Nombre}}</td>
                    <td>{{$esc->Orientacion}}</td>
                    <td>{{$esc->Telefono}}</td>
                    <td>{{$esc->TelefonoInterno}}</td>
                    <td>{{$esc->Email}}</td>
                    <td>{{$esc->EsBilingue}}</td>
                    <td>{{$esc->CantidadAlumnos}}</td>
                    <td>{{$esc->CUE}}</td>
                    <td>{{$esc->Dirección}}</td>

                </tr>
            @endforeach
        </table>
        <form action=App\Http\Controllers\EscuelaController@create>
            <button type="button">Agregar una nueva escuela</button>
        </form>
            

        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




