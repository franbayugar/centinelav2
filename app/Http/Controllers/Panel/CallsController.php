<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CallStoreRequest;

use App\Models\Call;
use App\Models\Area;

class CallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los products
        $calls = Call::all();

        // Retorno vista
        return view('panel.calls.index', compact('calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Me traigo todas las áreas
        $areas = Area::orderBy('name', 'ASC')
            ->pluck('name', 'id')
            ->all();
        // Retorno vista
        return view('panel.calls.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CallStoreRequest $request)
    {
        $calls = new Call($request->all());
        $calls->date = now();

        $calls->save();
        // Muestro mensaje correspondiente
        flash('El llamado se ha agregado a la lista')->success();
        // Redirecciono a la vista que muestra todos los articulos
        return redirect()->route('calls.index');

        // return view('panel.calls.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas = Area::orderBy('name', 'ASC')
            ->pluck('name', 'id')
            ->all();
        // return view('panel'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calls = Call::findOrFail($id);
        $areas = Area::all();

        return view('panel.calls.edit', compact('calls', 'areas'));
    }

    public function updateNotified($id)
    {
        $call = Call::findOrFail($id);

        if ($call->notified == 0 || $call->notified == null) {
            $call->notified = 1;
            $call->save();
        }
        return redirect()->back();
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
        $calls = Call::find($id);

        $calls->fill($request->all());
        $calls->notified = $request->notified;
        $calls->save();

        flash('La llamada ha sido modificada de forma exitosa!')->success();
        return redirect()->route('calls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calls = Call::findOrFail($id);

        $calls->delete();
        flash('La llamada ha sido eliminada de forma exitosa!')->success();

        return redirect()->route('calls.index');
    }
}
