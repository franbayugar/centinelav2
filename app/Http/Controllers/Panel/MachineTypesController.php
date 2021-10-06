<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\MachineTypeStoreRequest;
use App\Http\Requests\MachineTypeUpdateRequest;

use App\Models\MachineType;

class MachineTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las machinetypes
        $machinetypes = MachineType::orderBy('name', 'ASC')->get();

        // Retorno a la vista
        return view('panel.generalparameters.machinetypes.index', compact('machinetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno vista
        return view('panel.generalparameters.machinetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineTypeStoreRequest $request)
    {
        // Creo una nueva instacia de machinetype con los datos del request
        $machinetype = new MachineType($request->all());
        // Guardo el machinetype
        $machinetype->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$machinetype->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('machinetypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco al machinetype
        $machinetype = MachineType::find($id);
        // Retorno la vista
        return view('panel.generalparameters.machinetypes.show', compact('machinetype'));
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
    public function update(MachineTypeUpdateRequest $request, $id)
    {
        // Busco el machinetype correspondiente
        $machinetype = MachineType::find($id);
        // Cargo datos que vienen del request
        $machinetype->fill($request->all());
        // Guardo los datos
        $machinetype->save();
        // Muestro msj correspondiente
        flash('El tipo de máquina "' .$machinetype->name. '" ha sido modificada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('machinetypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el tipo de máquina
        $machinetypes = MachineType::find($id);
        // Elimino el tipo de máquina
        $machinetypes->delete();
        // Muestro el msj correspondiente
        flash('El tipo de máquina "' .$machinetypes->name. '" ha sido eliminada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('machinetypes.index')->with("deleted" , $id );
    }
}
