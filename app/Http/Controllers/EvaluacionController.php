<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Factor;
use App\Pregunta;
use App\EvaluacionesCabecera;
use App\EvaluacionesDetalle;

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
            'evaluacion' => mb_strtoupper($request->input('evaluacion'))
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
            'descripcion' => mb_strtoupper($request->input('descripcion'))
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
        foreach($request->input('evaluaciones') as $evaluacion)
        {
            foreach($request->input('trabajadores') as $trabajador)
            {
                EvaluacionesCabecera::create([
                    'evaluacion_id' => $evaluacion,
                    'trabajador_dni'    => $trabajador,
                ]);
            }
        }
    }

    public function getResult($id)
    {
        $cabecera = EvaluacionesCabecera::where('id',$id)->withTrashed()->with('detalles.pregunta.factor')->first();
        $puntajes = collect([]);
        foreach($cabecera->detalles->groupBy('pregunta.factor.id') as $detalles)
        {
            $puntajes->push($detalles->sum('puntaje'));
        }
        $labels = $cabecera->detalles->unique('pregunta.factor.descripcion')->pluck('pregunta.factor.descripcion');
        return compact('puntajes','labels');
    }
}
