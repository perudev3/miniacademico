<?php

namespace App\Http\Controllers;
use App\Model\Cursos;
use App\Model\Docente;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function GetDataCurso(){    	
        return \DB::table('curso')->join('docente','curso.idDocente','=','docente.idDocente')->select('curso.*', 'docente.*')->get();  
    }

    public function GetDataDocente(){
        return Docente::all();
    }

    public function PostCurso(Request $requests){
    	$postuser=Cursos::create([
            'curso_especialidad'=>$requests['curso_especialidad'],
            'curso_duracion'=>$requests['curso_duracion'],
            'curso_modalidad'=>$requests['curso_modalidad'],
            'curso_horario'=>$requests['curso_horario'],
            'curso_inicio_clases'=>$requests['curso_inicio_clases'],
        ]);

        if ($postuser==true) {
        	return [ "status" => "success", "message" => "Curso Registrado"];
        }else{
        	return [ "status" => "error", "message" => "Error al Registrar"];
        }
    }

    public function DeleteCurso($id){
        $curso=Cursos::where('idCurso', $id)->first();
        $curso->delete();
        return [ "status" => "success", "message" => "Curso Eliminado"];

    }

    public function UpdateCurso(Request $requests){
        $curso=Cursos::where('idCurso', $requests['id'])->first();
        $curso->fill([
            'curso_especialidad'=>$requests['curso_especialidad'],
            'curso_duracion'=>$requests['curso_duracion'],
            'curso_modalidad'=>$requests['curso_modalidad'],
            'curso_horario'=>$requests['curso_horario'],
            'curso_inicio_clases'=>$requests['curso_inicio_clases'],
                 ]);
        $curso->save();
        return [ "status" => "success", "message" => "Curso Actualizado"];
    }
}
