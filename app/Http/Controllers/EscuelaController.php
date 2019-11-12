<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Escuela;
use App\Ambito;
use App\Categoria;
use App\Localidad;
use App\Nivel;
use App\Provincia;
use App\Sector;
use App\TipoEscuela;
use App\TipoJornada;
use App\TipoSecundaria;
use App\User;
use App\PlantaDocente;


class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuelas = Escuela::all();
        return View('escuelas.index')->with('escuelas',$escuelas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "ambito" => Ambito::all(),
            "categoria" => Categoria::all(),
            "localidad" => Localidad::orderBy('Nombre','asc')->get(),
            "nivel" => Nivel::all(),
            "provincia" => Provincia::all(),
            "sector" => Sector::all(),
            "tipoEscuela" => TipoEscuela::all(),
            "tipoJornada" => TipoJornada::all(),
            "tipoSecundaria" => TipoSecundaria::all(),
            "user" => User::where('rol','encargado')->where(function ($query){
                $query->where('id_escuela',0)
                    ->orWhereNull('id_escuela');
            })->get(),
            "validator"=>""
        ];


        return View('escuelas.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $nivelcue=$request['Nivel'].$request['CUE'];
        
        $rules = array(
            'Nombre'=> 'required|max:100',
            'Usuario'=> 'required',
            'Email'=>'email|max:100',
            'Orientacion'=>'required|max:50',
            'Telefono'=>'max:15',
            'TipoSecundaria' => Rule::requiredIf($request['Nivel']==3),
            'CUE'=>'required|max:11',            
            'Direccion'=>'required|max:100',
            'Localidad'=>'required',
            'Provincia'=>'required',
            $nivelcue =>'unique:escuelas,NivelCUE,id'
        ); 
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails())
        {
            $data = [
                "ambito" => Ambito::all(),
                "categoria" => Categoria::all(),
                "localidad" => Localidad::orderBy('Nombre','asc')->get(),
                "nivel" => Nivel::all(),
                "provincia" => Provincia::all(),
                "sector" => Sector::all(),
                "tipoEscuela" => TipoEscuela::all(),
                "tipoJornada" => TipoJornada::all(),
                "tipoSecundaria" => TipoSecundaria::all(),
                "user" => User::where('rol','encargado')->where(function ($query){
                    $query->where('id_escuela',0)
                        ->orWhereNull('id_escuela');
                    })->get(),
                "validator"=>$validator->messages()
            ];
            return View('escuelas.create')->with('data',$data)->withErrors($validator);
        }
        else{   
            $esc = new Escuela;
            $esc->Nombre = Input::get('Nombre');
            $esc->Orientacion= Input::get('Orientacion');
            $esc->Telefono= Input::get('Telefono');
            $esc->TelefonoInterno= Input::get('TelefonoInterno');
            $esc->Email= Input::get('Email');
            $esc->EsBilingue= Input::get('esBilingue');
            $esc->CantidadAlumnos= Input::get('CantidadAlumnos');
            $esc->CUE= Input::get('CUE');
            $esc->Direccion= Input::get('Direccion');
            $esc->id_categoria=Input::get('Categoria');
            $esc->id_ambito= Input::get('Ambito');
            $esc->id_localidad= Input::get('Localidad');
            $esc->id_sector= Input::get('Sector');
            $esc->id_tipoJornada= Input::get('TipoJornada');
            $esc->id_tipoSecundaria= Input::get('TipoSecundaria');
            $esc->id_nivel= Input::get('Nivel');
            $esc->id_tipoEscuela= Input::get('TipoEscuela');
            $esc->NivelCUE=Input::get('Nivel').Input::get('CUE');       

            $esc->save();
            
            $user = User::find(Input::get('Usuario'));
            $user->id_escuela=$esc->id;
            $user->save();
            

            
            return view('escuelas.index')->with('escuelas',Escuela::all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escuela = Escuela::where('id_usuario',$id)->first(); 
        
        if(!empty($escuela)){
            return view('escuelas.show')->with('escuela',$escuela);
        }
        else{
            $escuelas = Escuela::all();
            return View('escuelas.index')->with('escuelas',$escuelas);
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $escuela = Escuela::find($id);
        $data = [
            "escuela"=>$escuela,
            "ambito" => Ambito::all(),
            "categoria" => Categoria::all(),
            "localidad" => Localidad::orderBy('Nombre','asc')->get(),
            "nivel" => Nivel::all(),
            "provincia" => Provincia::all(),
            "sector" => Sector::all(),
            "tipoEscuela" => TipoEscuela::all(),
            "tipoJornada" => TipoJornada::all(),
            "tipoSecundaria" => TipoSecundaria::all(),
            "validator"=>""
        ];

        return view('escuelas.edit')->with('data',$data);
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
            'Email'=>'required|email|max:100',
            'Orientacion'=>'required|max:50',
            'Telefono'=>'required|max:50',
            'CUE'=>'required|max:11',
            'Localidad'=>'required',
            'Provincia'=>'required',
            'Direccion'=>'required|max:100'
        );
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails()){
            $escuela = Escuela::find($id);
            $data = [
                "escuela"=>$escuela,
                "ambito" => Ambito::all(),
                "categoria" => Categoria::all(),
                "localidad" => Localidad::orderBy('Nombre','asc')->get(),
                "nivel" => Nivel::all(),
                "provincia" => Provincia::all(),
                "sector" => Sector::all(),
                "tipoEscuela" => TipoEscuela::all(),
                "tipoJornada" => TipoJornada::all(),
                "tipoSecundaria" => TipoSecundaria::all(),
                "validator"=>$validator->messages()
            ];
    
            return view('escuelas.edit')->with('data',$data)->withErrors($validator);
        }
        else{   
            $esc = Escuela::find($id);
            $esc->Nombre = Input::get('Nombre');
            $esc->Orientacion= Input::get('Orientacion');
            $esc->Telefono= Input::get('Telefono');
            $esc->TelefonoInterno= Input::get('TelefonoInterno');
            $esc->Email= Input::get('Email');
            $esc->EsBilingue= Input::get('EsBilingue');
            $esc->CantidadAlumnos= Input::get('CantidadAlumnos');
            $esc->CUE= Input::get('CUE');
            $esc->Direccion= Input::get('Direccion');
            $esc->id_categoria=Input::get('Categoria');
            $esc->id_ambito= Input::get('Ambito');
            $esc->id_localidad= Input::get('Localidad');
            $esc->id_sector= Input::get('Sector');
            $esc->id_tipoJornada= Input::get('TipoJornada');
            $esc->id_tipoSecundaria= Input::get('TipoSecundaria');
            $esc->id_nivel= Input::get('Nivel');
            $esc->id_tipoEscuela= Input::get('TipoEscuela');
            $esc->NivelCUE=Input::get('Nivel').Input::get('CUE');  

            $esc->save();

            
            $escuelas = Escuela::all();
            return View('escuelas.index')->with('escuelas',$escuelas);
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
        $planta = PlantaDocente::where('id_escuela',$id)->delete();
        $esc=Escuela::find($id);
        $esc->delete();
        $user=User::where('id_escuela',$id)->first();
        $user->id_escuela=0;
        $user->save();        

        $escuelas = Escuela::all();
        return view('escuelas.index')->with('escuelas',$escuelas);
    }
}
