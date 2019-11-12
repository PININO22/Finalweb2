@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        
        
            <h1>Información de escuela</h1><br>            
                    {{ csrf_field() }}
                    <div class="form-group row">{{--Nombre escuela - Email --}}
                        <label class="col-sm-2 col-form-label">Nombre de Escuela:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Nombre" value={{$escuela->Nombre}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">E-mail:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="Email" value={{$escuela->Email}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Telefonos --}}
                        <label class="col-sm-2 col-form-label">Nombre de Escuela:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Telefono" value={{$escuela->Telefono}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Telefono Interno:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="TelefonoInterno" value={{$escuela->TelefonoInterno}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Cue - Nivel --}}
                        <label class="col-sm-2 col-form-label">CUE:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="CUE" value={{$escuela->CUE}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Nivel:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="Nivel" value={{$escuela->Nivel->Nombre}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Direccion - Provincia --}}
                        <label class="col-sm-2 col-form-label">Direccion:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Direccion" value={{$escuela->Direccion}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Provincia:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="Provincia" value={{$escuela->localidad->provincia->Nombre}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Localidad - Cantidad alumnos --}}
                        <label class="col-sm-2 col-form-label">Localidad:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Localidad" value={{$escuela->localidad->Nombre}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Cantiodad Alumnos:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="CantidadAlumnos" value={{$escuela->CantidadAlumnos ?? 'No asignado'}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Sector - Tipo de escuela --}}
                        <label class="col-sm-2 col-form-label">Sector:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Sector" value={{$escuela->Sector->Nombre}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Tipo de escuela:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="TipoEscuela" value={{$escuela->TipoEscuela->nombreTipo}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Tipo de jornada - Tipo de secundaria --}}
                        <label class="col-sm-2 col-form-label">Tipo de jornada:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="TipoJornada" value={{$escuela->TipoJornada->nombreTipo}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Tipo de secundaria:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="TipoSecundaria" value={{$escuela->TipoSecundaria->nombreTipo ?? 'No es secundaria'}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--usuario - orientacion --}}
                        <label class="col-sm-2 col-form-label">Usuario a cargo:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Usuario" value={{$escuela->usuario->Nick}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">Orientación:</label>
                                <div class="col-sm-4">
                                  <input type="text" readonly class="form-control" name="Orientacion" value={{$escuela->Orientacion}}>
                                </div>                     
                    </div>
                    <div class="form-group row">{{--Ambito - Categoria --}}
                        <label class="col-sm-2 col-form-label">Ámbito:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Ambito" value={{$escuela->Ambito->Tipo}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">¿Es bilingue?:</label>
                            <div class="col-sm-4">
                              <input type="text" readonly class="form-control" name="Esbilingue" value={{$escuela->EsBilingue ?? 'No'}}>
                            </div>                    
                    </div>
                    
                    
                    

                   
                    
        @if(Auth::User()->rol=='admin')   
        <a class="btn btn-link" href="{{route('planta.show',$escuela->id) }}" >Planta docente</a>        
        @else
          <a class="btn btn-link" href="{{route('planta.show',$escuela->id) }}" >Planta docente</a>
        @endif    
    </div>
        
    
    @endsection
@endif