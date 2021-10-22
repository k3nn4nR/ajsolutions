<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluaciones_cabeceras_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->string('puntaje')->nullable();
            $table->timestamps();
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
            $table->foreign('evaluaciones_cabeceras_id')->references('id')->on('evaluaciones_cabeceras')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones_detalles');
    }
}
