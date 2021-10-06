@extends('templates.panel-template')

@section('title-head', 'Nuevo ingreso')

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
        <i class="fa fa-level-down"></i> Ingresos
        <small>Nuevo ingreso</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ingresos</li>
        <li class="active">Nuevo ingreso</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-level-down"></i>
        <h3 class="box-title">Nuevo ingreso</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'inputproducts.store', 'method' => 'POST']) !!}
    <div class="box-body">

        <div class="row">
            {{-- Producto --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('product_id', 'Producto') !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar producto -', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
            {{-- Cantidad --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('quantity', 'Cantidad') !!}
                    {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'data-validation' => 'number', 'data-validation-allowing' => 'range[1;999]']) !!}
                </div>
            </div>
            {{-- Fecha --}}
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('input_date', 'Fecha') !!}
                    {!! Form::text('input_date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Description --}}
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

    {{-- Scripts necesarios para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker')

@endsection