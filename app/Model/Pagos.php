<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table='pagos';

    protected $fillable = ['numero_vaucher','fecha','idCurso','idAlumno','pago_parcial','pago_costo','pago_total'];

    protected $primaryKey = 'idPagos';

    protected $hidden = ['remember_token'];
}
