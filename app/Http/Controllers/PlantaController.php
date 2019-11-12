<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use App\Escuela;
use App\PlantaDocente;
use App\Docente;


class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($iddocente,$idescuela)    
    {
        $escuela=Escuela::find($idescuela);
        $docente=Docente::find($iddocente);
        $data=[
            "escuela"=>$escuela,
            "docente"=>$docente,
            "valdiator"=>""
        ];

        return View('planta.create')->with('data',$data);
    }
    /**
     * Seleccionar nuevo docente.
     *
     * @return \Illuminate\Http\Response
     */
    public function select($id)
    {
        $data=[
            'escuela'=>Escuela::find($id),
            'docente'=>Docente::paginate(10)
        ];
        return View('planta.select')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $request['clave']= strtoupper($request['Materia']).$request['Curso'].$request['Division'].$request['SituacionRevista'].$request['idEscuela'];
        $rules = [
            'Materia'=>'required|max:50',
            'clave'=> 'unique:plantadocente'
        ];
        $validator = Validator::make(Input::all(),$rules);

        if($validator->fails()){
            $escuela=Escuela::find(Input::get('idEscuela'));
            $docente=Docente::find(Input::get('idDocente'));
            $data=[
                "escuela"=>$escuela,
                "docente"=>$docente,
                "validator"=>$validator->messages()
            ];
    
            return view('planta.create')->with('data',$data);
        }
        else{ 
            $planta = new PlantaDocente;
            $planta->Curso = Input::get('Curso');
            $planta->Horas= Input::get('Horas');
            $planta->Division= Input::get('Division');
            $planta->Materia= strtoupper(Input::get('Materia'));
            $planta->SituacionRevista= Input::get('SituacionRevista');
            $planta->id_escuela= Input::get('idEscuela');            
            $planta->id_docente= Input::get('idDocente');            
            $planta->clave=$request['clave'];         

            $planta->save();            
            
            $escuela = Escuela::find($planta->id_escuela);
            $planta = PlantaDocente::where('id_escuela',$planta->id_escuela)->paginate(10);
            
            $data = [
                "escuela"=>$escuela,
                "planta"=>$planta,
                "validator"=>""
            ];

            

            return view('planta.show')->with('data',$data);
        
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
        $escuela = Escuela::find($id);
        $planta = PlantaDocente::where('id_escuela',$id)->simplePaginate(10);
        $data = [
            "escuela"=>$escuela,
            "planta"=>$planta,
            "validator"=>""
        ];
        

        return view('planta.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $pl=PlantaDocente::find($id);
             

        $escuela = Escuela::find($pl->id_escuela);
        
        $planta = PlantaDocente::where('id_escuela',$pl->id_escuela)->paginate(10);
        $data = [
            "escuela"=>$escuela,
            "planta"=>$planta,
            "validator"=>""
        ];
        $pl->delete(); 
        return redirect()->route('planta.show',$escuela->id)->with('data',$data);
    }
}
