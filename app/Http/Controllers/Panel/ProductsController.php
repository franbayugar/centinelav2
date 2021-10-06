<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todos los products
        $products = Product::all();
        
        // Retorno vista
        return view('panel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno la vista correspondiente
        return view('panel.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product($request->all());
        
        // Manipulacion de imagenes
        if ($request->file('image'))
        {
            $file = $request->file('image');
            // Creo un nombre unico para la imagen asi evito colisiones
            $name = str_slug($request->name, "-").time(). '.' . $file->getClientOriginalExtension();
            // Obtengo la direccion exacta donde se encuentra el proyecto
            $path = public_path() .'/img/products/';
            // Metodo con el cual guarda la imagen
            $file->move($path, $name);
            // Guardo el nombre de la imagen
            $product->image = $name;
        }
        // Inicializo el stock
        $product->stock = 0;
        // Guardo el producto
        $product->save();
        // Muestro mensaje correspondiente
        flash('El producto "' .$product->name. '" se ha creado con exito!')->success();
        // Redirecciono a la vista que muestra todos los articulos
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busco el producto
        $product = Product::find($id);
        // Retorno la vista correspondiente
        return view('panel.products.show', compact('product'));
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
    public function update(ProductUpdateRequest $request, $id)
    {
        // Busco el producto
        $product = Product::find($id);
        // Si el formulario envia logo1
        if ($request->file('image'))
        {
            // Borrar anterior imagen
            // Si existe imagen que seguramente exista entra y la elimina
            if ( \File::exists( public_path() .'/img/products/'. $product->image ) ) 
            {
                \File::delete( public_path() .'/img/products/'. $product->image );
            }
            else
            {
                flash('La imagen ' .$product->image. ' del producto ' .$product->name. ' no existe!')->error();
            }

            // Subir nueva imagen
            $file = $request->file('image');
            // Creo un nombre unico para la imagen asi evito colisiones
            $name = str_slug($request->name, "-").time(). '.' . $file->getClientOriginalExtension();
            // Obtengo la direccion exacta donde se encuentra el proyecto
            $path = public_path() .'/img/products/';
            // Metodo con el cual guarda la imagen
            $file->move($path, $name);
            // Guardo el nombre de la imagen
            $product->image = $name;
        }
        // Actualizo los demas datos
        $product->name = $request->name;
        $product->description = $request->description;
        // Guardo los datos
        $product->save();
        // Muestro mensaje
        flash('El producto ' .$product->name. ' se ha modificado con exito!')->success();
        // Retorno a la vista correspondiente
        return redirect()->route('products.index');
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
            // Busco el producto a eliminar
            $product = Product::find($id);
            // Si existe imagen que seguramente exista entra y la elimina
            if ( \File::exists( public_path() .'/img/products/'. $product->image ) ) 
            {
                \File::delete( public_path() .'/img/products/'. $product->image );
            }
            else
            {
                flash('La imagen ' .$product->image. ' del producto ' .$product->name. ' no existe!')->error();
            }
            // Elimino el producto
            $product->delete();
            // Muestro mensaje correspondiente
            flash('El producto ' .$product->name. ' se ha eliminado con exito!')->success();
            // Redirecciono a la vista que muestra todos los articulos
            return redirect()->route('products.index');
        }
        catch (\Exception $e)
        {
            // Muestro mensaje correspondiente
            flash('El producto ' .$product->name. ' posee referencias en otras tablas por está razón no será eliminado')->error();
            // Redirecciono a la vista que muestra todos los articulos
            return redirect()->route('products.index');
        }
        
    }

    public function withoutImage($id)
    {
        // Busco el producto
        $product = Product::findOrFail($id);
        $product->image = null;
        $product->save();
        // Muestro mensaje
        flash('El producto ' .$product->name. ' modificó su imágen correctamente!')->success();
        // Retorno a la vista correspondiente
        return redirect()->route('products.index');

    }
}
