<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\OutputProductRequest;

use App\Models\OutputProduct;

use App\Models\Product;

use App\Models\User;

class OutputProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los outputproduct
        $outputproducts = OutputProduct::where('statusoutput_id', 2)->orderBy('output_date', 'DESC')->get();

        // Retorno a la vista
        return view('panel.outputproducts.index', compact('outputproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Me traigo todos los productos
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id')->all();

        // Me traigo todos los usuarios
        $users = User::orderBy('lastname', 'ASC')->get();

        // Retorno vista
        return view('panel.outputproducts.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutputProductRequest $request)
    {
        // Busco el producto solicitado por el request
        $product = Product::find($request->product_id);
        if ( ($product->stock - $request->quantity) >= 0 ) 
        {
            // Creo una nueva instacia de outputproduct con los datos del request
            $outputproduct = new OutputProduct($request->all());
            // Estado del producto entregado
            $outputproduct->statusoutput_id = 2;
            // Guardo outputproduct
            $outputproduct->save();

            // Actualizo el stock del producto
            $product->stock = $product->stock - $outputproduct->quantity;
            // Guardo el producto
            $product->save();

            // Notificación para Slack
            $msj = '*Registró* un nuevo egreso de *'. $request->quantity .' unidad/es* del producto *'.$product->name.'* por el usuario: *'. $outputproduct->user->name .' '.$outputproduct->user->lastname.'* de *'. $outputproduct->user->area->name .'* su stock actual es: *'.$product->stock.'*';
            $this->slackNotification($msj);

            // Muestro msj correspondiente
            flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();
        }
        else 
        {
            flash('El stock del producto "' .$product->name. '" no puede ser menor a 0. Verifique que sea el egreso correcto.')->error();
        }

        // Redirecciono a la vista correspondiente
        return redirect()->route('outputproducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco el outputproduct
        $outputproduct = OutputProduct::find($id);
        // Me traigo todos los productos
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Me traigo todos los usuarios
        $users = User::orderBy('lastname', 'ASC')->get();
        // Retorno la vista
        return view('panel.outputproducts.show', compact('outputproduct', 'products', 'users'));
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
    public function update(OutputProductRequest $request, $id)
    {
        // Busco la salida
        $outputproduct = OutputProduct::find($id);
        // Si son distintos productos
        if ( $request->product_id != $outputproduct->product_id )
        {
            // Busco el producto
            $product = Product::find($request->product_id);
            if ($product->stock >= $request->quantity)
            {
                // Posee stock
                $product->stock = $product->stock - $request->quantity;
                $product->save();

                // Busco producto a devolver stock
                $product_old = Product::find($outputproduct->product_id);
                // Deve devolver el stock
                $product_old->stock = $product_old->stock + $outputproduct->quantity;
                $product_old->save();

                $outputproduct->fill($request->all());
                $outputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* el egreso del usuario *'.$outputproduct->user->name. ' ' .$outputproduct->user->lastname. '* de *'. $outputproduct->user->area->name .'* devuelve stock del producto *'.$product_old->name. '* solicitado anteriormente y su stock actual es de *'.$product_old->stock.'* y lo cambia por *'.$product->name.'* actualizando su stock a *'.$product->stock.'* de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();
            }
            else
            {
                flash('El producto "' .$product->name. '" no posee el stock necesario para realizar la operación')->error();
            }
        } else 
        {
            // Si es el mismo producto a modificar
            // Busco el producto
            $product = Product::find($request->product_id);
            // Si las cantidades son las mismas solo actualizo los datos
            if ( $outputproduct->quantity == $request->quantity )
            {
                $outputproduct->fill($request->all());
                $outputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* los datos del egreso del usuario *'.$outputproduct->user->name. ' ' .$outputproduct->user->lastname. '* de *'. $outputproduct->user->area->name .'* de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma exitosa!')->success();
            }
            else 
            {
                // Entra acá si pide más stock del mismo producto solicitado
                // Si devolviendo stock, todavia poseo stock
                if ($product->stock + $outputproduct->quantity >= $request->quantity)
                {
                    // Devuelvo stock
                    $product->stock = $product->stock + $outputproduct->quantity;
                    $product->save();
                    // Resto y actualizo stock
                    $product->stock = $product->stock - $request->quantity;
                    $product->save();

                    $outputproduct->fill($request->all());
                    $outputproduct->save();

                    // Notificación para Slack //
                    $msj = '*Modificó* el egreso del usuario *'.$outputproduct->user->name. ' ' .$outputproduct->user->lastname. '* de *'. $outputproduct->user->area->name .'* del producto *'.$product->name.'* actualizando su stock a *'.$product->stock.'* de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'*';
                    $this->slackNotification($msj);

                    // Muestro msj correspondiente
                    flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();
                } 
                else 
                {
                    flash('El producto "' .$product->name. '" no posee el stock necesario para realizar la operación')->error();
                }
            }
            
        }

        // Redirecciono a la vista correspondiente
        return redirect()->route('outputproducts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el egreso
        $outputproduct = OutputProduct::find($id);
        // Busco el producto con el id que registre en el egreso
        $product = Product::find($outputproduct->product_id);
        // Devuelvo el stock
        $product->stock = $product->stock + $outputproduct->quantity;
        // Guardo los cambios de stock del producto
        $product->save();

        // Elimino el egreso
        $outputproduct->delete();

        // Mensaje para slack
        $msj = '*Eliminó* el egreso de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'* del usuario *'.$outputproduct->user->name. ' ' .$outputproduct->user->lastname. '* de *'. $outputproduct->user->area->name .'* devuelve stock del producto *'.$product->name. '* solicitado anteriormente y su stock actual es de *'.$product->stock.'*';
        $this->slackNotification($msj);

        // Muestro msj correspondiente
        flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" fue eliminado de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();

        // Redirecciono a la vista correspondiente
        return redirect()->route('outputproducts.index');
    }

    /*
    *   Devuelve listado de pedidos reservados
    */
    public function reservedOrders() 
    {
        // Busco todos los outputproduct
        $outputproducts = OutputProduct::where('statusoutput_id', 1)->orderBy('output_date', 'DESC')->get();

        // Retorno a la vista
        return view('panel.outputproducts.reservedorders', compact('outputproducts'));
    }

    /*
    *   Devuelve listado de pedidos cancelados
    */
    public function canceledOrders() 
    {
        // Busco todos los outputproduct
        $outputproducts = OutputProduct::where('statusoutput_id', 3)->orderBy('output_date', 'DESC')->get();

        // Retorno a la vista
        return view('panel.outputproducts.canceledorders', compact('outputproducts'));
    }

    /*
    *   Metodo que confirma la salida del producto
    */
    public function confirmOrder($id)
    {
        // Busco la orden
        $outputproduct = OutputProduct::find($id);
        // Actualizo su estado a entregado
        $outputproduct->statusoutput_id = 2;
        // Guardo la outputproduct
        $outputproduct->save();

        // Notificación para Slack //
        $msj = '*Confirmó* el pedido de *'. $outputproduct->quantity .'* unidad/es *'. $outputproduct->product->name .'* de *'. $outputproduct->user->name . ' ' . $outputproduct->user->lastname .' ('.$outputproduct->user->area->name.')* de la fecha *' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '*';
        $this->slackNotification($msj);

        // Muestro msj correspondiente
        flash('El pedido de "'. $outputproduct->quantity .'" unidad/es "'. $outputproduct->product->name .'" de "'. $outputproduct->user->name . ' ' . $outputproduct->user->lastname .' ('.$outputproduct->user->area->name.')" de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" fue confirmado con ¡éxito!')->success();

        // Redirecciono a la vista correspondiente
        return redirect()->route('reservedorders');
    }

    /*
    *   Metodo que confirma la salida del producto
    */
    public function cancelOrder($id)
    {
        // Busco el pedido
        $outputproduct = OutputProduct::find($id);
        // Busco el producto con el id que registre en el pedido
        $product = Product::find($outputproduct->product_id);
        // Devuelvo el stock
        $product->stock = $product->stock + $outputproduct->quantity;
        // Guardo los cambios de stock del producto
        $product->save();

        // Actualizo su estado a cancelado
        $outputproduct->statusoutput_id = 3;

        // Guardo la salida del product
        $outputproduct->save();

        // Notificación para Slack //
        $msj = '*Canceló* el pedido de *'. $outputproduct->quantity .'* unidad/es *'. $outputproduct->product->name .'* de *'. $outputproduct->user->name . ' ' . $outputproduct->user->lastname .' ('.$outputproduct->user->area->name.')* de la fecha *' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '* fue cancelado con ¡éxito!. Y el mismo actualizó su stock a *'. $product->stock. '*';
        $this->slackNotification($msj);

        // Muestro msj correspondiente
        flash('El pedido de "'. $outputproduct->quantity .'" unidad/es "'. $outputproduct->product->name .'" de "'. $outputproduct->user->name . ' ' . $outputproduct->user->lastname .' ('.$outputproduct->user->area->name.')" de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" fue cancelado con ¡éxito!. Y el mismo actualizó su stock a "'. $product->stock. '"')->success();

        // Redirecciono a la vista correspondiente
        return redirect()->route('reservedorders');
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
