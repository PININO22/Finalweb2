<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Docente;
use App\Localidad;
use App\Provincia;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::paginate(10);
        return View('Docentes.index')->with('docentes',$docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [            
            "localidad" => Localidad::orderBy('Nombre','asc')->get(),            
            "provincia" => Provincia::all(),            
            "validator"=>""
        ];


        return View('Docentes.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'Nombre'=> 'required|max:100',
            'Apellido'=> 'required|max:100',
            'CUIL'=>'required|max:100|unique:docentes',
            'Localidad'=>'required',
            'Provincia'=>'required',
            'Titulo'=>'required|max:100',            
        );
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails())
        {
            $data = [                
                "localidad" => Localidad::orderBy('Nombre','asc')->get(),                
                "provincia" => Provincia::all(),                
                "validator"=>$validator->messages()
            ];
            return View('Docentes.create')->with('data',$data)->withErrors($validator);
        }
        else{   
            $esc = new Docente;
            $esc->Nombre = Input::get('Nombre');
            $esc->Apellido= Input::get('Apellido');
            $esc->sexo= Input::get('sexo');
            $esc->Titulo= Input::get('Titulo');
            $esc->CUIL= Input::get('CUIL');
            $esc->CategoriaTitulo= Input::get('CategoriaTitulo');
            $esc->id_localidad= Input::get('Localidad');              

            $esc->save();            
            
            return view('Docentes.index')->with('docentes',Docente::paginate(10));
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
        $docente = Docente::find($id);
        $data = [
            "docente"=>$docente,           
            "localidad" => Localidad::orderBy('Nombre','asc')->get(),            
            "provincia" => Provincia::all(),            
            "validator"=>""
        ];

        return view('Docentes.edit')->with('data',$data); 
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
            'Apellido'=> 'required|max:100',
            'Titulo'=>'required|max:100',
            'Localidad'=>'required',
            'Provincia'=>'required',
        );
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails()){
            $docente = Docente::find($id);
            $data = [
                "docente"=>$docente,
                "localidad" => Localidad::orderBy('Nombre','asc')->get(),
                "provincia" => Provincia::all(),
                "validator"=>$validator->messages()
            ];
    
            return view('Docentes.edit')->with('data',$data)->withErrors($validator);
        }
        else{   
            $esc = Docente::find($id);
            $esc->Nombre = Input::get('Nombre');
            $esc->Apellido= Input::get('Apellido');
            $esc->sexo= Input::get('sexo');
            $esc->Titulo= Input::get('Titulo');
            $esc->CategoriaTitulo= Input::get('CategoriaTitulo');
            $esc->id_localidad= Input::get('Localidad');              

            $esc->save();

            
            $docentes = Docente::paginate(10);
            return View('Docentes.index')->with('docentes',$docentes);
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
        $esc=Docente::find($id);
        $esc->delete();      

        $docentes = Docente::paginate(10);
        return view('Docentes.index')->with('docentes',$docentes);
    }
}
