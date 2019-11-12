@extends('layouts.app')
@auth
    

    @section('content')

    
        @if(Auth::User()->rol=='admin')
        <div class="container">
                <div class="container">  
            <table class="table table-striped">
                    <tr>
                            <th>Nombre de Usuario</th><th>Nombre</th><th>Apellido</th><th>E-mail</th><th>Rol</th><th>Editar</th><th>Borrar</th>
                        </tr>

                @foreach ($users as $user)
                    @if($user!=Auth::User())
                        <tr>
                            <td>{{$user->Nick}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}} </td>
                            <td>{{$user->email}} </td>                        
                            <td>{{$user->rol}} </td>
                            <td><a class="btn btn-link" href="{{route('Usuarios.edit',$user->id) }}" ><img width="20" height="20" src="https://i.ibb.co/0QnP0qw/editar.png" alt="Editar"></a></td>                            
                            <td><a class="btn btn-link" href="{{route('Usuarios.destroy',$user->id) }}" ><img width="20" height="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Octagon_delete.svg/1024px-Octagon_delete.svg.png" alt="Borrar"></a></td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$user->Nick}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}} </td>
                            <td>{{$user->email}} </td>                        
                            <td>{{$user->rol}} </td>
                            
                            
                        </tr>
                    @endif       
                    
                @endforeach
            </table>
            

        </div>
        </div>
        @else
            <h1>Sos Encargado</h1>
        @endif

    @endsection
@endif




