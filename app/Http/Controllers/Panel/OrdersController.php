<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\OrderRequest;

use App\Models\Product;

use App\Models\OutputProduct;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     * Metodo que muestra los pedidos del usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los outputproduct
        $myorders = OutputProduct::where('user_id', \Auth::user()->id)->orderBy('output_date', 'DESC')->get();

        // Retorno a la vista
        return view('panel.orders.myorders', compact('myorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Me traigo todos los productos y los págino
        $products = Product::search($request->name)->orderBy('name', 'ASC')->paginate(12);
        // Retorno la vista correspondiente
        return view('panel.orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // Busco el producto solicitado por el request
        $product = Product::find($request->product_id);
        if ( ($product->stock - $request->quantity) >= 0 ) 
        {
            // Creo una nueva instacia de outputproduct con los datos del request
            $outputproduct = new OutputProduct($request->all());
            $outputproduct->output_date = date('Y-m-d G:i:s');
            $outputproduct->user_id = \Auth::user()->id;
            $outputproduct->statusoutput_id = 1;
            // Guardo outputproduct
            $outputproduct->save();

            // Actualizo el stock del producto
            $product->stock = $product->stock - $outputproduct->quantity;
            // Guardo el producto
            $product->save();

            // Notificación para Slack //
            $msj = '*Realizó* un nuevo pedido de producto *'.$product->name.'* solicitando: *'. $outputproduct->quantity .' unidad/es* su stock se actualizó a: *'.$product->stock.'*. El área a la que pertenece *'. \Auth::user()->name .'* es *'. $outputproduct->user->area->name.'*';
            $this->slackNotification($msj);

            // Muestro msj correspondiente
            flash('El producto "' .$product->name. '" a sido reservado ¡correctamente!. El mismo quedará reservado por 5 días aprox. hasta que "'.\Auth::user()->name. '" pase a retirarlo por el Centro de Cómputos o hasta agotar stock.')->success();

        }
        else 
        {
            flash('El producto "' .$product->name. '" no posee el stock solicitado. Su stock actual es de "'.$product->stock.'".')->error();
        }

        // Redirecciono a la vista correspondiente
        return redirect()->route('orders.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco el order
        $order = OutputProduct::findOrFail($id);

        if ( $order->user_id == \Auth::user()->id)
        {
            // Retorno la vista
            return view('panel.orders.show', compact('order'));
        }
        else {
            // Retorno la vista
            return view('errors.401');
        }
        
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
    public function update(OrderRequest $request, $id)
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
                $outputproduct->user_id = \Auth::user()->id;
                // Estado del producto entregado
                $outputproduct->statusoutput_id = 1;
                $outputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* el pedido de *'.$product_old->name. '* solicitado anteriormente y su stock actual es de *'.$product_old->stock.'* y lo cambia por *'.$product->name.'* actualizando su stock a *'.$product->stock.'* de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();
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
                // Estado del producto entregado
                $outputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* los datos del pedido de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma ¡exitosa!')->success();
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
                    $outputproduct->user_id = \Auth::user()->id;
                    // Estado del producto entregado
                    $outputproduct->statusoutput_id = 1;
                    $outputproduct->save();

                    // Notificación para Slack //
                    $msj = '*Modificó* el pedido del producto *'.$product->name.'* solicitando *'. $outputproduct->quantity .'* unidad/es y actualizando su stock a *'.$product->stock.'* de la fecha *'.date('d-m-Y h:i', strtotime($outputproduct->output_date)).'*';
                    $this->slackNotification($msj);

                    // Muestro msj correspondiente
                    flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($outputproduct->output_date)). '" se registró de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();
                } 
                else 
                {
                    flash('El producto "' .$product->name. '" no posee el stock necesario para realizar la operación')->error();
                }
            }
            
        }

        // Redirecciono a la vista correspondiente
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco la orden
        $order = OutputProduct::find($id);
        // Busco el producto con el id que registre en la orden
        $product = Product::find($order->product_id);
        // Devuelvo el stock
        $product->stock = $product->stock + $order->quantity;
        // Guardo los cambios de stock del producto
        $product->save();

        // Elimino la orden
        $order->delete();

        // Notificación para Slack //
        $msj = '*Eliminó* el pedido de la fecha *'.date('d-m-Y h:i', strtotime($order->output_date)).'* devuelve stock del producto *'.$product->name. '* solicitado anteriormente y su stock actual es de *'.$product->stock.'*';
        $this->slackNotification($msj);
        
        // Muestro msj correspondiente
        flash('El egreso de la fecha "' .date('d-m-Y h:i', strtotime($order->output_date)). '" fue eliminado de forma ¡exitosa!.')->success();

        // Redirecciono a la vista correspondiente
        return redirect()->route('orders.index');
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
