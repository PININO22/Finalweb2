<?php
use App\Ambito;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "wecdb" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return view('welcome');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/escuelas','EscuelaController');

Route::resource('/Usuarios','UsuariosController');

Route::resource('/Docentes','DocentesController');

Route::resource('/Planta','PlantaController');

Route::resource('/orden','OrdenMeritoController');

Route::get('/usuarios/{id}/show', 'UsuariosController@destroy')->name('Usuarios.destroy');

Route::get('/Docentes/{id}/show', 'DocentesController@destroy')->name('Docentes.destroy');

Route::get('/Planta/{id}', 'plantaController@show')->name('planta.show');

Route::post('/Planta/{id}', 'plantaController@store')->name('planta.store');

Route::get('/Planta/{id}/destroy', 'plantaController@destroy')->name('Planta.destroy');

Route::get('/escuelas/{id}/destroy', 'EscuelaController@destroy')->name('escuelas.destroy');

Route::get('/Planta/{id}/select', 'plantaController@select')->name('planta.select');

Route::get('/Planta/create/{iddocente}/{idescuela}', 'plantaController@create')->name('planta.create');

Route::get('/escuelas', 'EscuelaController@store')->name('escuelas.store');

Route::get('/escuelas', 'EscuelaController@index')->name('escuelas.index');

Route::get('/orden', 'OrdenMeritoController@index')->name('orden.index');

Route::post('/orden/show', 'OrdenMeritoController@store')->name('orden.store');

Route::patch('/orden/{id}', 'OrdenMeritoController@update')->name('orden.update');

Route::post('/orden/{id}/edit', 'OrdenMeritoController@edit')->name('orden.edit');

Route::delete('/orden', 'OrdenMeritoController@delete')->name('orden.delete');

Route::get('/escuelas/create', 'EscuelaController@create')->name('escuelas.create');

Route::get('/escuelas/{id}/edit', 'EscuelaController@edit')->name('escuelas.edit');

Route::get('/escuelas/{id}/show', 'EscuelaController@show')->name('escuelas.show');

Route::get('/escuelas/{id}', 'EscuelaController@update')->name('escuelas.update');
