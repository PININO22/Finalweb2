<?php

namespace App\Http\Controllers;

use App\User;
use App\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return View('usuarios.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $escuela = Escuela::find($user->id_escuela);
        $restoescuelas = Escuela::whereNull('id_usuario')->orderBy('nombre')->get();
        
        $data=[
            'user'=>$user,
            'escuela'=>$escuela,
            'restoescuelas'=>$restoescuelas,
            'validator'=>""
        ]; 
        
        return view('Usuarios.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'Nombre'=> 'required|max:100',
            'email'=>'required|email|max:100',
            'Apellido'=>'required|max:100'
        );
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails()){
            $user = User::find($id); 
            $data=[
                'user'=>$user,
                'validator'=>$validator->messages()
            ];       
    
            return view('Usuarios.edit')->with('data',$data)->withErrors($validator);
        }
        else{   
            $esc = User::find($id);
            $esc->nombre = Input::get('Nombre');            
            $esc->apellido = Input::get('Apellido');            
            $esc->Email= Input::get('email');
            $esc->rol= Input::get('rol');           
            $esc->id_escuela= Input::get('escuela');           

            $esc->save();
            if(!empty(Input::get('escuela'))){
                $escuela = Escuela::find($esc->id_escuela);
                $escuela->id_usuario =$esc->id;

                $escuela->save();
            }
            

            
            $users = User::all();
            return View('Usuarios.index')->with('users',$users);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $esc=User::find($id);
        $esc->delete(); 

        $users = User::all();
        return view('Usuarios.index')->with('users',$users);
    }
}
