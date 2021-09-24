<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacion;
use App\Factor;
use App\Pregunta;

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
            'evaluacion' => strtoupper($request->input('evaluacion'))
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
            'descripcion' => strtoupper($request->input('descripcion'))
        ]);
    }

    public function factorDestroy($id)
    {
        Factor::find($id)->delete();
    }

    public function preguntaIndex()
    {
        return Pregunta::all();
    }

    public function preguntaStore(Request $request)
    {
        Pregunta::create([
            'descripcion' => strtoupper($request->input('descripcion')),
            'evaluacion_id' => $request->input('evaluacion'),
            'factor_id' => $request->input('factor')
        ]);
    }

    public function preguntaDestroy($id)
    {
        Pregunta::find($id)->delete();
    }
}
