<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Curso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('idCurso');
            $table->string('idDocente');
            $table->string('curso_nombre');
            $table->string('curso_especialidad');
            $table->string('curso_duracion');
            $table->string('curso_modalidad');
            $table->string('curso_horario');
            $table->string('curso_inicio_clases');
            $table->double('curso_costo');
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
        Schema::drop('curso');
    }
}
