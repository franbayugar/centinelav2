<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\StatusOutputStoreRequest;
use App\Http\Requests\StatusOutputUpdateRequest;

use App\Models\StatusOutput;

class StatusOutputsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las statusoutputs
        $statusoutputs = StatusOutput::all();

        // Retorno a la vista
        return view('panel.generalparameters.statusoutputs.index', compact('statusoutputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno vista
        return view('panel.generalparameters.statusoutputs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusOutputStoreRequest $request)
    {
        // Creo una nueva instacia de statusoutput con los datos del request
        $statusoutput = new StatusOutput($request->all());
        // Guardo el statusoutput
        $statusoutput->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$statusoutput->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('statusoutputs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco al statusoutput
        $statusoutput = StatusOutput::find($id);
        // Retorno la vista
        return view('panel.generalparameters.statusoutputs.show', compact('statusoutput'));
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
    public function update(StatusOutputUpdateRequest $request, $id)
    {
        // Busco el statusoutput correspondiente
        $statusoutput = StatusOutput::find($id);
        // Cargo datos que vienen del request
        $statusoutput->fill($request->all());
        // Guardo los datos
        $statusoutput->save();
        // Muestro msj correspondiente
        flash('El estado de salida "' .$statusoutput->name. '" ha sido modificado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('statusoutputs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Busco el statusoutput
            $statusoutput = StatusOutput::find($id);
            // Elimino el statusoutput
            $statusoutput->delete();
            // Muestro el msj correspondiente
            flash('El estado de salida "' .$statusoutput->name. '" ha sido eliminado de forma exitosa!')->success();
            // Redirecciono a la vista correspondiente
            return redirect()->route('statusoutputs.index')->with("deleted" , $id );
        }
        catch (\Exception $e) {
            // Muestro el msj correspondiente
            flash('El estado de salida "' .$statusoutput->name. '" posee referencias en otras tablas por está razón no será eliminada.')->error();
            // Redirecciono a la vista correspondiente
            return redirect()->route('statusoutputs.index');
        }
    }
}
