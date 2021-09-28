<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Trabajador;
use Carbon\Carbon;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Proyecto::get();
    }

    /**
     * Display the Main View for Trabajador.
     * 
     * @return View
     */
    public function mainView()
    {
        return view('proyecto');
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
        Proyecto::create([
            'Descripción' => strtoupper($request->input('descripcion')),
            'Empresa' => strtoupper($request->input('empresa')),
            'started_at' => strtoupper($request->input('started_at')),
            'ended_at' => strtoupper($request->input('ended_at')),
        ]);
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
        
        foreach(Proyecto::find($id)->trabajadores as $trabajador)
        {
            Trabajador::find($trabajador['dni'])->update(['estado'=>'DISPONIBLE']);
            Proyecto::find($id)->trabajadores()->updateExistingPivot($trabajador['dni'],['deleted_at'=>Carbon::now()]);
        }
        Proyecto::find($id)->update(['Estado'=>"CANCELADO"]);
        Proyecto::find($id)->delete();
    }

    public function storeGrupoTrabajo(Request $request)
    {
        Proyecto::find($request->input('proyecto'))->trabajadores()->syncWithoutDetaching($request->input('trabajadores'));
        foreach($request->input('trabajadores') as $trabajador)
        {
            Trabajador::find($trabajador)->update(['estado'=>'NO DISPONIBLE']);
        }
    }

    public function getGrupoTrabajo()
    {
        return Proyecto::with('trabajadores')->get();
    }

    public function destroyTrabajador(Request $request)
    {
        Proyecto::find($request->input('proyecto'))->trabajadores()->updateExistingPivot($request->input('trabajador'),['comentario'=>strtoupper($request->input('comentario')),'deleted_at'=>Carbon::now()]);
        Trabajador::find($request->input('trabajador'))->update(['estado'=>"DISPONIBLE"]);
    }

    public function getAll()
    {
        return Proyecto::withTrashed()->get();
    }

    public function reempalzarTrabajador(Request $request)
    {
        Proyecto::find($request->input('proyecto'))->trabajadores()->updateExistingPivot($request->input('trabajador'),['estado'=>"ELIMINADO",'comentario'=>strtoupper($request->input('comentario')),'deleted_at'=>Carbon::now()]);
        Proyecto::find($request->input('proyecto'))->trabajadores()->syncWithoutDetaching($request->input('reemplazo'));
        Trabajador::find($request->input('trabajador'))->update(['estado'=>"DISPONIBLE"]);
        Trabajador::find($request->input('reemplazo'))->update(['estado'=>"NO DISPONIBLE"]);
    }

    public function agregarTrabajador(Request $request)
    {
        Proyecto::find($request->input('proyecto'))->trabajadores()->syncWithoutDetaching($request->input('trabajador'));
        Trabajador::find($request->input('trabajador'))->update(['estado'=>"NO DISPONIBLE"]);
    }

    public function finishProyecto(Request $request)
    {
        Proyecto::find($request->input('proyecto'))->update(['Estado'=>"FINALIZADO"]);
        foreach(Proyecto::find($request->input('proyecto'))->trabajadores as $trabajador)
        {
            Trabajador::find($trabajador['dni'])->update(['estado'=>'DISPONIBLE']);
            Proyecto::find($request->input('proyecto'))->trabajadores()->updateExistingPivot($trabajador['dni'],['deleted_at'=>Carbon::now()]);
        }
        Proyecto::find($request->input('proyecto'))->delete();
    }
}
