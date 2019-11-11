@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
            
            <table class="table">
                    <tr>
                            <th>Nombre de Usuario</th><th>Nombre</th><th>Apellido</th><th>E-mail</th><th>Rol</th>
                        </tr>

                @foreach ($users as $user)
                    @if($user!=Auth::User())
                        <tr>
                            <td>{{$user->Nick}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}} </td>
                            <td>{{$user->email}} </td>                        
                            <td>{{$user->rol}} </td>
                            <td><a class="btn btn-link" href="{{route('Usuarios.edit',$user->id) }}" >Editar</a></td>
                            <form method='GET' action="{{route('Usuarios.destroy',$user->id) }}">
                                @method('DELETE')
                            <td><input type=submit class="btn btn-link" value ="Borrar"></td>
                        
                            </form>
                        </tr>
                    @else
                        <tr>
                            <td>{{$user->Nick}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}} </td>
                            <td>{{$user->email}} </td>                        
                            <td>{{$user->rol}} </td>
                            <td><a class="btn btn-link" href="{{route('Usuarios.edit',$user->id) }}" >Editar</a></td>
                            
                        </tr>
                    @endif       
                    
                @endforeach
            </table>
            

            
        </div>
        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




