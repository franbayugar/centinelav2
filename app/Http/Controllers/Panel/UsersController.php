<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserChangePasswordUpdateRequest;

use App\Models\User;
use App\Models\Area;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los usuarios
        $users = User::orderBy('name', 'ASC')->get();

        // dd($users);
        
        // Retorno vista
        return view('panel.generalparameters.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Me traigo todas las áreas
        $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Retorno vista
        return view('panel.generalparameters.users.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // Creo una nueva instacia de usuario con los datos del request
        $user = new User($request->all());
        // Encripto la contraseña que recibo del request
        $user->password = bcrypt($request->password);
        // Guardo al usuario
        $user->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$user->name. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('users.index');
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
        // Busco al usuario
        $user = User::find($id);
        // Retorno la vista
        return view('panel.generalparameters.users.show', compact('user', 'areas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // No es necesario crear vista ya que se integra en el show
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        // Busco al usuario
        $user = User::find($id);
        // Cargo datos que vienen del request
        $user->fill($request->all());
        // Guardo los datos
        $user->save();
        // Muestro msj correspondiente
        flash('El usuario "' .$user->name. '" ha sido modificado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('users.index');
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
            // Busco al usuario
            $user = User::find($id);
            // Lo elimino
            $user->delete();
            // Muestro msj correspondiente
            flash('"'.$user->name. " " .$user->lastname. ' de (' .$user->area->name.')" ha sido eliminado/a de forma exitosa.')->success();
            // Redirecciono a una vista
            return redirect()->route('users.index')->with("deleted" , $id );
        }
        catch (\Exception $e) {
            // Muestro msj correspondiente
            flash('"'.$user->name. " " .$user->lastname. ' de (' .$user->area->name.')" posee referencias en otras tablas por está razón no será eliminado/a.')->error();
            // Redirecciono a una vista
            return redirect()->route('users.index');
        }
    }

    /**
     * restore the specified resource to storage.
    *
    * @param  int  $id
    * @return Response
    */

    public function restore($id)
    {
        //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
        $user = User::withTrashed()->where('id', '=', $id)->first();
        //Restauramos el registro
        $user->restore();
        // Muestro msj correspondiente
        flash('"'.$user->name. " " .$user->lastname. ' de (' .$user->area->name.')" ha sido restaurado de forma exitosa!')->success();
        // Retorno a la vista correspondiente
        return redirect()->route('users.index')->with("restored" , $id );
    }

    public function changePassword(UserChangePasswordUpdateRequest $request, $id)
    {
        // Busco al usuario
        $user = User::findOrFail($id);
        // Encripto la contraseña
        $user->password = bcrypt($request->pass);
        // Guardo los datos
        $user->save();
        // Muestro msj correspondiente
        flash('La contraseña de "' .$user->name. " " .$user->lastname. ' de (' .$user->area->name.')" ha sido modificada de forma exitosa.')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('users.index');
    }
}
