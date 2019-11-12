@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        
        @if(Auth::User()->rol=='admin')
            <h1>Agregar Escuela</h1><br>
            <form method="POST" action="{{ route('Usuarios.update',$data['user']->id) }}">
                @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group row">{{--Nombre - Email --}}
                        <label class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="Nombre" value={{$data['user']->nombre}}>
                            </div>   
                            <label class="col-sm-2 col-form-label">E-mail:</label>
                                <div class="col-sm-4">
                                  <input type="email" class="form-control" name="email" value={{$data['user']->email}}>
                                </div>                     
                    </div>

                    <div class="form-group row">{{--Apellido--}}
                            <label class="col-sm-2 col-form-label">Apellido:</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="Apellido" value={{$data['user']->apellido}}>
                                </div> 
                                <label class="col-sm-2 col-form-label">Rol:</label>
                                <div class="col-sm-4">
                                    <select name="rol" class="form-control">                                                
                                        <option value="encargado">encargado</option>
                                        <option value="admin">admin</option>
                                            
                                    </select>
                                </div> 
                                               
                    </div>
                    <div class="form-group row">{{--Escuela--}}
                            <label class="col-sm-2 col-form-label">Escuela:</label>
                                <div class="col-sm-4">
                                    <select name="escuela" class="form-control">  
                                        <option selected value="{{$data['escuela']->id}}">{{$data['escuela']->Nombre}}</option>  
                                        @foreach($data['restoescuelas'] as $esc)                                            
                                        
                                        <option value="{{$esc->id}}">{{$esc->nombre}}</option>
                                         
                                        @endforeach
                                    </select>
                                </div>                                
                                               
                    </div>
                
                    
                    @if(!empty($data['validator']))
                        @foreach ($data['validator']->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                          </div>
                        @endforeach
                    @endif
                    
                     
                    
                    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                  </form>
        @else
            <h1>Sos Encargado</h1>
        @endif    
    </div>
        

    @endsection
@endif




