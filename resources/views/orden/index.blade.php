@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">            
                <form method="post" action="{{route('orden.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Subir</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="file" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Elija un archivo con extención .xls</label>
                              
                            </div>
                            
                          </div>
                          <input type="submit" class="btn btn-success" value="Enviar" style="padding: 10px 20px;">
                    
                </form>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                            <tr class="table-info">
                                    <th>Año</th><th>CUIL</th><th>Nombre</th><th>Apellido</th>
                                    <th>Cargo</th><th>Titulo</th><th>Nivel</th><th>Incumbencia</th><th>Cat.Titulo</th>
                                    <th>Sexo</th><th>Localidad</th>
                                </tr>
        
                        @foreach ($data as $orden)
                            <tr>
                                <td>{{$orden->Año}}</td>
                                <td>{{$orden->CUIL}}</td>
                                <td>{{$orden->Nombre}} </td>
                                <td>{{$orden->Apellido}} </td>
                                <td>{{$orden->Cargo}} </td>
                                <td>{{$orden->Titulo}} </td>
                                <td>{{$orden->nivel}} </td>
                                <td>{{$orden->incumbencia}} </td>
                                <td>{{$orden->CategoriaTitulo}} </td>
                                <td>{{$orden->sexo}} </td>
                                <td>{{$orden->localidad}} </td>
                                
                                
                            </tr>
                                
                            
                        @endforeach
                    </table>
                    {!!$data->render()!!}
                </div>
        </div>
        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




