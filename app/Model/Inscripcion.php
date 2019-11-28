<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table='inscripcion';

    protected $fillable = ['inscripcion_fecha','idCurso','idAlumno','inscripcion_precio'];

    protected $primaryKey = 'idInscripcion';

    protected $hidden = ['remember_token'];
}
