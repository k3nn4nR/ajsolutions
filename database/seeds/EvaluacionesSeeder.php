<?php

use App\Evaluacion;
use Illuminate\Database\Seeder;

class EvaluacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evaluacion::create(["id" => 1, "evaluacion" => "SATISFACCION LABORAL", "autor" => "SONIA PALMA"]);
    }
}
