<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\AreaStoreRequest;
use App\Http\Requests\AreaUpdateRequest;

use App\Models\Area;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las areas
        $areas = Area::orderBy('name', 'ASC')->get();

        // Retorno a la vista
        return view('panel.generalparameters.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno vista
        return view('panel.generalparameters.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaStoreRequest $request)
    {
        // Creo una nueva instacia de area con los datos del request
        $area = new Area($request->all());
        // Guardo el area
        $area->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$area->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco al area
        $area = Area::find($id);
        // Retorno la vista
        return view('panel.generalparameters.areas.show', compact('area'));
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
    public function update(AreaUpdateRequest $request, $id)
    {
        // Busco el area correspondiente
        $area = Area::find($id);
        // Cargo datos que vienen del request
        $area->fill($request->all());
        // Guardo los datos
        $area->save();
        // Muestro msj correspondiente
        flash('El área "' .$area->name. '" ha sido modificada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('areas.index');
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
            // Busco el área
            $area = Area::find($id);
            // Elimino el área
            $area->delete();
            // Muestro el msj correspondiente
            flash('El área "' .$area->name. '" ha sido eliminada de forma exitosa!')->success();
            // Redirecciono a la vista correspondiente
            return redirect()->route('areas.index')->with("deleted" , $id );
        }
        catch (\Exception $e) {
            // Muestro el msj correspondiente
            flash('El área "' .$area->name. '" posee referencias en otras tablas por está razón no será eliminada')->error();
            // Redirecciono a la vista correspondiente
            return redirect()->route('areas.index');
        }
    }

    /**
    * restore the specified resource to storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function restore( $id )
    {
        // Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $area = Area::withTrashed()->where('id', '=', $id)->first();
        // Restauramos el registro
        $area->restore();
        // Muestro msj correspondiente
        flash('El área "' .$area->name. '" ha sido restaurada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('areas.index')->with("restored" , $id );
    }
}
