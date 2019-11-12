@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        
        @if(Auth::User()->rol=='admin')
            <h1>Agregar Escuela</h1><br>
            <form method="POST" action="{{ route('escuelas.update',$data['escuela']->id) }}">
                @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group row">{{--Nombre escuela - Email --}}
                        <label class="col-sm-2 col-form-label">Nombre de Escuela:*</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="Nombre" value={{$data['escuela']->Nombre}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">E-mail:</label>
                                <div class="col-sm-4">
                                  <input type="email" class="form-control" name="Email" value={{$data['escuela']->Email}}>
                                </div>                     
                    </div>

                    <div class="form-group row">{{--Telefonos--}}
                            <label class="col-sm-2 col-form-label">Telefono de la Escuela:</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="Telefono" value={{$data['escuela']->Telefono}}>
                                </div> 
                            <label class="col-sm-2 col-form-label">Telefono interno:</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="TelefonoInterno" value={{$data['escuela']->TelefonoInterno}}>
                                </div>                       
                    </div>
                
                    <div class="form-group row">{{--CUE - Nivel --}}
                            <label class="col-sm-2 col-form-label">CUE*</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="CUE" value={{$data['escuela']->CUE}}>
                                </div>   
                            <label class="col-sm-2 col-form-label">Nivel:*</label>
                            <div class="col-sm-4">                                       
                                    <select name="Nivel" class="form-control">
                                        @foreach($data['nivel'] as $prov)
                                            <option value="{{$prov['id']}}">{{$prov['Nombre']}}</option>
                                        @endforeach 
                                    </select>
                            </div>                   
                    </div>

                    <div class="form-group row">{{--Dirección - Provincia--}}
                            <label class="col-sm-2 col-form-label">Dirección:*</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="Direccion" value={{$data['escuela']->Direccion}}>
                                </div>   
                            <label class="col-sm-2 col-form-label">Provincia:*</label>
                                <div class="col-sm-4">                                       
                                        <select name="Provincia" class="form-control" id="provincia">
                                            <option hidden></option>
                                            @foreach($data['provincia'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['Nombre']}}</option>
                                            @endforeach 
                                        </select>
                                </div>    
                                               
                    </div>

                    <div class="form-group row">{{--Localidad - Cantidad alumnos --}}
                            <label class="col-sm-2 col-form-label">Localidad:</label>
                                <div class="col-sm-4">
                                        <select name="Localidad" class="form-control" id ="localidad">
                                                {{-- @foreach($data['localidad'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['Nombre']}}</option>
                                            @endforeach  --}}
                                              </select>
                                </div> 
                                <label class="col-sm-2 col-form-label">Cantidad de Alumnos:</label>
                                <div class="col-sm-4">
                                  <input type="number" class="form-control" name="CantidadAlumnos" value={{$data['escuela']->CantidadAlumnos}}>
                                </div>  
                    
                    </div>

                    <div class="form-group row">{{--Sector - Tipo de escuela--}}
                            <label class="col-sm-2 col-form-label">Sector:*</label>
                                <div class="col-sm-4">
                                        <select name="Sector" class="form-control">
                                                @foreach($data['sector'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['Nombre']}}</option>
                                            @endforeach 
                                              </select>
                                </div> 
                                <label class="col-sm-2 col-form-label">Tipo de escuela:*</label>
                                <div class="col-sm-4">
                                        <select name="TipoEscuela" class="form-control">
                                                @foreach($data['tipoEscuela'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['nombreTipo']}}</option>
                                            @endforeach 
                                              </select>
                                </div>  
                    
                    </div>

                    <div class="form-group row">{{--Tipo jornada . Tipo Secundaria--}}
                            <label class="col-sm-2 col-form-label">Tipo de jornada:*</label>
                                <div class="col-sm-4">
                                        <select name="TipoJornada" class="form-control">
                                                @foreach($data['tipoJornada'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['nombreTipo']}}</option>
                                            @endforeach 
                                              </select>
                                </div> 
                                <label class="col-sm-2 col-form-label">Tipo de secundaria:*</label>
                                <div class="col-sm-4">
                                        <select name="TipoSecundaria" class="form-control">
                                                <option value="">No es secundaria</option>
                                                @foreach($data['tipoSecundaria'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['nombreTipo']}}</option>
                                            @endforeach 
                                              </select>
                                </div> 
                    
                    </div>
                
                    <div class="form-group row">{{--Usuario - Orientación--}}
                            
                                <label class="col-sm-2 col-form-label">Orientación:</label>
                                <div class="col-sm-4">
                                        <input type="text" name="Orientacion" class="form-control" value={{$data['escuela']->Orientacion}}>
                                                
                                                
                                </div>  
                    
                    </div>

                    <div class="form-group row">{{--Ámbito - Bilingüe--}}
                            <label class="col-sm-2 col-form-label">Ámbito:*</label>
                                <div class="col-sm-4">
                                    
                                        <select name="Ambito" class="form-control">
                                                @foreach($data['ambito'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['Tipo']}}</option>
                                            @endforeach 
                                              </select>
                                </div>  
                                <label class="col-sm-2 col-form-label">Categoria:*</label>
                                <div class="col-sm-4">
                                    
                                        <select name="Categoria" class="form-control">
                                                @foreach($data['categoria'] as $prov)
                                                <option value="{{$prov['id']}}">{{$prov['Tipo']}}</option>
                                            @endforeach 
                                              </select>
                                </div> 
                            
                          </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="esBilingue" value="bil">
                                <label class="form-check-label" for="gridCheck">
                                  ¿Es Bilingüe?
                                </label>
                              </div>
                            </div>
                        </div>

                    <small>Todos los campos con * son obligatorios</small><br><br>
                    @if(!empty($data['validator']))
                        @foreach ($data['validator']->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                          </div>
                        @endforeach
                    @endif
                    
                     
                    
                    <button type="submit" class="btn btn-primary">Actualizar escuela</button>
                  </form>
        @else
            <h1>Solicite una escuela para ser asignado</h1>
        @endif    
    </div>
        
    <script type="text/javascript">
      var localidades= {!!json_encode($data['localidad'])!!};
    console.log(localidades);
      $("#provincia").change(function(event){
          selected = $(this).children("option:selected").val();
          res=localidades.filter(({id_provincia})=>id_provincia==selected);
          $("#localidad").empty();
          $.each(res, function(index, element){
              $("#localidad").append("<option value='"+element.id+"'>"+element.Nombre+"</option>");
          });
      });
  </script>
    @endsection
@endif




