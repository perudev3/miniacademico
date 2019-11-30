<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumno';

    protected $fillable = ['alumno_nombres','alumno_apellidos','alumno_CI','alumno_CU', 'alumno_telefono', 'alumno_celular', 'alumno_email', 'alumno_domicilio', 'alumno_foto', 'alumno_estudio_universitario', 'alumno_tecnico', 'alumno_licenciatura', 'alumno_posgrado', 'alumno_carrera', 'alumno_curso', 'alumno_titulo_obtenido1', 'alumno_titulo_obtenido2', 'alumno_titulo_obtenido3','idrol'];

    protected $primaryKey = 'idAlumno';

    protected $hidden = ['remember_token'];
}
