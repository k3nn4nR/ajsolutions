<?php

use Illuminate\Database\Seeder;
use App\Resultado;

class ResultadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resultado::create(["id"=>1, "evaluacion_id" => 1, "factor_id" => 1, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 23, "valor_maximo" => 25]);
        Resultado::create(["id"=>2, "evaluacion_id" => 1, "factor_id" => 2, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 18, "valor_maximo" => 20]);
        Resultado::create(["id"=>3, "evaluacion_id" => 1, "factor_id" => 3, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 23, "valor_maximo" => 25]);
        Resultado::create(["id"=>4, "evaluacion_id" => 1, "factor_id" => 4, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 19, "valor_maximo" => 20]);
        Resultado::create(["id"=>5, "evaluacion_id" => 1, "factor_id" => 5, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 29, "valor_maximo" => 30]);
        Resultado::create(["id"=>6, "evaluacion_id" => 1, "factor_id" => 6, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 29, "valor_maximo" => 30]);
        Resultado::create(["id"=>7, "evaluacion_id" => 1, "factor_id" => 7, "nivel" => "ALTO","resultado" => "ALTA SATTISFACCION", "valor_minimo" => 29, "valor_maximo" => 30]);
        Resultado::create(["id"=>8, "evaluacion_id" => 1, "factor_id" => 1, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 20, "valor_maximo" => 22]);
        Resultado::create(["id"=>9, "evaluacion_id" => 1, "factor_id" => 2, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 15, "valor_maximo" => 17]);
        Resultado::create(["id"=>10, "evaluacion_id" => 1, "factor_id" => 3, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 20, "valor_maximo" => 22]);
        Resultado::create(["id"=>11, "evaluacion_id" => 1, "factor_id" => 4, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 17, "valor_maximo" => 18]);
        Resultado::create(["id"=>12, "evaluacion_id" => 1, "factor_id" => 5, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 26, "valor_maximo" => 28]);
        Resultado::create(["id"=>13, "evaluacion_id" => 1, "factor_id" => 6, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 26, "valor_maximo" => 28]);
        Resultado::create(["id"=>14, "evaluacion_id" => 1, "factor_id" => 7, "nivel" => "MODERADO","resultado" => "SATISFACCION ALTA MEDIA", "valor_minimo" => 25, "valor_maximo" => 28]);
        Resultado::create(["id"=>15, "evaluacion_id" => 1, "factor_id" => 1, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 15, "valor_maximo" => 19]);
        Resultado::create(["id"=>16, "evaluacion_id" => 1, "factor_id" => 2, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 9, "valor_maximo" => 14]);
        Resultado::create(["id"=>17, "evaluacion_id" => 1, "factor_id" => 3, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 15, "valor_maximo" => 19]);
        Resultado::create(["id"=>18, "evaluacion_id" => 1, "factor_id" => 4, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 12, "valor_maximo" => 16]);
        Resultado::create(["id"=>19, "evaluacion_id" => 1, "factor_id" => 5, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 19, "valor_maximo" => 25]);
        Resultado::create(["id"=>20, "evaluacion_id" => 1, "factor_id" => 6, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 19, "valor_maximo" => 25]);
        Resultado::create(["id"=>21, "evaluacion_id" => 1, "factor_id" => 7, "nivel" => "MEDIO","resultado" => "SATISFACCION MEDIA", "valor_minimo" => 19, "valor_maximo" => 24]);
        Resultado::create(["id"=>22, "evaluacion_id" => 1, "factor_id" => 1, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 11, "valor_maximo" => 14]);
        Resultado::create(["id"=>23, "evaluacion_id" => 1, "factor_id" => 2, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 7, "valor_maximo" => 8]);
        Resultado::create(["id"=>24, "evaluacion_id" => 1, "factor_id" => 3, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 11, "valor_maximo" => 14]);
        Resultado::create(["id"=>25, "evaluacion_id" => 1, "factor_id" => 4, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 10, "valor_maximo" => 11]);
        Resultado::create(["id"=>26, "evaluacion_id" => 1, "factor_id" => 5, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 14, "valor_maximo" => 18]);
        Resultado::create(["id"=>27, "evaluacion_id" => 1, "factor_id" => 6, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 14, "valor_maximo" => 18]);
        Resultado::create(["id"=>28, "evaluacion_id" => 1, "factor_id" => 7, "nivel" => "DEFICIENTE","resultado" => "SATISFACCION MEDIA BAJA", "valor_minimo" => 14, "valor_maximo" => 18]);
        Resultado::create(["id"=>29, "evaluacion_id" => 1, "factor_id" => 1, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 10]);
        Resultado::create(["id"=>30, "evaluacion_id" => 1, "factor_id" => 2, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 6]);
        Resultado::create(["id"=>31, "evaluacion_id" => 1, "factor_id" => 3, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 10]);
        Resultado::create(["id"=>32, "evaluacion_id" => 1, "factor_id" => 4, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 9]);
        Resultado::create(["id"=>33, "evaluacion_id" => 1, "factor_id" => 5, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 13]);
        Resultado::create(["id"=>34, "evaluacion_id" => 1, "factor_id" => 6, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 13]);
        Resultado::create(["id"=>35, "evaluacion_id" => 1, "factor_id" => 7, "nivel" => 'BAJO', "resultado" => "SATISFACCION BAJA", "valor_minimo" => 0, "valor_maximo" => 13]);
    }
}
