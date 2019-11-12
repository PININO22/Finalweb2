@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        
        <div class="container">
            <h4>Cantidad de Escuelas por provincia, sector, tipo y nivel</h4>
            <table class="table table-striped">
                <tr><th>Provincia</th><th>Sector</th><th>TipoEscuela</th><th>Nivel</th><th>Cantidad de escuelas</th></tr>
                @foreach($data['escuelasPorProvincia'] as $esc)
                    <tr>
                        <td>{{$esc->Provincia}}</td>
                        <td>{{$esc->Sector}}</td>
                        <td>{{$esc->TipoEscuela}}</td>
                        <td>{{$esc->Nivel}}</td>
                        <td>{{$esc->Cantidad}}</td>
                    </tr>
                @endforeach
            </table>

            <h4>Cantidad de Inscriptos por cargo, localidad, y persona</h4>
            <table class="table table-striped">
                <tr><th>Cargo</th><th>Localidad</th><th>cuil</th><th>Promedio</th></tr>
                @foreach($data['inscripcionesCargosLocalidadCuil'] as $esc)
                    <tr>
                        <td>{{$esc->cargo}}</td>
                        <td>{{$esc->localidad}}</td>
                        <td>{{$esc->cuil}}</td>
                        <td>{{$esc->Promedio}}</td>
                    </tr>
                @endforeach
            </table>

            <h4>Cantidad de inscripciones por localidad</h4>
            <table class="table table-striped">
                <tr><th>Localidad</th><th>Cantidad de Inscripciones</th></tr>
                @foreach($data['inscripcionesLocalidad'] as $esc)
                    <tr>
                        <td>{{$esc->localidad}}</td>                        
                        <td>{{$esc->Cantidad}}</td>
                    </tr>
                @endforeach
            </table>

            <h4>Cantidad de personas sin cargo por localidad</h4>
            <table class="table table-striped">
                <tr><th>Localidad</th><th>Personas sin Cargo</th></tr>
                @foreach($data['inscripcionesSinCargo'] as $esc)
                    <tr>
                        <td>{{$esc->localidad}}</td>
                        <td>{{$esc->PersonasSinCargo}}</td>
                    </tr>
                @endforeach
            </table>

            <h4>Docentes en escuelas y en orden de mérito</h4>
            <table class="table table-striped">
                <tr><th>CUIL</th><th>Nombre</th><th>Apellido</th></tr>
                @foreach($data['DocentesEnMerito'] as $esc)
                    <tr>
                        <td>{{$esc->CUIL}}</td>
                        <td>{{$esc->Nombre}}</td>
                        <td>{{$esc->Apellido}}</td>
                    </tr>
                @endforeach
            </table>

            <h4>Cantidad de Docentes por materia</h4>
            <table class="table table-striped">
                <tr><th>Materia</th><th>Cantidad de docentes</th></tr>
                @foreach($data['DocentesPorCargo'] as $esc)
                    <tr>
                        <td>{{$esc->Materia}}</td>
                        <td>{{$esc->Cantidad}}</td>
                    </tr>
                @endforeach
            </table>

            <h4>Cantidad de Docentes por escuela</h4>
            <table class="table table-striped">
                <tr><th>Escuela</th><th>Cantidad de docentes</th></tr>
                @foreach($data['DocentesPorEscuela'] as $esc)
                    <tr>
                        <td>{{$esc->Nombre}}</td>
                        <td>{{$esc->Cantidad}}</td>
                    </tr>
                @endforeach
            </table>

            
        
        </div>
        @else
            <h1>Solicite una escuela para ser asignado</h1>
        @endif

    @endsection
@endif




