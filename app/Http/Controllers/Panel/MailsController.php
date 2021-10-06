<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\MailStoreRequest;
use App\Http\Requests\MailUpdateRequest;

use App\Models\Area;

use App\Models\Mail;

use Illuminate\Support\Facades\Crypt;

class MailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los mails
        $mails = Mail::all();
        
        // Retorno vista
        return view('panel.mails.index', compact('mails'));
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
        // Retorno la vista correspondiente
        return view('panel.mails.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MailStoreRequest $request)
    {
        // Creo una nueva instacia de mail con los datos del request
        $mail = new Mail($request->all());
        // Si la contraseña no es null la encripto
        if ($request->password != null ) {
            $mail->password = Crypt::encrypt($request->password);
        }
        // Guardo el mail
        $mail->save();
        // Muestro msj correspondiente
        flash('Se ha registrado "' .$mail->email. '" de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('mails.index');
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
        // Busco el mail
        $mail = Mail::find($id);
        // Retorno la vista
        return view('panel.mails.show', compact('mail', 'areas'));
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
    public function update(MailUpdateRequest $request, $id)
    {
        // Busco el mail correspondiente
        $mail = Mail::find($id);
        // Cargo datos que vienen del request
        $mail->fill($request->all());
        // Si la contraseña no es null la encripto
        if ($request->password != null ) {
            $mail->password = Crypt::encrypt($request->password);
        }
        // Guardo los datos
        $mail->save();
        // Muestro msj correspondiente
        flash('El mail "' .$mail->email. '" ha sido modificado de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('mails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el mail
        $mail = Mail::find($id);
        // Elimino el mail
        $mail->delete();
        // Muestro el msj correspondiente
        flash('El mail "' .$mail->email. '" ha sido eliminada de forma exitosa!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('mails.index')->with("deleted" , $id );
    }
}
