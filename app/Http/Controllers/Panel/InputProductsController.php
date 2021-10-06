<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\InputProductRequest;

use App\Models\InputProduct;

use App\Models\Product;

class InputProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los inputproduct
        $inputproducts = InputProduct::orderBy('input_date', 'DESC')->get();

        // Retorno a la vista
        return view('panel.inputproducts.index', compact('inputproducts'));
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

        // Retorno vista
        return view('panel.inputproducts.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InputProductRequest $request)
    {
        // Creo una nueva instacia de inputproducts con los datos del request
        $inputproduct = new InputProduct($request->all());
        // Guardo inputproduct
        $inputproduct->save();
        // Busco el producto cargado en el ingreso
        $product = Product::find($inputproduct->product_id);
        // Actualizo el stock del producto
        $product->stock = $product->stock + $inputproduct->quantity;
        // Guardo el producto
        $product->save();

        // Muestro msj correspondiente
        flash('El ingreso de la fecha "' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '" se registró de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();

        // Notificación para Slack //
        $msj = '*Registró* un nuevo ingreso del producto *'.$product->name.'* su stock actual es: *'.$product->stock.'*';
        $this->slackNotification($msj);

        // Redirecciono a la vista correspondiente
        return redirect()->route('inputproducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco el inputproduct
        $inputproduct = InputProduct::find($id);
        // Me traigo todos los productos
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        // Retorno la vista
        return view('panel.inputproducts.show', compact('inputproduct', 'products'));
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
    public function update(InputProductRequest $request, $id)
    {
        // Busco la entrada
        $inputproduct = InputProduct::find($id);
        // Si son distintos productos
        if ( $request->product_id != $inputproduct->product_id )
        {
            $product_old = Product::find($inputproduct->product_id);
            if ($product_old->stock >= $request->quantity)
            {
                // Busco el producto que me solicitan
                $product = Product::find($request->product_id);
                // Actualizo el stock
                $product->stock = $product->stock + $inputproduct->quantity;
                $product->save();

                // Reestablezco el stock del producto
                $product_old->stock = $product_old->stock - $request->quantity;
                $product_old->save();

                // Actualizo los valores del ingreso
                $inputproduct->fill($request->all());
                $inputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* el ingreso de la fecha *' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '*. El producto *' .$product->name. '* actualizó su stock a *'.$product->stock.'* y el producto *'.$product_old->name.'* reestableció su stock a *'.$product_old->stock.'*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El ingreso de la fecha "' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '" se modificó de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a "'.$product->stock.'" y el producto "'.$product_old->name.'" reestableció su stock a "'.$product_old->stock.'"')->success();

            }
            else
            {
                // Muestro msj correspondiente
                flash('El producto no posee el stock necesario para realizar la operación')->error();
            }

        }
        else
        {
            // Si es el mismo producto que quiero agregarle más stock
            if ( $request->quantity > $inputproduct->quantity)
            {
                // Busco el producto que me solicitan
                $product = Product::find($request->product_id);
                // Resto la cantidad anterior para luego sumarle la verdadera actualización del stock
                $product->stock = ($product->stock - $inputproduct->quantity) + $request->quantity;
                $product->save();

                // Actualizo los valores del ingreso
                $inputproduct->fill($request->all());
                $inputproduct->save();

                // Muestro msj correspondiente
                flash('El ingreso de la fecha "' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '" se modificó de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a "'.$product->stock.'"')->success();

                // Notificación para Slack //
                $msj = '*Modificó* el ingreso de la fecha *' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '*. El producto *' .$product->name. '* actualizó su stock a *'.$product->stock.'*';
                $this->slackNotification($msj);

            }
            // Si la cantidad que me solicitan es menor a lo que ya habia registrado
            elseif ($request->quantity < $inputproduct->quantity)
            {
                // Busco el producto que me solicitan
                $product = Product::find($request->product_id);
                // Devuelvo la cantidad que habia registrado para despues poder restar correctamente
                $product->stock = $product->stock - ($inputproduct->quantity - $request->quantity);
                $product->save();

                // Actualizo los valores del ingreso
                $inputproduct->fill($request->all());
                $inputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* el ingreso de la fecha *' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '*. El producto *' .$product->name. '* actualizó su stock a *'.$product->stock.'*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El ingreso de la fecha "' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '" se modificó de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a "'.$product->stock.'"')->success();
            }
            else
            {
                // Actualizo los valores del ingreso
                $inputproduct->fill($request->all());
                $inputproduct->save();

                // Notificación para Slack //
                $msj = '*Modificó* el ingreso de la fecha *' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '*';
                $this->slackNotification($msj);

                // Muestro msj correspondiente
                flash('El ingreso de la fecha "' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '" se modificó de forma ¡exitosa!')->success();
            }
        }

        // Redirecciono a la vista correspondiente
        return redirect()->route('inputproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el ingreso
        $inputproduct = InputProduct::find($id);
        // Busco el producto con el id que registre en el ingreso
        $product = Product::find($inputproduct->product_id);
        // preguntó para que el producto no quede con stock negativo
        if ( $product->stock - $inputproduct->quantity >= 0 ) {
            // Revierto los cambios del stock
            $product->stock = $product->stock - $inputproduct->quantity;
            // Guardo los cambios de stock del producto
            $product->save();

            // Elimino el ingreso
            $inputproduct->delete();

            // Notificación para Slack //
            $msj = '*Eliminó* el ingreso del producto *'.$product->name.'* su stock actual es: *'.$product->stock.'*';
            $this->slackNotification($msj);

            // Muestro msj correspondiente
            flash('El ingreso de la fecha "' .date('d-m-Y h:i', strtotime($inputproduct->input_date)). '" fue eliminado de forma ¡exitosa!. El producto "' .$product->name. '" actualizó su stock a '.$product->stock)->success();
        }
        else {
            flash('El stock del producto "' .$product->name. '" no puede ser menor a 0. Verifique que sea el ingreso correcto a eliminar.')->error();
        }

        // Redirecciono a la vista correspondiente
        return redirect()->route('inputproducts.index');
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
