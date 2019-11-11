@extends('layouts.app')
@auth
    

    @section('content')

    <div class="container">
        
        @if(Auth::User()->rol=='admin')
            <h1>Editar docente</h1><br>
            <form method="POST" action="{{ route('Docentes.update',$data['docente']->id) }}">
                @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group row">{{--Nombre - Apellido --}}
                      <label class="col-sm-2 col-form-label">Nombre:*</label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control" name="Nombre" value="{{$data['docente']->Nombre}}">
                          </div>   
                      <label class="col-sm-2 col-form-label">Apellido:*</label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control" name="Apellido" value="{{$data['docente']->Apellido}}">
                          </div>                     
                  </div>

                  <div class="form-group row">{{--Sexo - Cuil--}}
                      <label class="col-sm-2 col-form-label">Sexo:*</label>
                          <div class="col-sm-4">
                              <select name="sexo" class="form-control">                                                
                                  <option value="masculino">Masculino</option>
                                  <option value="femenino">Femenino</option>
                              </select>
                          </div> 
                      <label class="col-sm-6 col-form-label">CUIL:* {{$data['docente']->CUIL}}</label>
                                                                        
                  </div>

                  <div class="form-group row">{{--Titulo - CategoriaTitulo--}}                        
                      <label class="col-sm-2 col-form-label">Titulo:*</label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control" name="Titulo" value="{{$data['docente']->Titulo}}">
                          </div> 
                      <label class="col-sm-2 col-form-label">Categoria Título:*</label>
                          <div class="col-sm-4">
                              <select name="CategoriaTitulo" class="form-control">                                                
                                  <option value="docente">Docente</option>
                                  <option value="no docente">No Docente</option>
                              </select>           
                          </div>                                               
                  </div>

                  <div class="form-group row">{{--Provincia - Localidad--}}                        
                      <label class="col-sm-2 col-form-label">Provincia:*</label>
                          <div class="col-sm-4">
                          <select name="Provincia" class="form-control" value="" id='provincia'>
                                <option hidden></option>
                                  @foreach($data['provincia'] as $prov)
                                      <option value="{{$prov['id']}}">{{$prov['Nombre']}}</option>
                                  @endforeach 
                              </select>
                                          
                          </div> 
                      <label class="col-sm-2 col-form-label">Localidad:*</label>
                          <div class="col-sm-4">
                              <select name="Localidad" class="form-control" value="{{$data['docente']->id_localidad}}" id='localidad'>
                                  {{-- @foreach($data['localidad'] as $prov)
                                      <option value="{{$prov['id']}}">{{$prov['Nombre']}}</option>
                                  @endforeach  --}}
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
                    
                     
                    
                    <button type="submit" class="btn btn-primary">Actualizar Docente</button>
                  </form>
        @else
            <h1>Sos Encargado</h1>
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




