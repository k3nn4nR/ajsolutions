<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajador;

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
        Trabajador::create([
            "dni" => strtoupper($request->input('dni')),
            "ape_paterno" => strtoupper($request->input('ape_paterno')),
            "ape_materno" => strtoupper($request->input('ape_materno')),
            "nombres" => strtoupper($request->input('name')),
            "direccion" => strtoupper($request->input('direccion')),
            "celular" => strtoupper($request->input('celular')),
            "estado" => strtoupper($request->input('estado')),
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
        //
    }
}
