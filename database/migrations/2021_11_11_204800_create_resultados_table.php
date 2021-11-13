<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluacion_id');
            $table->unsignedBigInteger('factor_id');
            $table->string('nivel');
            $table->string('resultado');
            $table->integer('valor_minimo')->dfault(0);
            $table->integer('valor_maximo')->dfault(0);
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
        Schema::dropIfExists('resultados');
    }
}
