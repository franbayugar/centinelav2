<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\MachineRequest;

use App\Models\User;

use App\Models\Machine;

use App\Models\Action;

use App\Models\StatusRepair;

use App\Models\Event;

use App\Models\MachineType;

use Illuminate\Support\Facades\Crypt;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las machines
        $machines = Machine::all();

        // Retorno a la vista
        return view('panel.machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Me traigo todos los usuarios
        $users = User::orderBy('lastname', 'ASC')->get();
        // Me traigo todos los tipos de máquinas
        $machinetypes = MachineType::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Usuarios de computos
        $users_computos = User::where('area_id', '=', 1)->get();
        // Retorno vista
        return view('panel.machines.create', compact('users', 'users_computos', 'machinetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineRequest $request)
    {
        // Creo una nueva instacia de machine con los datos del request
        $machine = new Machine($request->all());
        // Si la contraseña no es null la encripto
        if ($request->password != null ) {
            $machine->password = Crypt::encrypt($request->password);
        }
        // Manipulacion de imagenes
        if ($request->file('image'))
        {
            $file = $request->file('image');
            // Creo un nombre unico para la imagen asi evito colisiones
            $name = str_slug($request->name, "-").time(). '.' . $file->getClientOriginalExtension();
            // Obtengo la direccion exacta donde se encuentra el proyecto
            $path = public_path() .'/img/machines/';
            // Metodo con el cual guarda la imagen
            $file->move($path, $name);
            // Guardo el nombre de la imagen
            $machine->image = $name;
        }
        // Guardo machine
        $machine->serial = $request->serial;
        $machine->save();

        // Muestro msj correspondiente
        flash('Se ha registrado "' .$machine->name. '" de forma exitosa!')->success();

        // Notificación para Slack //
        $msj = '*Dio* de *alta* una nueva máquina *'.$machine->name.'* asociada a: *'.$machine->user->name.' '.$machine->user->lastname.'*';
        $this->slackNotification($msj);

        // Redirecciono a la vista correspondiente
        return redirect()->route('machines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco al machine
        $machine = Machine::find($id);

        // Usuarios de computos
        $users_computos = User::where('area_id', '=', 1)->get();
        // Busco todas las acciones
        $actions = Action::orderBy('id', 'ASC')->pluck('name', 'id')->all();
        // Busco los estados de reparación
        $status_repairs = StatusRepair::orderBy('id', 'ASC')->pluck('name', 'id')->all();
        // Busco todos los eventos de la maquina
        $events = Event::where('machine_id', '=', $id)->orderBy('admission_date', 'DESC')->get();

        // dd($events->last()->admission_date);
        // Retorno la vista
        return view('panel.machines.show', compact('machine', 'users_computos', 'status_repairs', 'actions', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busco la maquina
        $machine = Machine::find($id);
        // Me traigo todos los usuarios
        $users = User::orderBy('lastname', 'ASC')->get();
        // Me traigo todos los tipos de máquinas
        $machinetypes = MachineType::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Retorno vista
        return view('panel.machines.edit', compact('machine', 'users', 'machinetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineRequest $request, $id)
    {
        // Busco el machine correspondiente
        $machine = Machine::find($id);
        // Cargo datos que vienen del request
        $machine->fill($request->all());
        // Si la contraseña no es null la encripto
        if ($request->password != null ) {
            $machine->password = Crypt::encrypt($request->password);
        }
        // Manipulación de imagen
        if ($request->file('image'))
        {
            // Borrar anterior imagen
            // Si existe imagen que seguramente exista entra y la elimina
            if ( \File::exists( public_path() .'/img/machines/'. $machine->image ) ) 
            {
                \File::delete( public_path() .'/img/machines/'. $machine->image );
            }
            else
            {
                flash('La imagen ' .$machine->image. ' de la máquina ' .$machine->name. ' no existe!')->error();
            }

            // Subir nueva imagen
            $file = $request->file('image');
            // Creo un nombre unico para la imagen asi evito colisiones
            $name = str_slug($request->name, "-").time(). '.' . $file->getClientOriginalExtension();
            // Obtengo la direccion exacta donde se encuentra el proyecto
            $path = public_path() .'/img/machines/';
            // Metodo con el cual guarda la imagen
            $file->move($path, $name);
            // Guardo el nombre de la imagen
            $machine->image = $name;
        }
        // Guardo los datos
        $machine->serial = $request->serial;
        $machine->save();
        // Muestro msj correspondiente
        flash('La máquina "' .$machine->name. '" ha sido modificada de forma exitosa!')->success();

        // Notificación para Slack //
        $msj = '*Modificó* la máquina *'.$machine->name.'* asociada a: *'.$machine->user->name.' '.$machine->user->lastname.'*';
        $this->slackNotification($msj);
        
        // Redirecciono a la vista correspondiente
        return redirect()->route('machines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el máquina
        $machine = Machine::find($id);
        // Elimino el máquina
        $machine->delete();
        // Muestro el msj correspondiente
        flash('La máquina "' .$machine->name. '" ha sido eliminada de forma exitosa!')->success();

        // Notificación para Slack //
        $msj = '*Eliminó* la máquina *'.$machine->name.'* asociada a: *'.$machine->user->name.' '.$machine->user->lastname.'*';
        $this->slackNotification($msj);

        // Redirecciono a la vista correspondiente
        return redirect()->route('machines.index');
    }

    /*
    *   Metodo que realiza el envió de la notificación de Slack
    */
    public function slackNotification($msj) {
        
        $settings = [
            'username'   => \Auth::user()->name .' '. \Auth::user()->lastname, //Nombre de usuario que envía el mensaje
            'link_names' => true    //Activar que el nombre de usuario sea un link
        ];
        // Instanciar la clase
        $client = new \Maknz\Slack\Client(config('slack.endpoint'), $settings);
        // Utilizar el método to es para elegir el canal donde se enviará el mensaje
        // El método send para indicar el texto
        $client->to(ENV('SLACK-CHANNEL'))->attach([
            'text'        => $msj,
            'author_name' => \Auth::user()->name .' '. \Auth::user()->lastname,
            'color' => 'good',
            'mrkdwn_in' => ['text']
        ])->send('Nueva notificación de Centinela');

    }

    public function withoutImage($id)
    {
        // Busco la máquina
        $machine = Machine::findOrFail($id);
        $machine->image = null;
        $machine->save();
        // Muestro mensaje
        flash('La máquina ' .$machine->name. ' modificó su imágen correctamente!')->success();
        // Retorno a la vista correspondiente
        return redirect()->route('machines.index');

    }
}
