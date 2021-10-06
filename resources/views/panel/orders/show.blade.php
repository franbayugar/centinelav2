@extends('templates.panel-template')

@section('title-head', 'Mi pedido')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-shopping-cart"></i> Detalle/Modificar
        <small>Mi pedido</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pedidos</li>
        <li><a href="{{ route('orders.index') }}"> Mis pedidos</a></li>
        <li class="active">Pedido {{ $order->id }}</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">
    
    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle del pedido</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                {{-- Imagen del producto --}}
                @if ( $order->product->image != null )
                    <div class="thumbnail">
                        <img src="{{ asset('img/products/' . $order->product->image ) }}" alt="{{$order->product->image}}">
                    </div>
                @else
                    <div class="thumbnail">
                        <img src="{{ asset('AdminLTE/img/producto-sin-foto.png') }}" alt="sin foto">
                    </div>
                @endif

                <strong>
                    <i class="fa fa-calendar margin-r-5"></i> 
                    Fecha
                </strong>
        
                <p class="text-muted">{!! date('d-m-Y', strtotime($order->output_date)) !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-clock-o margin-r-5"></i> 
                    Hora
                </strong>
        
                <p class="text-muted">{!! date('H:i', strtotime($order->output_date)) !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-cube margin-r-5"></i> 
                    Producto
                </strong>
        
                <p class="text-muted">{!! $order->product->name !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-cubes margin-r-5"></i> 
                    Cantidad
                </strong>
        
                <p class="text-muted">{!! $order->quantity !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-refresh margin-r-5"></i> 
                    Estado
                </strong>
        
                <p class="{!! $order->statusoutput->color !!}">{!! $order->statusoutput->name !!}</p>

                @if ( $order->statusoutput_id == 1 )
                    <hr>
                    {{-- Boton eliminar producto --}}
                    <a href="#" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal"><b>Eliminar</b></a>
                @endif

                {{-- Modal --}}
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        {{-- Modal content --}}
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Alerta!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Está seguro que desea eliminar?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Sí', ['class' => 'btn btn-danger btn-sm btn-sm']) }}

                                <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">No</button>
                            {{ Form::close() }}

                        </div>
                        </div>

                    </div>
                </div>
                
            </div>{{-- /.box-body --}}
        </div>{{-- /.box --}}

    </div>
    {{-- /.col --}}

    {{-- Formulario para editar productos --}}
    @include('panel.orders.partials.edit')

</div>
{{-- /.row --}}

@endsection

@section('script')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

@endsection