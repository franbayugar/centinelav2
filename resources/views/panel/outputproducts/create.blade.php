@extends('templates.panel-template')

@section('title-head', 'Nuevo egreso')

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
        <i class="fa fa-level-up"></i> Egresos
        <small>Nuevo egreso</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Egresos</li>
        <li class="active">Nuevo egreso</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-level-up"></i>
        <h3 class="box-title">Nuevo egreso</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'outputproducts.store', 'method' => 'POST']) !!}
    <div class="box-body">

        <div class="row">

            {{-- Usuario --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('user_id', 'Solicita') !!}
                    <select class="form-control select-simple" id="user_id" name="user_id">
                        <option>- Seleccionar usuario -</option>
                        @foreach ( $users as $user )
                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }} ({{ $user->area->name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Producto --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('product_id', 'Producto') !!}
                    {!! Form::select('product_id', $products, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar producto -', 'data-validation' => 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Cantidad --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('quantity', 'Cantidad') !!}
                    {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'data-validation' => 'number', 'data-validation-allowing' => 'range[1;999]']) !!}
                </div>
            </div>

            {{-- Fecha --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('output_date', 'Fecha') !!}
                    {!! Form::text('output_date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'data-validation' => 'required']) !!}
                </div>
            </div>

        </div>        

        {{-- Description --}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'data-validation' => 'required']) !!}
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