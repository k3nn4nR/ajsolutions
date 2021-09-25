<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTrabajadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_trabajador', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id');
            $table->string('trabajador_dni');
            $table->string('estado')->default('ACTIVO');
            $table->string('comentario')->nullable();
            $table->softdeletes();
            $table->primary(['proyecto_id','trabajador_dni']);
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->constrained()->constrained()->onUpdate('cascade')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('proyecto_trabajador');
    }
}
