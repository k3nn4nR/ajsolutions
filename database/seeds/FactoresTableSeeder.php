<?php
use App\Factor;
use Illuminate\Database\Seeder;

class FactoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factor::create(["id" => 1, "descripcion" => "CONDICIONES FíSICAS Y/O  MATERIALES"]);
        Factor::create(["id" => 2, "descripcion" => "BENEFICIOS LABORALES Y/O  REMUNERATIVOS"]);
        Factor::create(["id" => 3, "descripcion" => "POLíTICAS ADMINISTRATIVAS"]);
        Factor::create(["id" => 4, "descripcion" => "RELACIONES SOCIALES"]);
        Factor::create(["id" => 5, "descripcion" => "DESARROLLO PERSONAL"]);
        Factor::create(["id" => 6, "descripcion" => "DESEMPEñO TAREAS"]);
        Factor::create(["id" => 7, "descripcion" => "RELACIóN CON LA AUTORIDAD"]);
    }
}

