<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\ViaticRequest;

use App\Models\Area;

use App\Models\Viatic;

class ViaticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las viatics
        $viatics = Viatic::orderBy('work_date', 'DESC')->get();

        // Retorno a la vista
        return view('panel.viatics.index', compact('viatics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listado de areas
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Retorno la vista correspondiente
        return view('panel.viatics.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViaticRequest $request)
    {
        // Creo una nueva instacia de viatic con los datos del request
        $viatic = new Viatic($request->all());
        // Guardo viatic
        $viatic->save();

        // Muestro msj correspondiente
        flash('Se ha registrado con exito!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('viatics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Me traigo todas las áreas
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Busco el viatic
        $viatic = Viatic::find($id);
        // Retorno la vista
        return view('panel.viatics.show', compact('viatic', 'areas'));
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
    public function update(ViaticRequest $request, $id)
    {
        // Busco el viatic correspondiente
        $viatic = Viatic::find($id);
        // Cargo datos que vienen del request
        $viatic->fill($request->all());
        // Guardo los datos
        $viatic->save();
        // Muestro msj correspondiente
        flash('El viático ha sido modificado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('viatics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el viatic
        $viatic = Viatic::find($id);
        // Elimino el viatic
        $viatic->delete();
        // Muestro el msj correspondiente
        flash('El viático ha sido eliminado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('viatics.index')->with("deleted" , $id );
    }
}
