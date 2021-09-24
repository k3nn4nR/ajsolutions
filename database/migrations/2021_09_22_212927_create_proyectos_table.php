<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_09_23_074052_create_factores_table.php
class CreateFactoresTable extends Migration
=======
class CreateProyectosTable extends Migration
>>>>>>> master:database/migrations/2021_09_22_212927_create_proyectos_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_09_23_074052_create_factores_table.php
        Schema::create('factores', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
=======
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('Descripción');
            $table->string('Estado');
            $table->date('started_at');
            $table->date('ended_at');
>>>>>>> master:database/migrations/2021_09_22_212927_create_proyectos_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2021_09_23_074052_create_factores_table.php
        Schema::dropIfExists('factores');
=======
        Schema::dropIfExists('proyectos');
>>>>>>> master:database/migrations/2021_09_22_212927_create_proyectos_table.php
    }
}
