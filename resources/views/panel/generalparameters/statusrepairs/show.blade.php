@extends('templates.panel-template')

@section('title-head', 'Ver estado de reparación')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-cogs"></i> Detalle/Modificar
        <small>Estados de Reparación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Estados de Reparación</li>
        <li><a href="{{ route('statusrepairs.index') }}">Listado</a></li>
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
                {{ $statusrepair->name }}
                </p>
    
                <hr>
    
                <strong><i class="fa fa-circle-o margin-r-5 {{ $statusrepair->color_text }}"></i> Color</strong>
    
                <p class="text-muted">
                {{ $statusrepair->color }}
                </p>
    
                <hr>

                <strong><i class="fa fa-circle margin-r-5 {{ $statusrepair->color_text }}"></i> Color de texto</strong>
    
                <p class="text-muted">
                {{ $statusrepair->color_text }}
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
                            <p>Está seguro que desea eliminar el estado de reparación <b>"{{ $statusrepair->name }}"</b>?</p>

                            <p><strong>Importante: </strong>se eliminarán todos los eventos asociados a dicho estado de reparación por lo que perderá el historial de seguimiento de reparaciones a máquinas asociadas.</p>
                        </div>
                        <div class="modal-footer">
    
                            {{ Form::open(['route' => ['statusrepairs.destroy', $statusrepair->id], 'method' => 'DELETE']) }}
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

                {!! Form::open(['route' => ['statusrepairs.update', $statusrepair->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    {{-- Nombre --}}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', $statusrepair->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                    </div>

                    
                    {{-- Color --}}
                    <div class="form-group">
                        {!! Form::label('color', 'Color') !!}
                        {!! Form::text('color', $statusrepair->color, ['class' => 'form-control', 'placeholder' => 'Ingrese color', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                        <p class="help-block">Ej: bg-yellow</p>
                    </div>

                    {{-- Color text --}}
                    <div class="form-group">
                        {!! Form::label('color_text', 'Color de texto') !!}
                        {!! Form::text('color_text', $statusrepair->color_text, ['class' => 'form-control', 'placeholder' => 'Ingrese color de texto', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                        <p class="help-block">Ej: text-warning</p>
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