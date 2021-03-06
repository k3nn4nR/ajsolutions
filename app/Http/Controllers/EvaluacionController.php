<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Factor;
use App\Pregunta;
use App\Resultado;
use App\EvaluacionesCabecera;
use App\EvaluacionesDetalle;
use DB;
use Carbon\Carbon;

class EvaluacionController extends Controller
{
    public function mainView()
    {
        return view('evaluacion');
    }

    public function evaluacionIndex()
    {
        return Evaluacion::all();
    }

    public function evaluacionStore(Request $request)
    {
        Evaluacion::create([
            'evaluacion' => mb_strtoupper($request->input('evaluacion')),
            'autor' => mb_strtoupper($request->input('autor')),
        ]);
    }

    public function evaluacionDestroy($id)
    {
        Evaluacion::find($id)->delete();
    }

    public function factorIndex()
    {
        return Factor::all();
    }

    public function factorStore(Request $request)
    {
        Factor::create([
            'descripcion' => mb_strtoupper($request->input('descripcion')),
        ]);
    }

    public function factorDestroy($id)
    {
        Factor::find($id)->delete();
    }

    public function preguntaIndex()
    {
        return Pregunta::with('evaluacion','factor')->get();
    }

    public function preguntaStore(Request $request)
    {
        Pregunta::create([
            'descripcion' => mb_strtoupper($request->input('descripcion')),
            'evaluacion_id' => $request->input('evaluacion'),
            'factor_id' => $request->input('factor')
        ]);
    }

    public function preguntaDestroy($id)
    {
        Pregunta::find($id)->delete();
    }

    public function storEvaluacionTrabajador(Request $request)
    {
        $date = Carbon::now();
        foreach($request->input('evaluaciones') as $evaluacion)
        {
            foreach($request->input('trabajadores') as $trabajador)
            {

                EvaluacionesCabecera::create([
                    'evaluacion_id' => $evaluacion,
                    'trabajador_dni'    => $trabajador,
                    'estado'    => 'PENDIENTE',
                    'fecha' => $date->toDateString(),
                    'hora' => $date->toTimeString(),
                ]);
            }
        }
    }

    public function resultadoIndex()
    {
        return Resultado::all();
    }

    public function resultadoStore(Request $request)
    {
        Resultado::create([
            'resultado' => mb_strtoupper($request->input('resultado'))
        ]);
    }

    public function resultadoDestroy($id)
    {
        Resultado::find($id)->delete();
    }

    public function getResult($id)
    {
        $cabecera = EvaluacionesCabecera::where('id',$id)->withTrashed()->with('detalles.pregunta.factor','evaluacion.resultados')->first();
        $puntajes = collect([]);
        foreach($cabecera->detalles->groupBy('pregunta.factor.id') as $detalles)
        {
            $puntajes->push($detalles->sum('puntaje'));
        }
        $labels = $cabecera->detalles->unique('pregunta.factor.descripcion')->pluck('pregunta.factor.descripcion');

        return compact('puntajes','labels');
    }

    public function getNCE()
    {
        $cabeceras = EvaluacionesCabecera::withTrashed()->get()->sortBy('fecha');
        foreach($cabeceras as $cabecera)
        {
            $cabecera->mes = Carbon::parse($cabecera->fecha)->year."-".Carbon::parse($cabecera->fecha)->month;
        }
        $meses = $cabeceras->pluck('mes')->unique()->values();
        $cabeceras = $cabeceras->groupBy('mes');
        $datos = collect([]);
        foreach($cabeceras as $cabecera)
        {
            $finalizados = 0;
            if($cabecera->pluck('estado')->countBy()->has('FINALIZADO'))
            {
                $finalizados = $cabecera->pluck('estado')->countBy()['FINALIZADO'];
            }
            $datos->push(round($finalizados/$cabecera->count()*100,2));
        }
        return compact('meses','datos');
    }
}
