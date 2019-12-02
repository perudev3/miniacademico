<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table='curso';

    protected $fillable = ['idDocente','curso_nombre','curso_especialidad','curso_duracion','curso_modalidad','curso_horario', 'curso_inicio_clases','curso_costo'];

    protected $primaryKey = 'idCurso';

    protected $hidden = ['remember_token'];
}
