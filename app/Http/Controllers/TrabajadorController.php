<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Trabajador;
use App\EvaluacionesCabecera;
use App\EvaluacionesDetalle;
use  App\Http\Requests\StoreEvaluacionCompletada;
use Carbon\Carbon;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trabajador::get();
    }

    /**
     * Display the Main View for Trabajador.
     *
     * @return View
     */
    public function mainView()
    {
        return view('trabajador');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajador = new Trabajador;
        $trabajador->dni = mb_strtoupper($request->input('dni'));
        $trabajador->ape_paterno = mb_strtoupper($request->input('ape_paterno'));
        $trabajador->ape_materno = mb_strtoupper($request->input('ape_materno'));
        $trabajador->nombres = mb_strtoupper($request->input('name'));
        $trabajador->direccion = mb_strtoupper($request->input('direccion'));
        $trabajador->celular = mb_strtoupper($request->input('celular'));
        if (!$request->file('photo'))
        {
            $trabajador->photo = 'no_image.jpg';
        }else{
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = $trabajador->dni . '.' . $extension;
            Image::make($request->file('photo'))->resize(200, 300)->save(storage_path('/app/public/images/trabajadores/'.$filename));
            $trabajador->photo = $filename;
        }
        $trabajador->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trabajador::find($id)->update(['estado'=>"INACTIVO"]);
        Trabajador::find($id)->delete();
    }

    public function getEvaluaciones($id)
    {
        $cabeceras = Trabajador::find($id)->load('cabeceras.detalles')->cabeceras;
        foreach($cabeceras as $cabecera)
        {
            if($cabecera->detalles->isEmpty())
            {
                $evaluacion = $cabecera->load('evaluacion.preguntas')->evaluacion;
                foreach($evaluacion->preguntas as $pregunta)
                {
                    $cabecera->detalles()->create([
                        'pregunta_id'   => $pregunta->id,
                    ]);
                }
            }
        }
        return $cabeceras = Trabajador::find($id)->load('cabeceras.detalles.pregunta','cabeceras.evaluacion')->cabeceras;
    }

    public function getEvaluacionesHistorico($id)
    {
        return EvaluacionesCabecera::onlyTrashed()->with('evaluacion')->where('trabajador_dni',$id)->get();
    }

    public function storeEvaluacion(StoreEvaluacionCompletada $request)
    {
        foreach($request->input('detalles') as $detalle)
        {
            EvaluacionesDetalle::find($detalle['id'])->update(['puntaje'=>$detalle['puntaje']]);
        }
        EvaluacionesCabecera::find($request->input('id'))->delete();
    }
}
