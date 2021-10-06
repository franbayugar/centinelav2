@extends('templates.panel-template')

@section('title-head', 'Ver producto')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-shopping-cart"></i> Detalle/Modificar
        <small>{{ $product->name }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Productos</li>
        <li><a href="{{ route('products.index') }}">Listado</a></li>
        <li class="active">{{ $product->name }}</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">

    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle del producto</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                {{-- Imagen del producto --}}
                @if ( $product->image != null )
                    <div class="thumbnail">
                        <img src="{{ asset('img/products/' . $product->image ) }}" alt="Imagen de {{ $product->name }}">
                    </div>
                @else
                    <div class="thumbnail">
                        <img src="{{ asset('AdminLTE/img/producto-sin-foto.png') }}" alt="Imagen de {{ $product->name }}">
                    </div>
                @endif

                <strong>
                    <i class="fa fa-cube margin-r-5"></i> 
                    Nombre
                </strong>

                <p class="text-muted">{{ $product->name }}</p>

                <hr>

                <strong>
                    <i class="fa fa-cubes margin-r-5"></i> 
                    Stock
                </strong>

                <p class="text-muted">{!! $product->stock !!}</p>

                <hr>

                @if ( $product->description != null )
                    <strong><i class="fa fa-commenting-o margin-r-5"></i> Descripción</strong>
                    <br><br>
                    <p class="text-muted">{!! $product->description !!}</p>

                    <hr>
                @endif

                <a href="{{ route('products.withoutimage', $product->id) }}" class="btn btn-primary btn-block"><b>Sin imágen</b></a>

                {{-- Boton eliminar producto --}}
                <a href="#" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal"><b>Eliminar</b></a>

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
                            <p>Está seguro que desea eliminar el producto <b>"{{$product->name}}"</b>?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) }}
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
    @include('panel.products.partials.edit')

</div>
{{-- /.row --}}

@endsection

@section('script')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')


@endsection