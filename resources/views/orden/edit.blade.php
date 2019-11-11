@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        
        @if(Auth::User()->rol=='admin')
            <h1>Corregir orden de merito</h1><br>
            <form method="POST" action="{{ route('orden.update',0) }}">
                @method('PATCH')

                @foreach($data['errors'] as $error)
                    {{ csrf_field() }}
                    <div class="form-group row">{{--Nombre - Apellido - año - cuil --}}
                      <label class="col-sm-1 col-form-label">Año:*</label>
                          <div class="col-sm-1">
                          <input type="text" class="form-control" name="año{{$error->CUIL}}" value="{{$error->año}}">
                          </div>   
                      <label class="col-sm-1 col-form-label">CUIL:*</label>
                          <div class="col-sm-2">
                              <input type="text" class="form-control" name="cuil{{$error->CUIL}}" value="{{$error->CUIL}}">
                          </div>  
                          <label class="col-sm-1 col-form-label">Nombre:*</label>
                          <div class="col-sm-2">
                              <input type="text" class="form-control" name="nombre{{$error->CUIL}}" value="{{$error->nombre}}">
                          </div>
                          <label class="col-sm-1 col-form-label">Apellido:*</label>
                          <div class="col-sm-2">
                              <input type="text" class="form-control" name="apellido{{$error->CUIL}}" value="{{$error->apellido}}">
                          </div>                   
                  </div>

                  <div class="form-group row">{{--Sexo - nivel - cargo --}}
                      <label class="col-sm-1 col-form-label">sexo:*</label>
                          <div class="col-sm-2">
                              <select name="sexo{{$error->CUIL}}" class="form-control">   
                                  @if($error->sexo=="Masculino")                                             
                                  <option selected value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>
                                  @else
                                  <option value="Masculino">Masculino</option>
                                  <option selected value="Femenino">Femenino</option>
                                  @endif
                              </select>
                          </div> 
                          <label class="col-sm-1 col-form-label">nivel:*</label>
                          <div class="col-sm-2">
                              <select name="nivel{{$error->CUIL}}" class="form-control">   
                                  @if($error->nivel=="Inicial")                                             
                                    <option selected value="Inicial">Inicial</option>
                                    <option value="Primario">Primario</option>
                                    <option value="Secundario">Secundario</option>
                                  @elseif($error->nivel=="Primario")                                             
                                    <option  value="Inicial">Inicial</option>
                                    <option selected value="Primario">Primario</option>
                                    <option value="Secundario">Secundario</option>
                                  @else
                                    <option  value="Inicial">Inicial</option>
                                    <option  value="Primario">Primario</option>
                                    <option selected value="Secundario">Secundario</option>
                                  @endif
                              </select>
                          </div> 
                          <label class="col-sm-1 col-form-label">cargo:*</label>
                          <div class="col-sm-2">
                              <input type="text" class="form-control" name="cargo{{$error->CUIL}}" value="{{$error->cargo}}">
                          </div> 
                                                                        
                  </div>

                  <div class="form-group row">{{--Localidad - incumbencia - Titulo - CategoriaTitulo--}}  

                        <label class="col-sm-1 col-form-label">Localidad:*</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="localidad{{$error->CUIL}}" value="{{$error->localidad}}">
                            </div> 
                        <label class="col-sm-1 col-form-label">Incumbencia:*</label>
                            <div class="col-sm-1">
                                <select name="incumbencia{{$error->CUIL}}" class="form-control">                                                
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="B4">B4</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                    
                                </select>           
                            </div>  
                            
                        <label class="col-sm-1 col-form-label">Titulo:*</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="titulo{{$error->CUIL}}" value="{{$error->titulo}}">
                            </div> 
                        <label class="col-sm-1 col-form-label">Cat. Titulo:*</label>
                            <div class="col-sm-2">
                                <select name="categoriatitulo{{$error->CUIL}}" class="form-control">                                                
                                    <option value="Docente">Docente</option>
                                    <option value="No Docente">No Docente</option>
                                    
                                    
                                </select>           
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
                    
                    <br><br>       

                    @endforeach     
                    
                    <button type="submit" class="btn btn-primary">Corregir Orden de mérito</button>
                  </form>
        @else
            <h1>Sos Encargado</h1>
        @endif    
    </div>
        
    
    @endsection
@endif




