<?php

namespace App\Imports;

use App\OrdenDeMerito;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class OrdenImport implements ToModel, WithHeadingRow, WithValidation
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OrdenDeMerito([
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
        ]);
    }

    public function rules():array
    {
        return [
            'titulo' => 'max:100',
            'localidad' => 'max:50',
            'nombre' => 'max:50',
            'apellido' => 'max:50',
            'categoriatitulo' => 'in:Docente,No Docente',
            'nivel' => 'between:1,7',
            'sexo' => 'in:masculino,femenino',
            'incumbencia' => 'in:A1,A2,A3,B1,B2,B3,B4,B5,C1,C2,C3'
        ];
    }
}
