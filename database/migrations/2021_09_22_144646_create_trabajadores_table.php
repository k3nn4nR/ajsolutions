<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            
            $table->string('dni')->primay();
            $table->unsignedBigInteger('user_id');
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('celular');
            $table->string('estado');
            $table->timestamps();
            $table->softdeletes();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
}
