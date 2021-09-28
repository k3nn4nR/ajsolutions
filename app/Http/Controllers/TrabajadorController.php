<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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
        $trabajador = new Trabajador;
        $trabajador->dni = strtoupper($request->input('dni'));
        $trabajador->ape_paterno = strtoupper($request->input('ape_paterno'));
        $trabajador->ape_materno = strtoupper($request->input('ape_materno'));
        $trabajador->nombres = strtoupper($request->input('name'));
        $trabajador->direccion = strtoupper($request->input('direccion'));
        $trabajador->celular = strtoupper($request->input('celular'));
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
}
