<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('factor_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
            $table->foreign('factor_id')->references('id')->on('factores')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
