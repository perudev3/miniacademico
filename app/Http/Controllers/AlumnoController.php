<?php

namespace App\Http\Controllers;
use App\Model\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function GetDataAlumno(){
    	return Alumno::all();
    }

    public function PostAlumno(Request $requests){
    	$dir = "C:/xampp/htdocs/MiniAcademico/public/avatar/";
        $uuid = uniqid(); // uuid
        $name = $_FILES["alumno_foto"]["name"]; // nombre real
        $temp = $_FILES["alumno_foto"]["tmp_name"]; // nombre temporal
        $ext = pathinfo($name, PATHINFO_EXTENSION); // extensión
        $path = $dir.$uuid.".".$ext; // ruta completa para guardar en el modelo

        if ($requests['alumno_estudio_universitario']==true) {
        	$postalumno=Alumno::create([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>1,
	            'alumno_tecnico'=>0,
	            'alumno_licenciatura'=>0,
	            'alumno_posgrado'=>0,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	            'idrol'=>2,
	        ]);
        }elseif ($requests['alumno_tecnico']==true) {
        	$postalumno=Alumno::create([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>0,
	            'alumno_tecnico'=>1,
	            'alumno_licenciatura'=>0,
	            'alumno_posgrado'=>0,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	            'idrol'=>2,
	        ]);
        }elseif ($requests['alumno_licenciatura']==true) {
        	$postalumno=Alumno::create([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>0,
	            'alumno_tecnico'=>0,
	            'alumno_licenciatura'=>1,
	            'alumno_posgrado'=>0,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	            'idrol'=>2,
	        ]);
        }elseif ($requests['alumno_posgrado']==true) {
        	$postalumno=Alumno::create([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>0,
	            'alumno_tecnico'=>0,
	            'alumno_licenciatura'=>0,
	            'alumno_posgrado'=>1,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	            'idrol'=>2,
	        ]);
        }
    	

        move_uploaded_file($temp, $path);

        if ($postalumno==true) {
        	return [ "status" => "success", "message" => "Alumno Registrado"];
        }else{
        	return [ "status" => "error", "message" => "Error al Registrar"];
        }
    }

    public function DeleteAlumno($id){
        $alumno=Alumno::where('idCurso', $id)->first();
        $alumno->delete();
        return [ "status" => "success", "message" => "Alumno Eliminado"];

    }

    public function UpdateAlumno(Request $requests){
        $alumno=Alumno::where('idCurso', $requests['id'])->first();
        if ($requests['alumno_estudio_universitario']==true) {
        	$alumno->fill([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>1,
	            'alumno_tecnico'=>0,
	            'alumno_licenciatura'=>0,
	            'alumno_posgrado'=>0,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	        ]);
	        $alumno->save();
        }elseif ($requests['alumno_tecnico']==true) {
        	$alumno->fill([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>0,
	            'alumno_tecnico'=>1,
	            'alumno_licenciatura'=>0,
	            'alumno_posgrado'=>0,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	        ]);
	        $alumno->save();
        }elseif ($requests['alumno_licenciatura']==true) {
        	$alumno->fill([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>0,
	            'alumno_tecnico'=>0,
	            'alumno_licenciatura'=>1,
	            'alumno_posgrado'=>0,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	        ]);
	        $alumno->save();
        }elseif ($requests['alumno_posgrado']==true) {
        	$alumno->fill([
	            'alumno_nombres'=>$requests['alumno_nombres'],
	            'alumno_apellidos'=>$requests['alumno_apellidos'],
	            'alumno_CI'=>$requests['alumno_CI'],
	            'alumno_CU'=>$requests['alumno_CU'],
	            'alumno_telefono'=>$requests['alumno_telefono'],
	            'alumno_celular'=>$requests['alumno_celular'],
	            'alumno_email'=>$requests['alumno_email'],
	            'alumno_domicilio'=>$requests['alumno_domicilio'],
	            'alumno_foto'=>$uuid.".".$ext,
	            'alumno_estudio_universitario'=>0,
	            'alumno_tecnico'=>0,
	            'alumno_licenciatura'=>0,
	            'alumno_posgrado'=>1,
	            'alumno_carrera'=>$requests['alumno_carrera'],
	            'alumno_curso'=>$requests['alumno_curso'],
	            'alumno_titulo_obtenido1'=>$requests['alumno_titulo_obtenido1'],
	            'alumno_titulo_obtenido2'=>$requests['alumno_titulo_obtenido2'],
	            'alumno_titulo_obtenido3'=>$requests['alumno_titulo_obtenido3'],
	        ]);
	        $alumno->save();
        }
        if ($postalumno==true) {
        	return [ "status" => "success", "message" => "Alumno Registrado"];
        }else{
        	return [ "status" => "error", "message" => "Error al Registrar"];
        }
    }
}
