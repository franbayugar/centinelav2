@extends('templates.panel-template')

@section('title-head', 'Nueva tarea')

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
        <i class="fa fa-tasks"></i> Tareas
        <small>Nueva tarea</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{ route('calls.index') }}">Llamados</a></li>
        <li class="active">Nuevo pedido</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {!! Form::open(['route' => 'calls.store', 'method' => 'POST']) !!}
    <div class="box-body">
        <div class="row">
            {{-- Nombre --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('emitter_name', 'Nombre *') !!}
                    {!! Form::text('emitter_name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                </div>
            </div>

             {{-- Area proveniente --}}
             <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('emitter_area', 'Area proveniente') !!}
                    {!! Form::text('emitter_area', null, ['class' => 'form-control', 'placeholder' => 'Area proveniente']) !!}
                </div>
            </div>

            {{-- Fecha --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('date', 'Fecha pedido *') !!}
                    {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly']) !!}
                </div>
            </div>

           
            {{-- Estado --}}
            {{--  <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('notified', 'Notificado *') !!}
                    {!! Form::select('notified', null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar estado -', 'required']) !!}
                </div>
            </div>


            {{-- notificado --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('notified', 'Notificado') !!}
                   
                    {!! Form::checkbox('notified', '1',  null, ['class' => 'form-control']) !!}
                    {!! var_dump('notified');!!}
                    
                </div>
            </div>

           
            {{-- Descripción --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('call_description', 'Descripción *') !!}
                    {!! Form::textarea('call_description', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        
    </div>

    <div class="box-footer">
        {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

</div>{{-- /.box --}}

@endsection

@section('script')
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>--}}

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

    {{-- Scripts necesarios para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker')

@endsection