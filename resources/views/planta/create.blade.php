@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        
        @if(Auth::User()->rol=='admin')
            <h1>Agregar Docente</h1><br>
            <form method="POST" action="{{ route('planta.store') }}">
                    {{ csrf_field() }}   

                    <div class="form-group row">{{--Curso - División--}}                        
                        <label class="col-sm-2 col-form-label">Curso:</label>
                            <div class="col-sm-4">
                                <select name="Curso" class="form-control">                                                
                                    <option value="primero">primero</option>
                                    <option value="segundo">segundo</option>
                                    <option value="tercero">tercero</option>
                                    <option value="cuarto">cuarto</option>
                                    <option value="quinto">quinto</option>
                                    <option value="sexto">sexto</option>
                                    <option value="septimo">septimo</option>
                                </select>           
                            </div>
                        <label class="col-sm-2 col-form-label">División:</label>
                            <div class="col-sm-4">
                                <select name="Division" class="form-control">                                                
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>           
                            </div>                                               
                    </div>

                    <div class="form-group row">{{--Provincia - Localidad--}}                        
                        <label class="col-sm-2 col-form-label">Horas:*</label>
                            <div class="col-sm-4">
                                @if($data['escuela']->Nivel=='secundario')
                                    <input type="number" name="Horas" class="form-control" value="1">
                                @else
                                <input type="text" readonly name="Horas" class="form-control" placeholder="Solo es necesario en colegios secundarios ">
                                        
                                @endif
                            </div> 
                        <label class="col-sm-2 col-form-label">Situación de revista:</label>
                            <div class="col-sm-4">
                                <select name="SituacionRevista" class="form-control">                                                
                                    <option value="titular">Títular</option>
                                    <option value="interino">Interino</option>
                                    <option value="suplente">Suplente</option>
                                    <option value="licencia">Licencia</option>
                                </select> 
                            </div>                                               
                    </div>   
                    <div class="form-group row">{{--Provincia - Localidad--}}                        
                        <label class="col-sm-2 col-form-label">Materia:*</label>
                            <div class="col-sm-4">                               
                                    <input type="text" name="Materia" class="form-control" value="">
                                
                            </div>                                                                       
                    </div>   
                    <input type="hidden" name="idDocente" class="form-control" value="{{$data['docente']->id}}">          
                    <input type="hidden" name="idEscuela" class="form-control" value="{{$data['escuela']->id}}">          
                    <input type="hidden" name="clave" class="form-control" value="">          
                    <small>Todos los campos con * son obligatorios</small><br><br>
                    @if(!empty($data['validator']))
                        @foreach ($data['validator']->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                          </div>
                        @endforeach
                    @endif
                    
                    
                     
                    
                    <button type="submit" class="btn btn-primary">Agregar Docente a la planta</button>
                  </form>
        @else
            <h1>Sos Encargado</h1>
        @endif    
    </div>
        

    @endsection
@endif




