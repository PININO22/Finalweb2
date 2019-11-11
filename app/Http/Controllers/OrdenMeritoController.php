<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\OrdenCollectionImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\OrdenDeMerito;
use App\OrdenFails;

class OrdenMeritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = OrdenDeMerito::all();

        return view('orden.index')->with('data',$ordenes);
    }

    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Importar archivo
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        
        
        
    }
    

    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected $ext;

    public function store(Request $request)
    {
        $file = $request->file('file');
 
       //obtenemos el nombre del archivo
       $ext = $file->getClientOriginalExtension();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('ordendemerito.'.$ext,  \File::get($file)); 
       
       Excel::import(new OrdenCollectionImport, 'ordendemerito.xlsx');

       $data=[
            'ordenes'=>OrdenDeMerito::all(),
            'erroneos'=>OrdenFails::all(),
       ]; 

       return view('orden.show')->with('data',$data);
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
    public function edit($data)
    {
        $data=[
            'validator'=>"",
            'errors'=>OrdenFails::where('año','!=',0)->get()
        ];
        return view('orden.edit')->with('data',$data);
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
        
        foreach(OrdenFails::where('año','!=',0)->get() as $error){

            $rules=[
                'titulo' => 'max:100',
                'localidad' => 'max:50',
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',                        
                'cuilyear'=>'unique:ordenmeritos'
            ];
            $fila= [
                'año' => $request['año'.$error->CUIL],
                'CUIL' => $request['cuil'.$error->CUIL],
                'nombre' => $request['nombre'.$error->CUIL],
                'apellido' => $request['apellido'.$error->CUIL],
                'sexo' => $request['sexo'.$error->CUIL],
                'nivel' => $request['nivel'.$error->CUIL],
                'cargo' => $request['cargo'.$error->CUIL],
                'localidad' => $request['localidad'.$error->CUIL],
                'incumbencia' => $request['incumbencia'.$error->CUIL],
                'titulo' => $request['titulo'.$error->CUIL],
                'categoriatitulo' => $request['categoriatitulo'.$error->CUIL],
                'cuilyear'=>$request['cuil'.$error->CUIL].$request['año'.$error->CUIL]
            ];

            $valida=Validator::make($fila,$rules);

            if($valida->fails()){
                $data=[
                    'validator'=>$valida->messages(),
                    'errors'=>OrdenFails::where('año','!=',0)->get()
                ];
                return view('orden.edit')->with('data',$data);

            }
            else{
                OrdenDeMerito::Create([
                    'año' => $fila['año'],
                    'CUIL' => $fila['CUIL'],
                    'nombre' => $fila['nombre'],
                    'apellido' => $fila['apellido'],
                    'sexo' => $fila['sexo'],
                    'nivel' => $fila['nivel'],
                    'cargo' => $fila['cargo'],
                    'localidad' => $fila['localidad'],
                    'incumbencia' => $fila['incumbencia'],
                    'titulo' => $fila['titulo'],
                    'categoriatitulo' => $fila['categoriatitulo'],
                    'cuilyear'=>$fila['cuilyear']
                ]);

                
            }
        }
        $this->delete();
        $ordenes = OrdenDeMerito::all();

            
        return view('orden.index')->with('data',$ordenes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        
        OrdenFails::where('CUIL','!=','0')->delete();

        $ordenes = OrdenDeMerito::all();

            
        return view('orden.index')->with('data',$ordenes);
    }
}
