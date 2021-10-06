<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\RouterStoreRequest;
use App\Http\Requests\RouterUpdateRequest;

use App\Models\Area;

use App\Models\Router;

use Illuminate\Support\Facades\Crypt;

class RoutersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las routers
        $routers = Router::orderBy('name', 'ASC')->get();

        // Retorno a la vista
        return view('panel.routers.index', compact('routers'));
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
        // Retorno vista
        return view('panel.routers.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouterStoreRequest $request)
    {
        // Creo una nueva instacia de router con los datos del request
        $router = new Router($request->all());
        // Si la contraseña no es null la encripto
        if ($request->password != null ) {
            $router->password = Crypt::encrypt($request->password);
        }
        // Si la descripción no es null la encripto
        if ($request->description != null ) {
            $router->description = Crypt::encrypt($request->description);
        }
        // Guardo el router
        $router->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$router->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('routers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco el router
        $router = Router::find($id);
        // Listado de areas
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Retorno la vista
        return view('panel.routers.show', compact('router', 'areas'));
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
    public function update(RouterUpdateRequest $request, $id)
    {
        // Busco el router correspondiente
        $router = Router::find($id);
        // Cargo datos que vienen del request
        $router->fill($request->all());
        // Si la contraseña no es null la encripto
        if ($request->password != null ) {
            $router->password = Crypt::encrypt($request->password);
        }
        // Si la descripción no es null la encripto
        if ($request->description != null ) {
            $router->description = Crypt::encrypt($request->description);
        }
        // Guardo los datos
        $router->save();
        // Muestro msj correspondiente
        flash('El router "' .$router->name. '" ha sido modificado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('routers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el router
        $router = Router::find($id);
        // Elimino el router
        $router->delete();
        // Muestro el msj correspondiente
        flash('El router "' .$router->name. '" ha sido eliminado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('routers.index');
    }
}
