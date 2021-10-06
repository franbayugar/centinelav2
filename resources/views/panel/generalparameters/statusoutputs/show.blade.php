@extends('templates.panel-template')

@section('title-head', 'Ver estado de salida')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-retweet"></i> Detalle/Modificar
        <small>Estados de Salida</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Estados de Salida</li>
        <li><a href="{{ route('statusoutputs.index') }}">Listado</a></li>
        <li class="active">Detalle/Modificar</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">

    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle del estado</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="fa fa-pencil margin-r-5"></i> Nombre</strong>

            <p class="text-muted">
                {{ $statusoutput->name }}
            </p>

            <hr>

            <strong><i class="fa fa-circle-o margin-r-5"></i> Color</strong>

            <p class="text-muted">
                {{ $statusoutput->color }}
            </p>

            <hr>

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
                        <p>Está seguro que desea eliminar el estado de salida <b>"{{ $statusoutput->name }}"</b>?</p>
                    </div>
                    <div class="modal-footer">

                        {{ Form::open(['route' => ['statusoutputs.destroy', $statusoutput->id], 'method' => 'DELETE']) }}
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

                {!! Form::open(['route' => ['statusoutputs.update', $statusoutput->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    {{-- Nombre --}}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', $statusoutput->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                    </div>

                    
                    {{-- Color --}}
                    <div class="form-group">
                        {!! Form::label('color', 'Color') !!}
                        {!! Form::text('color', $statusoutput->color, ['class' => 'form-control', 'placeholder' => 'Ingrese color', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                        <p class="help-block">Ej: text-danger</p>
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

@endsection