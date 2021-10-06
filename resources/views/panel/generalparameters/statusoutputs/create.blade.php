@extends('templates.panel-template')

@section('title-head', 'Nuevo estado de salida')

@section('head')
    
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-retweet"></i> Estados de Salida
        <small>Nuevo estado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('statusoutputs.index') }}">Estados de Salida</a></li>
        <li class="active">Nuevo estado</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-retweet"></i>
        <h3 class="box-title">Nuevo estado de salida</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'statusoutputs.store', 'method' => 'POST']) !!}
    <div class="box-body">
        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
            <p class="help-block">Ej: Reservado, Entregado, Cancelado.</p>
        </div>

        {{-- Color --}}
        <div class="form-group">
            {!! Form::label('color', 'Color') !!}
            {!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'Ingrese color', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
            <p class="help-block">Ej: text-danger</p>
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