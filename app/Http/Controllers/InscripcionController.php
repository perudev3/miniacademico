<?php

namespace App\Http\Controllers;
use App\Model\Inscripcion;
use App\Model\Cursos;
use App\Model\Alumno;
use App\Model\Docente;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function GetDataInscripcion(){
    	$query=\DB::table('inscripcion')->join('alumno','inscripcion.idAlumno','=','alumno.idAlumno')->join('curso','inscripcion.idCurso','=','curso.idCurso')->select('alumno.*','curso.*', 'inscripcion.*')->get();    	
         
        if ($query==true) {
            return $query;
        }
    }

    public function PostInscripcion(Request $requests){
    	$postuser=Inscripcion::create([
            'inscripcion_fecha'=>$requests['inscripcion_fecha'],
            'idCurso'=>$requests['idCurso'],
            'idAlumno'=>$requests['idAlumno'],
            'inscripcion_precio'=>$requests['inscripcion_precio'],
        ]);

        if ($postuser==true) {
        	return [ "status" => "success", "message" => "Inscripcion Registrado"];
        }else{
        	return [ "status" => "error", "message" => "Error al Registrar"];
        }
    }

    public function DeleteInscripcion($id){
        $inscripcion=Inscripcion::where('idInscripcion', $id)->first();
        $inscripcion->delete();
        return [ "status" => "success", "message" => "Inscripcion Eliminado"];

    }

    public function UpdateInscripcion(Request $requests){
        $inscripcion=Inscripcion::where('idInscripcion', $requests['id'])->first();
        $inscripcion->fill([
            'inscripcion_fecha'=>$requests['inscripcion_fecha'],
            'idCurso'=>$requests['idCurso'],
            'idAlumno'=>$requests['idAlumno'],
            'inscripcion_precio'=>$requests['inscripcion_precio'],
                 ]);
        $inscripcion->save();
        return [ "status" => "success", "message" => "Inscripcion Actualizado"];
    }


    public function Alumnos(){
    	return Alumno::all();
    }


    public function Docentes(){
    	return Cursos::all();
    }
}
