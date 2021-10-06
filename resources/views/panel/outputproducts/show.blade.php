@extends('templates.panel-template')

@section('title-head', 'Ver egreso')

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
        <i class="fa fa-level-up"></i> Detalle/Modificar
        <small>{{ $outputproduct->product->name }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Egresos</li>
        <li><a href="{{ route('outputproducts.index') }}">Listado</a></li>
        <li class="active">{{ $outputproduct->product->name }}</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">

    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle del egreso</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                {{-- Imagen del producto --}}
                @if ( $outputproduct->product->image != null )
                    <div class="thumbnail">
                        <img src="{{ asset('img/products/' . $outputproduct->product->image ) }}" alt="{{$outputproduct->product->image}}">
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
        
                <p class="text-muted">{!! date('d-m-Y', strtotime($outputproduct->output_date)) !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-clock-o margin-r-5"></i> 
                    Hora
                </strong>
        
                <p class="text-muted">{!! date('H:i', strtotime($outputproduct->output_date)) !!}</p>
        
                <hr>

                <strong>
                    <i class="fa fa-cube margin-r-5"></i> 
                    Producto
                </strong>
        
                <p class="text-muted">{!! $outputproduct->product->name !!}</p>
        
                <hr>
        
                <strong>
                    <i class="fa fa-cubes margin-r-5"></i> 
                    Cantidad
                </strong>
        
                <p class="text-muted">{!! $outputproduct->quantity !!}</p>
        
                <hr>

                <strong><i class="fa fa-user margin-r-5"></i> Solicitado por</strong>

                <p class="text-muted">
                    {!! $outputproduct->user->lastname !!}, {!! $outputproduct->user->name !!}
                </p>

                <hr>

                <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>

                <p class="text-muted">
                    {!! $outputproduct->user->phone !!}
                </p>

                <hr>

                <strong><i class="fa fa-sitemap margin-r-5"></i> Área</strong>

                <p class="text-muted">
                    {!! $outputproduct->user->area->name !!}
                </p>

                <hr>
        
                @if ( $outputproduct->description != null )
                    <strong><i class="fa fa-commenting-o margin-r-5"></i> Descripción</strong>

                    <p class="text-muted">
                        {!! $outputproduct->description !!}
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
                            <p>Está seguro que desea eliminar el ingreso de <b>"{!! $outputproduct->product->name !!}"</b> de la fecha <b>"{!! date('d-m-Y', strtotime($outputproduct->output_date)) !!}"</b>?</p>

                            <p><strong>Importante: </strong>verifique que sea el egreso correspondiente, ya que devolvera el stock al producto "{{$outputproduct->product->name}}".</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['outputproducts.destroy', $outputproduct->id], 'method' => 'DELETE']) }}
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
                {!! Form::open(['route' => ['outputproducts.update', $outputproduct->id], 'method' => 'PUT']) !!}
                <div class="box-body">

                    <div class="row">
                        {{-- Usuario --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('user_id', 'Solicita') !!}
                                <select class="form-control select-simple" id="user_id" name="user_id">
                                    @foreach ( $users as $user )
                                        @if ( $outputproduct->user_id == $user->id)
                                            <option value="{{ $user->id }}" selected>{{ $user->lastname }}, {{ $user->name }} ({{ $user->area->name }})</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }} ({{ $user->area->name }})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Producto --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('product_id', 'Producto') !!}
                                {!! Form::select('product_id', $products, $outputproduct->product->id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar producto -', 'data-validation' => 'required', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        {{-- Cantidad --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('quantity', 'Cantidad') !!}
                                {!! Form::text('quantity', $outputproduct->quantity, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'data-validation' => 'number', 'data-validation-allowing' => 'range[1;999]']) !!}
                            </div>
                        </div>
                        {{-- Fecha --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('output_date', 'Fecha') !!}
                                {!! Form::text('output_date', $outputproduct->output_date, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'data-validation' => 'required', 'required']) !!}
                            </div>
                        </div>
                    </div>                    

                    {{-- Description --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', 'Descripción') !!}
                                {!! Form::textarea('description', $outputproduct->description, ['class' => 'form-control', 'data-validation' => 'required']) !!}
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