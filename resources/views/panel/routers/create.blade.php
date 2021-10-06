@extends('templates.panel-template')

@section('title-head', 'Nuevo router')

@section('head')
    
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

    {{-- Estilos necesarios para chosen --}}
    @include('panel.partials.heads.chosen-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-wifi"></i> Routers
        <small>Nuevo router</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Routers</li>
        <li class="active">Nuevo router</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-wifi"></i>
        <h3 class="box-title">Nuevo router</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'routers.store', 'method' => 'POST']) !!}
    <div class="box-body">

        <div class="row">
            {{-- Nombre --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191', 'required']) !!}
                </div>
            </div>

            {{-- Password --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                </div>
            </div>
            {{-- Área --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('area_id', 'Área') !!}
                    {!! Form::select('area_id', $areas, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -', 'required']) !!}
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
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

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator') 

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

@endsection