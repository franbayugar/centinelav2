<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Area;

use App\Models\User;

// Validaciones
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserChangePasswordUpdateRequest;

class ProfilesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ( $id == \Auth::user()->id)
        {
            // Busco al usuario
            $user = User::findOrFail($id);
            // Me traigo todas las áreas
            $areas = Area::orderBy('name', 'ASC')->pluck('name', 'id')->all();
            // Retorno vista
            return view('panel.generalparameters.profiles.edit', compact('areas', 'user'));
        }
        else
        {
            // Retorno la vista
            return view('errors.401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, $id)
    {
        // Busco al usuario
        $user = User::find($id);
        // Cargo datos que vienen del request
        $user->fill($request->all());
        // Guardo los datos
        $user->save();

        // Notificación para Slack //
        $msj = '*Actualizó* los datos de su perfil.';
        $this->slackNotification($msj);
        
        // Muestro msj correspondiente
        flash('Sus datos han sido actualizados correctamente. muchas gracias por mantener sus datos actualizados!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('dashboard');
    }

    /*
    *   Metodo que cambia la contraseña del usuario
    */
    public function changePassword(UserChangePasswordUpdateRequest $request, $id)
    {
        // Busco al usuario
        $user = User::findOrFail($id);
        // Encripto la contraseña
        $user->password = bcrypt($request->pass);
        // Guardo los datos
        $user->save();

        // Notificación para Slack //
        $msj = '*Modificó* su contraseña.';
        $this->slackNotification($msj);

        // Muestro msj correspondiente
        flash('Su contraseña ha sido modificada de forma exitosa.')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('dashboard');
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
}
