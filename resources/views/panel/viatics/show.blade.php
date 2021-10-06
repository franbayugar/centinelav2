@extends('templates.panel-template')

@section('title-head', 'Ver viático')

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
        <i class="fa fa-car"></i> Detalle/Modificar
        <small>Viático</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Viáticos</li>
        <li><a href="{{ route('viatics.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle del viático</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="fa fa-sitemap margin-r-5"></i> Área</strong>

                <p class="text-muted">
                    {!! $viatic->area->name !!}
                </p>
    
                <hr>
        
                <strong><i class="fa fa-calendar margin-r-5"></i> Fecha</strong>

                <p class="text-muted">
                    {!! date('d-m-Y', strtotime($viatic->work_date)) !!}
                </p>

                <hr>

                <strong><i class="fa fa-clock-o margin-r-5"></i> Hora</strong>

                <p class="text-muted">
                    {!! date('H:i', strtotime($viatic->work_date)) !!}
                </p>

                <hr>

                <strong><i class="fa fa-commenting-o margin-r-5"></i> Descripción</strong>

                <p class="text-muted">
                    {!! $viatic->description !!}
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
                            <p>Está seguro que desea eliminar el viático de la fecha <b>"{!! date('d-m-Y', strtotime($viatic->work_date)) !!}"</b> correspondiente al área <b>"{!! $viatic->area->name !!}"</b>?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['viatics.destroy', $viatic->id], 'method' => 'DELETE']) }}
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
                {!! Form::open(['route' => ['viatics.update', $viatic->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="row">
                        {{-- Fecha --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('work_date', 'Fecha') !!}
                                {!! Form::text('work_date', $viatic->work_date, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        {{-- Área --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('area_id', 'Área') !!}
                                {!! Form::select('area_id', $areas, $viatic->area_id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Description --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', 'Descripción') !!}
                                {!! Form::textarea('description', $viatic->description, ['class' => 'form-control']) !!}
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