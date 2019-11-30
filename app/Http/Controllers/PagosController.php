<?php

namespace App\Http\Controllers;
use App\Model\Alumno;
use App\Model\Cursos;
use App\Model\Pagos;
use App\Model\Roles;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function GetDataAlumnos(){
    	return Alumno::all();
    }

    public function GetDataCursos(){
    	return Cursos::all();
    }

    public function GetDataPagos(){
    	return \DB::table('pagos')->join('curso','pagos.idCurso','=','curso.idCurso')->join('alumno','pagos.idAlumno','=','alumno.idAlumno')->select('pagos.*', 'curso.*', 'alumno.*')->get();  
    }

    public function GetDataPagosAlumno(){

        $user=\Auth::user()->idrol;

        $alumno=Alumno::where('idrol',$user)->first();
        $idalumno= $alumno->idAlumno;

        return \DB::table('pagos')->join('curso','pagos.idCurso','=','curso.idCurso')->join('alumno','pagos.idAlumno','=','alumno.idAlumno')->where('pagos.idAlumno',$idalumno)->get();  


    }

    public function PostPagos(Request $requests){
    	$pago_parcial=$requests['pago_parcial'];
    	$pago_total=$requests['pago_total'];

    	$postpagos=Pagos::create([
            'numero_vaucher'=>$requests['numero_vaucher'],
            'fecha'=>$requests['fecha'],
            'idCurso'=>$requests['idCurso'],
            'idAlumno'=>$requests['idAlumno'],
            'pago_parcial'=>$requests['pago_parcial'],
            'pago_costo'=>$requests['pago_total'],
            'pago_total'=>$pago_total - $pago_parcial,
        ]);

        if ($postpagos==true) {
        	return [ "status" => "success", "message" => "Pago Registrado"];
        }else{
        	return [ "status" => "error", "message" => "Error al Registrar"];
        }
    }


    public function DeletePagos($id){
        $pagos=Pagos::where('idPagos', $id)->first();
        $pagos->delete();
        return [ "status" => "success", "message" => "Pago Eliminado"];

    }

    public function UpdatePagos(Request $requests){
        $pagos=Pagos::where('idPagos', $requests['id'])->first();
        $pago_total=$pagos->pago_total;
        $pagos->fill([
	            'numero_vaucher'=>$requests['numero_vaucher'],
	            'fecha'=>$requests['fecha'],
	            'idCurso'=>$requests['idCurso'],
	            'idAlumno'=>$requests['idAlumno'],
	            'pago_parcial'=>$requests['pago_parcial'],
	            'pago_total'=>$pago_total - $requests['pago_parcial'],
	                 ]);
	    $pagos->save();  
        
        return [ "status" => "success", "message" => "Pago Actualizado"];
    }


    public function CostoCurso($id){
    	return Cursos::where('idCurso',$id)->get();
    }
}
