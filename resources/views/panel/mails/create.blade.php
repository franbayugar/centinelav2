@extends('templates.panel-template')

@section('title-head', 'Nuevo correo')

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
        <i class="fa fa-envelope"></i> Correos
        <small>Nuevo correo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Correos</li>
        <li class="active">Nuevo correo</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-envelope"></i>
        <h3 class="box-title">Nuevo correo</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'mails.store', 'method' => 'POST']) !!}
    <div class="box-body">

        <div class="row">
            {{-- Correo --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email', 'Correo') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'data-validation' => 'email', 'required']) !!}
                </div>
            </div>

            {{-- Contraseña --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            {{-- Persona --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('person', 'Persona') !!}
                    {!! Form::text('person', null, ['class' => 'form-control', 'placeholder' => 'Ingrese persona', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                </div>
            </div>

            {{-- Área --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('area_id', 'Área') !!}
                    {!! Form::select('area_id', $areas, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -']) !!}
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

@endsection