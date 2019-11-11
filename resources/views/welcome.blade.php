@extends('layouts.app')
@auth
    

    @section('content')
    
    <div class="container">
        @if(Auth::User()->rol=='admin')
        
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <img src="https://i1.wp.com/noticieros.televisa.com/wp-content/uploads/2019/10/escuela-michoacan.jpg?resize=1045%2C602&quality=95&ssl=1" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Gestión de escuelas</h5>
                      <p class="card-text">Aquí están todas las escuelas registradas y puedes editarlas, borrarlas y agregar nuevas escuelas</p>
                      <a href="{{route('escuelas.index') }}" class="btn btn-primary">Escuelas</a>
                    </div>
                </div>
                <h1>&nbsp</h1>
                <div class="card" style="width: 18rem;">
                    <img src="http://www.marketexpress.in/wp-content/uploads/2014/07/Quality-Quantity-Users-MarketExpress.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Gestión de usuarios</h5>
                      <p class="card-text">Aquí se encuentran todos los usuarios registrados y puedes modificar sus roles y borrarlos del sistema</p>
                      <a href="{{route('Usuarios.index') }}" class="btn btn-primary">Usuarios</a>
                    </div>
                </div>
                <h1>&nbsp</h1>
                <div class="card" style="width: 18rem;">
                    <img src="https://www.ewa.org/sites/main/files/imagecache/lightbox/main-images/bigstock-pretty-teacher-smiling-at-came-69887626.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de docentes</h5>
                        <p class="card-text">Administra todos los docentes registrados en el sistema, modifica sus registros e ingresa nuevos docentes</p>
                        <a href="{{route('Docentes.index') }}" class="btn btn-primary">Docentes</a>
                    </div>
                </div>
                <h1>&nbsp</h1>
                <div class="card" style="width: 18rem;">
                    <img src="https://lawnews.hofstra.edu/wp-content/uploads/2013/08/generic-Gold-Medal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Órdenes de mérito</h5>
                      <p class="card-text">Se encuentran todas las órdenes de mérito cargadas, puedes agregar nuevas o borrar existentes</p>
                      <a href="{{route('orden.index') }}" class="btn btn-primary">Orden de mérito</a>
                    </div>
                </div>
                <h1>&nbsp</h1>
                
            
            </div>
            
        @else
            {!!redirect()->route('escuelas.show',Auth::User()->id_escuela)!!}
        @endif    
    </div>

        

    @endsection
@endif




