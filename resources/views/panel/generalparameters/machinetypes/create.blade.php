@extends('templates.panel-template')

@section('title-head', 'Nuevo tipo de máquina')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-laptop"></i> Tipos de Máquinas
        <small>Nuevo tipo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('machinetypes.index') }}">Tipos de Máquinas</a></li>
        <li class="active">Nuevo tipo</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-laptop"></i>
        <h3 class="box-title">Nuevo tipo de máquina</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'machinetypes.store', 'method' => 'POST']) !!}
    <div class="box-body">
        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
        </div>

        {{-- Icono --}}
        <div class="form-group">
            {!! Form::label('icon', 'Icono') !!}
            {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Ingrese icono', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
            <p class="help-block">Ej: fa fa-eye</p>
        </div>

    </div>

    <div class="box-footer">
        {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

</div>{{-- /.box --}}

@endsection

@section('script')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

@endsection