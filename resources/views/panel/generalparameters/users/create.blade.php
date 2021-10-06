@extends('templates.panel-template')

@section('title-head', 'Nuevo usuario')

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
        <i class="fa fa-users"></i> Usuarios
        <small>Nuevo usuario</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="active">Nuevo usuario</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-user"></i>
        <h3 class="box-title">Nuevo usuario</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
    <div class="box-body">
        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191', 'required']) !!}
        </div>

        {{-- Apellido --}}
        <div class="form-group">
            {!! Form::label('lastname', 'Apellido') !!}
            {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido', 'data-validation' => 'length', 'data-validation-length' => '1-191', 'required']) !!}
        </div>

        {{-- Email --}}
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'data-validation' => 'email', 'required']) !!}
        </div>

        {{-- Teléfono --}}
        <div class="form-group">
            {!! Form::label('phone', 'Teléfono') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'data-validation' => 'phone', 'data-mask']) !!}
        </div>

        {{-- Contraseña --}}
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'data-validation' => 'length', 'data-validation-length' => 'min6']) !!}
        </div>

        {{-- Tipo --}}
        <div class="form-group">
            {!! Form::label('type', 'Tipo') !!}
            {!! Form::select('type', ['Admin' => 'Admin', 'Member' => 'Member'], null, ['class' => 'form-control', 'data-validation' => 'required', 'placeholder' => '- Seleccione un tipo -', 'required']) !!}
        </div>

        {{-- Área --}}
        <div class="form-group">
            {!! Form::label('area_id', 'Área') !!}
            {!! Form::select('area_id', $areas, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -', 'data-validation' => 'required', 'required']) !!}
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

    {{-- Scripts necesarios para inputmask --}}
    @include('panel.partials.scripts.inputmask')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

@endsection