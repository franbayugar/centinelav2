<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\ActionStoreRequest;
use App\Http\Requests\ActionUpdateRequest;

use App\Models\Action;

class ActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las actions
        $actions = Action::all();

        // Retorno a la vista
        return view('panel.generalparameters.actions.index', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno vista
        return view('panel.generalparameters.actions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionStoreRequest $request)
    {
        // Creo una nueva instacia de action con los datos del request
        $action = new Action($request->all());
        // Guardo la action
        $action->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$action->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('actions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco la action
        $action = Action::find($id);
        // Retorno la vista
        return view('panel.generalparameters.actions.show', compact('action'));
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
    public function update(ActionUpdateRequest $request, $id)
    {
        // Busco el action correspondiente
        $action = Action::find($id);
        // Cargo datos que vienen del request
        $action->fill($request->all());
        // Guardo los datos
        $action->save();
        // Muestro msj correspondiente
        flash('La acción "' .$action->name. '" ha sido modificada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('actions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco la acción
        $action = Action::find($id);
        // Elimino la acción
        $action->delete();
        // Muestro el msj correspondiente
        flash('La acción "' .$action->name. '" ha sido eliminada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('actions.index')->with("deleted" , $id );
    }
}
