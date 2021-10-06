<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\StatusRepairStoreRequest;
use App\Http\Requests\StatusRepairUpdateRequest;

use App\Models\StatusRepair;

class StatusRepairsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las statusrepairs
        $statusrepairs = StatusRepair::all();

        // Retorno a la vista
        return view('panel.generalparameters.statusrepairs.index', compact('statusrepairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno vista
        return view('panel.generalparameters.statusrepairs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRepairStoreRequest $request)
    {
        // Creo una nueva instacia de statusrepair con los datos del request
        $statusrepair = new StatusRepair($request->all());
        $statusrepair->color_text = $request->color_text;
        // Guardo el statusrepair
        $statusrepair->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$statusrepair->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('statusrepairs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco al statusrepair
        $statusrepair = StatusRepair::find($id);
        // Retorno la vista
        return view('panel.generalparameters.statusrepairs.show', compact('statusrepair'));
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
    public function update(StatusRepairUpdateRequest $request, $id)
    {
        // Busco el statusrepair correspondiente
        $statusrepair = StatusRepair::find($id);
        // Cargo datos que vienen del request
        $statusrepair->fill($request->all());
        $statusrepair->color_text = $request->color_text;
        // Guardo los datos
        $statusrepair->save();
        // Muestro msj correspondiente
        flash('El estado de reparación "' .$statusrepair->name. '" ha sido modificado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('statusrepairs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el estado de reparación
        $statusrepair = StatusRepair::find($id);
        // Elimino el estado de reparación
        $statusrepair->delete();
        // Muestro el msj correspondiente
        flash('El estado de reparación "' .$statusrepair->name. '" ha sido eliminada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('statusrepairs.index')->with("deleted" , $id );
    }
}
