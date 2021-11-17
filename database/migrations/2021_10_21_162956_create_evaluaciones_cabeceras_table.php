<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesCabecerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_cabeceras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluacion_id');
            $table->string('trabajador_dni');
            $table->string('estado');
            $table->date('fecha');
            $table->time('hora', 0);
            $table->softdeletes();
            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
            $table->foreign('trabajador_dni')->references('dni')->on('trabajadores')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones_cabeceras');
    }
}
