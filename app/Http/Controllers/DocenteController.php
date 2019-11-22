<?php

namespace App\Http\Controllers;
use App\Model\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function GetDataDocente(){
    	return Docente::all();
    }

    public function PostDocente(Request $requests){
    	$postuser=Docente::create([
            'docente_nombres'=>$requests['docente_nombres'],
            'docente_apellidos'=>$requests['docente_apellidos'],
            'docente_direccion'=>$requests['docente_direccion'],
            'docente_celular'=>$requests['docente_celular'],
        ]);

        if ($postuser==true) {
        	return [ "status" => "success", "message" => "Docente Registrado"];
        }else{
        	return [ "status" => "error", "message" => "Error al Registrar"];
        }
    }

    public function DeleteDocente(){

    }

    public function UpdateDocente(){

    }
}
