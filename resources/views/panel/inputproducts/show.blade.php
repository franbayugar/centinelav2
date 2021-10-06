@extends('templates.panel-template')

@section('title-head', 'Ver ingreso')

@section('head')
    
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

    {{-- Estilos necesarios para chosen --}}
    @include('panel.partials.heads.chosen-styles')

    {{-- Estilos para datetimepicker --}}
    @include('panel.partials.heads.datetimepicker-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-level-down"></i> Detalle/Modificar
        <small>{{ $inputproduct->product->name }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ingresos</li>
        <li><a href="{{ route('inputproducts.index') }}">Listado</a></li>
        <li class="active">{{ $inputproduct->product->name }}</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">

    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle del ingreso</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                {{-- Imagen del producto --}}
                @if ( $inputproduct->product->image != null )
                    <div class="thumbnail">
                        <img src="{{ asset('img/products/' . $inputproduct->product->image ) }}" alt="{{$inputproduct->product->image}}">
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
        
                <p class="text-muted">{!! date('d-m-Y', strtotime($inputproduct->input_date)) !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-clock-o margin-r-5"></i> 
                    Hora
                </strong>
        
                <p class="text-muted">{!! date('H:i', strtotime($inputproduct->input_date)) !!}</p>
        
                <hr>

                <strong>
                    <i class="fa fa-cube margin-r-5"></i> 
                    Producto
                </strong>
        
                <p class="text-muted">{!! $inputproduct->product->name !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-cubes margin-r-5"></i> 
                    Cantidad
                </strong>
        
                <p class="text-muted">{!! $inputproduct->quantity !!}</p>
        
                <hr>
        
                @if ( $inputproduct->description != null )
                    <strong><i class="fa fa-commenting-o margin-r-5"></i> Descripción</strong>

                    <p class="text-muted">
                        {!! $inputproduct->description !!}
                    </p>

                    <hr>
                @endif

                {{-- Boton eliminar usuario --}}
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
                            <p>Está seguro que desea eliminar el ingreso de <b>"{!! $inputproduct->product->name !!}"</b> de la fecha <b>"{!! date('d-m-Y', strtotime($inputproduct->input_date)) !!}"</b>?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['inputproducts.destroy', $inputproduct->id], 'method' => 'DELETE']) }}
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

    <div class="col-md-9">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Modificar</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="settings">

                {{-- form start --}}
                {!! Form::open(['route' => ['inputproducts.update', $inputproduct->id], 'method' => 'PUT']) !!}
                <div class="box-body">

                    <div class="row">
                        {{-- Producto --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('product_id', 'Producto') !!}
                                {!! Form::select('product_id', $products, $inputproduct->product_id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar producto -', 'data-validation' => 'required', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            {{-- Cantidad --}}
                            <div class="form-group">
                                {!! Form::label('quantity', 'Cantidad') !!}
                                {!! Form::text('quantity', $inputproduct->quantity, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'data-validation' => 'number', 'data-validation-allowing' => 'range[1;999]']) !!}
                            </div>
                            
                        </div>

                        <div class="col-md-4">
                            {{-- Fecha --}}
                            <div class="form-group">
                                {!! Form::label('input_date', 'Fecha') !!}
                                {!! Form::text('input_date', $inputproduct->input_date, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'data-validation' => 'required', 'required']) !!}
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        {{-- Description --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', 'Descripción') !!}
                                {!! Form::textarea('description', $inputproduct->description, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            {{-- /.tab-pane --}}
        </div>
        {{-- /.tab-content --}}
        </div>
        {{-- /.nav-tabs-custom --}}
    </div>
    {{-- /.col --}}

</div>
{{-- /.row --}}

@endsection

@section('script')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

    {{-- Scripts necesarios para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker')

@endsection