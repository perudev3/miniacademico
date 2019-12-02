<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table='docente';

    protected $fillable = ['docente_nombres','docente_apellidos','docente_direccion','docente_celular','idrol'];

    protected $primaryKey = 'idDocente';

    protected $hidden = ['remember_token'];
}
