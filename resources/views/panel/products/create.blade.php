@extends('templates.panel-template')

@section('title-head', 'Nuevo producto')

@section('head')
    
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-shopping-cart"></i> Productos
        <small>Nuevo producto</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Productos</li>
        <li class="active">Nuevo producto</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{-- 
    <div class="box-header">
        <i class="fa fa-shopping-cart"></i>
        <h3 class="box-title">Nuevo producto</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
    <div class="box-body">
        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'data-validation' => 'length', 'data-validation-length' => '3-191', 'required']) !!}
        </div>

        {{-- Imagen --}}
        <div class="form-group">
            {!! Form::label('image', 'Imagen') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Seleccionar</span>
                    <input name="image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                    {{--{!! Form::file('image') !!}--}}
                </span>
                <span class="form-control"></span>
            </div>
            <p class="help-block">La imagen debe tener un máximo de 300x300 píxeles.</p>
        </div>

        {{-- Description --}}
        <div class="form-group">
            {!! Form::label('description', 'Descripción') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
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

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

@endsection