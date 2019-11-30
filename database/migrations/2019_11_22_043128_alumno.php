<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('idAlumno');
            $table->string('alumno_nombres');
            $table->string('alumno_apellidos');
            $table->string('alumno_CI');
            $table->string('alumno_CU');
            $table->integer('alumno_telefono');
            $table->integer('alumno_celular');
            $table->string('alumno_email');
            $table->string('alumno_domicilio');
            $table->string('alumno_foto');
            $table->integer('alumno_estudio_universitario');
            $table->integer('alumno_tecnico');
            $table->integer('alumno_licenciatura');
            $table->integer('alumno_posgrado');
            $table->string('alumno_carrera');
            $table->string('alumno_curso');
            $table->string('alumno_titulo_obtenido1');
            $table->string('alumno_titulo_obtenido2');
            $table->string('alumno_titulo_obtenido3');
            $table->integer('idrol');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alumno');
    }
}
