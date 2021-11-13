<?php
use App\Pregunta;
use Illuminate\Database\Seeder;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create(["id" => 1, "descripcion" => "LA DISTRIBUCIÓN FÍSICA DEL AMBIENTE DE TRABAJO FACILITA LA REALIZACIÓN DE MIS LABORES.", "evaluacion_id" => 1, "factor_id" => 1]);
        Pregunta::create(["id" => 2, "descripcion" => "MI SUELDO ES MUY BAJO EN RELACIÓN A LA LABOR QUE REALIZO.", "evaluacion_id" => 1, "factor_id" => 2]);
        Pregunta::create(["id" => 3, "descripcion" => "EL AMBIENTE CREADO POR MIS COMPAÑEROS ES EL IDEAL PARA DESEMPEÑAR MIS FUNCIONES.", "evaluacion_id" => 1, "factor_id" => 4]);
        Pregunta::create(["id" => 4, "descripcion" => "SIENTO QUE EL TRABAJO QUE HAGO ES JUSTO PARA MI MANERA DE SER.", "evaluacion_id" => 1, "factor_id" => 5]);
        Pregunta::create(["id" => 5, "descripcion" => "LA TAREA QUE REALIZO ES TAN VALIOSA COMO CUALQUIER OTRA.", "evaluacion_id" => 1, "factor_id" => 6]);
        Pregunta::create(["id" => 6, "descripcion" => "MI (S) JEFE (S) ES (SON) COMPRENSIVO (S)", "evaluacion_id" => 1, "factor_id" => 7]);
        Pregunta::create(["id" => 7, "descripcion" => "ME SIENTO MAL CON LO QUE HAGO.", "evaluacion_id" => 1, "factor_id" => 3]);
        Pregunta::create(["id" => 8, "descripcion" => "SIENTO QUE RECIBO DE PARTE DE LA EMPRESA MAL TRATO.", "evaluacion_id" => 1, "factor_id" => 3]);
        Pregunta::create(["id" => 9, "descripcion" => "ME AGRADAN TRABAJAR CON MIS COMPAÑEROS.", "evaluacion_id" => 1, "factor_id" => 4]);
        Pregunta::create(["id" => 10, "descripcion" => "MI TRABAJO PERMITE DESARROLLARME PERSONALMENTE.", "evaluacion_id" => 1, "factor_id" => 5]);
        Pregunta::create(["id" => 11, "descripcion" => "ME SIENTO REALMENTE ÚTIL CON LA LABOR QUE REALIZO.", "evaluacion_id" => 1, "factor_id" => 6]);
        Pregunta::create(["id" => 12, "descripcion" => "ES GRATA LA DISPOSICIÓN DE MI JEFE CUANDO LES PIDO ALGUNA CONSULTA SOBRE MI TRABAJO.", "evaluacion_id" => 1, "factor_id" => 7]);
        Pregunta::create(["id" => 13, "descripcion" => "EL AMBIENTE DONDE TRABAJO ES CONFORTABLE.", "evaluacion_id" => 1, "factor_id" => 1]);
        Pregunta::create(["id" => 14, "descripcion" => "SIENTO QUE EL SUELDO QUE TENGO ES BASTANTE ACEPTABLE", "evaluacion_id" => 1, "factor_id" => 2]);
        Pregunta::create(["id" => 15, "descripcion" => "LA SENSACIÓN QUE TENGO DE MI TRABAJO ES QUE ME ESTÁN EXPLOTANDO.", "evaluacion_id" => 1, "factor_id" => 3]);
        Pregunta::create(["id" => 16, "descripcion" => "PREFIERO TOMAR DISTANCIA CON LAS PERSONAS CON LAS QUE TRABAJO.", "evaluacion_id" => 1, "factor_id" => 4]);
        Pregunta::create(["id" => 17, "descripcion" => "ME DISGUSTA MI HORARIO.", "evaluacion_id" => 1, "factor_id" => 3]);
        Pregunta::create(["id" => 18, "descripcion" => "DISFRUTO DE CADA LABOR QUE REALIZO EN MI TRABAJO", "evaluacion_id" => 1, "factor_id" => 5]);
        Pregunta::create(["id" => 19, "descripcion" => "LAS TAREAS QUE REALIZO LAS PERCIBO COMO ALGO SIN IMPORTANCIA.", "evaluacion_id" => 1, "factor_id" => 6]);
        Pregunta::create(["id" => 20, "descripcion" => "LLEVARSE BIEN CON EL JEFE BENEFICIA LA CALIDAD DEL TRABAJO.", "evaluacion_id" => 1, "factor_id" => 7]);
        Pregunta::create(["id" => 21, "descripcion" => "LA COMODIDAD QUE ME OFRECE EL AMBIENTE DE TRABAJO ES INIGUALABLE.", "evaluacion_id" => 1, "factor_id" => 1]);
        Pregunta::create(["id" => 22, "descripcion" => "FELIZMENTE MI TRABAJO ME PERMITE CUBRIR MIS EXPECTATIVAS ECONÓMICAS.", "evaluacion_id" => 1, "factor_id" => 2]);
        Pregunta::create(["id" => 23, "descripcion" => "EL HORARIO DE TRABAJO ME RESULTA INCÓMODO.", "evaluacion_id" => 1, "factor_id" => 3]);
        Pregunta::create(["id" => 24, "descripcion" => "LA SOLIDARIDAD ES UNA VIRTUD CARACTERÍSTICA EN NUESTRO GRUPO DE TRABAJO.", "evaluacion_id" => 1, "factor_id" => 4]);
        Pregunta::create(["id" => 25, "descripcion" => "ME SIENTO FELIZ POR LOS RESULTADOS QUE LOGRO EN MI TRABAJO.", "evaluacion_id" => 1, "factor_id" => 5]);
        Pregunta::create(["id" => 26, "descripcion" => "MI TRABAJO ME ABURRE", "evaluacion_id" => 1, "factor_id" => 6]);
        Pregunta::create(["id" => 27, "descripcion" => "LA RELACIÓN QUE TENGO CON MIS SUPERIORES ES CORDIAL.", "evaluacion_id" => 1, "factor_id" => 7]);
        Pregunta::create(["id" => 28, "descripcion" => "EN EL AMBIENTE FÍSICO DONDE ME UBICO, TRABAJO CÓMODAMENTE.", "evaluacion_id" => 1, "factor_id" => 1]);
        Pregunta::create(["id" => 29, "descripcion" => "MI TRABAJO ME HACE SENTIR REALIZADO.", "evaluacion_id" => 1, "factor_id" => 5]);
        Pregunta::create(["id" => 30, "descripcion" => "ME GUSTA EL TRABAJO QUE REALIZO.", "evaluacion_id" => 1, "factor_id" => 6]);
        Pregunta::create(["id" => 31, "descripcion" => "NO ME SIENTO A GUSTO CON MI (S) JEFE (S).", "evaluacion_id" => 1, "factor_id" => 7]);
        Pregunta::create(["id" => 32, "descripcion" => "EXISTEN LAS COMODIDADES PARA UN BUEN DESEMPEÑO DE LAS LABORES DIARIAS.", "evaluacion_id" => 1, "factor_id" => 1]);
        Pregunta::create(["id" => 33, "descripcion" => "NO TE RECONOCEN EL ESFUERZO SI TRABAJAS MÁS DE LAS HORAS REGLAMENTARIAS.", "evaluacion_id" => 1, "factor_id" => 3]);
        Pregunta::create(["id" => 34, "descripcion" => "HACIENDO MI TRABAJO ME SIENTO BIEN CONMIGO MISMO (A)", "evaluacion_id" => 1, "factor_id" => 5]);
        Pregunta::create(["id" => 35, "descripcion" => "ME SIENTO COMPLACIDO CON LA ACTIVIDAD QUE REALIZO.", "evaluacion_id" => 1, "factor_id" => 6]);
        Pregunta::create(["id" => 36, "descripcion" => "MI (S) JEFE (S) VALORA (N) EL ESFUERZO QUE HAGO EN MI TRABAJO.", "evaluacion_id" => 1, "factor_id" => 7]);
    }
}
