@extends('templates.panel-template')

@section('title-head', 'Nuevo estado de reparación')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-cogs"></i> Estados de Reparación
        <small>Nuevo estado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('statusrepairs.index') }}">Estados de Reparación</a></li>
        <li class="active">Nuevo estado</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-cogs"></i>
        <h3 class="box-title">Nuevo estado de reparación</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'statusrepairs.store', 'method' => 'POST']) !!}
    <div class="box-body">
        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
            <p class="help-block">Ej: En reparación</p>
        </div>

        {{-- Color --}}
        <div class="form-group">
            {!! Form::label('color', 'Color') !!}
            {!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'Ingrese color', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
            <p class="help-block">Ej: bg-yellow</p>
        </div>

        {{-- Color text --}}
        <div class="form-group">
            {!! Form::label('color_text', 'Color de texto') !!}
            {!! Form::text('color_text', null, ['class' => 'form-control', 'placeholder' => 'Ingrese color de texto', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
            <p class="help-block">Ej: text-warning</p>
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