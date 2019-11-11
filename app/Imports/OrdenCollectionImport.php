<?php

namespace App\Imports;

use App\OrdenDeMerito;
use App\OrdenFails;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection, WithHeadingRow, WithValidation};
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class OrdenCollectionImport implements ToCollection, WithHeadingRow
{    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        
        $rules=[
            'titulo' => 'max:100',
            'localidad' => 'max:50',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'categoria_titulo' => Rule::in(['Docente','No Docente']),
            'nivel' => Rule::in(['Inicial','Primario','Secundario']),
            'sexo' => Rule::in(['Masculino','Femenino']),
            'incumbencia' => Rule::in(['A1','A2','A3','B1','B2','B3','B4','C1','C2','C3']),            
            'cuilyear'=>'unique:ordenmeritos'
        ];
        $erroneos=[];
        foreach ($collection as $row) 
        {
            $fila= [
                'año' => $row['ano'],
                'CUIL' => $row['cuil'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'sexo' => $row['sexo'],
                'nivel' => $row['nivel'],
                'cargo' => $row['cargo'],
                'localidad' => $row['localidad'],
                'incumbencia' => $row['incumbencia'],
                'titulo' => $row['titulo'],
                'categoriatitulo' => $row['categoria_titulo'],
                'cuilyear'=>$row['cuil'].$row['ano']
            ];
            

            $valida=Validator::make($fila,$rules);

            if($valida->fails()){
                $errors=[];
                foreach($valida->messages()->all() as $error){
                    array_push($errors,$error);
                }
                $res=OrdenFails::where('cuilyear',$row['cuil'].$row['ano'])->first();
                if(!empty($res)){
                    
                    $res->nombre =$row['nombre'];
                    $res->apellido =$row['apellido'];
                    $res->sexo =$row['sexo'];
                    $res->nivel =$row['nivel'];
                    $res->cargo =$row['cargo'];
                    $res->localidad =$row['localidad'];
                    $res->incumbencia =$row['incumbencia'];
                    $res->titulo =$row['titulo'];
                    $res->categoriatitulo =$row['categoria_titulo'];
                    $res->errors =implode(' | ',$errors);
                    if(!empty($res->id)){
                        $res->save();
                    }
                    
                }  
                else{
                    OrdenFails::Create([
                        'año' => (integer)$row['ano'],
                        'CUIL' => $row['cuil'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'sexo' => $row['sexo'],
                        'nivel' => $row['nivel'],
                        'cargo' => $row['cargo'],
                        'localidad' => $row['localidad'],
                        'incumbencia' => $row['incumbencia'],
                        'titulo' => $row['titulo'],
                        'categoriatitulo' => $row['categoria_titulo'],
                        'cuilyear'=>$row['cuil'].$row['ano'],
                        'errors'=>implode(' | ',$errors)
                    ]);
                }              
                
            }
            else{
                OrdenDeMerito::Create([
                    'año' => (integer)$row['ano'],
                    'CUIL' => $row['cuil'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'sexo' => $row['sexo'],
                    'nivel' => $row['nivel'],
                    'cargo' => $row['cargo'],
                    'localidad' => $row['localidad'],
                    'incumbencia' => $row['incumbencia'],
                    'titulo' => $row['titulo'],
                    'categoriatitulo' => $row['categoria_titulo'],
                    'cuilyear'=>$row['cuil'].$row['ano']
                ]);

            }            
        }
        return $erroneos;
    }

    
}
