@extends('templates.panel-template')

@section('title-head', 'Ver tipo de máquina')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-laptop"></i> Detalle/Modificar
        <small>Tipo de Máquina</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tipos de Máquinas</li>
        <li><a href="{{ route('machinetypes.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle de la acción</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="{{ $machinetype->icon }} margin-r-5"></i> Tipo de máquina</strong>

                <p class="text-muted">
                    {{ $machinetype->name }}
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
                            <p>Está seguro que desea eliminar el tipo de máquina <b>"{{ $machinetype->name }}"</b>?</p>

                            <p><strong>Importante: </strong>se eliminarán todas las máquinas asociados a dicho tipo de máquina por lo que perderá toda información asociada.</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['machinetypes.destroy', $machinetype->id], 'method' => 'DELETE']) }}
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

                {!! Form::open(['route' => ['machinetypes.update', $machinetype->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    {{-- Nombre --}}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', $machinetype->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                    </div>
                    
                    {{-- Icono --}}
                    <div class="form-group">
                        {!! Form::label('icon', 'Icono') !!}
                        {!! Form::text('icon', $machinetype->icon, ['class' => 'form-control', 'placeholder' => 'Ingrese icono', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                        <p class="help-block">Ej: fa fa-eye</p>
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