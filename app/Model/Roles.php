<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table='roles';

    protected $fillable = ['rol_nombre'];

    protected $primaryKey = 'idrol';

    protected $hidden = ['remember_token'];
}
