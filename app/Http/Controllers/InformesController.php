<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Escuela;
use App\OrdenDeMerito;
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


class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $escuelasPorProvincia= Escuela::selectRaw('provincias.Nombre as Provincia,sectores.nombre as Sector,tipoescuela.nombreTipo as TipoEscuela,niveles.Nombre as Nivel,count(*) as Cantidad')
                                    ->join('localidades','escuelas.id_localidad','=', 'localidades.id')
                                    ->join('provincias','provincias.id','=','localidades.id_provincia')
                                    ->join('sectores','sectores.id','=','escuelas.id_sector')
                                    ->join('tipoescuela','tipoescuela.id','=','escuelas.id_sector')
                                    ->join('niveles','niveles.id','=','escuelas.id_nivel')
                                    ->groupBy('provincias.Nombre','sectores.nombre','tipoescuela.nombreTipo','niveles.Nombre')                                    
                                    ->get();
        
        $cantInscriptos=OrdenDeMerito::groupBy('cuil')->count();

        $a =OrdenDeMerito::count();
        $inscripcionesCargosLocalidadCuil=OrdenDeMerito::selectRaw('localidad,cargo,cuil,count(*)/'.$a.'*100 as Promedio')
                                                    ->whereNotNull('cargo')
                                                    ->groupBy('cargo','localidad','cuil')
                                                    ->get();

        $inscripcionesLocalidad=OrdenDeMerito::selectRaw('localidad,count(*) as Cantidad')
                                            ->groupBy('localidad')
                                            ->get();

        $inscripcionesSinCargo=OrdenDeMerito::selectRaw('localidad,count(*) as PersonasSinCargo')
                                            ->whereNull('cargo')
                                            ->groupBy('localidad')
                                            ->get();


        $DocentesEnMerito=PlantaDocente::selectRaw('docentes.cuil as CUIL,docentes.Nombre as Nombre,docentes.Apellido as Apellido')
                                            ->join('docentes','docentes.id','=','plantadocente.id_docente')
                                            ->join('ordenmeritos','ordenmeritos.cuil','=','docentes.cuil')
                                            ->groupBy('docentes.cuil','docentes.Nombre','docentes.Apellido')
                                            ->get();


        $DocentesPorCargo=PlantaDocente::selectRaw('Materia,count(*) as Cantidad')
                                            ->groupBy('Materia')
                                            ->get();

        $DocentesPorEscuela=PlantaDocente::selectRaw('escuelas.Nombre,count(*) as Cantidad')
                                            ->join('escuelas','escuelas.id','=','plantadocente.id_escuela')
                                            ->groupBy('escuelas.Nombre')
                                            ->get();
        
        $data=[
            'escuelasPorProvincia'=>$escuelasPorProvincia,
            'cantInscriptos'=>$cantInscriptos,
            'inscripcionesCargosLocalidadCuil'=>$inscripcionesCargosLocalidadCuil,
            'inscripcionesLocalidad'=>$inscripcionesLocalidad,
            'inscripcionesSinCargo'=>$inscripcionesSinCargo,
            'DocentesEnMerito'=>$DocentesEnMerito,
            'DocentesPorCargo'=>$DocentesPorCargo,
            'DocentesPorEscuela'=>$DocentesPorEscuela
        ];

        return View('informes.index')->with('data',$data);
    }
}
