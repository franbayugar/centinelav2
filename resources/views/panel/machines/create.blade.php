@extends('templates.panel-template')

@section('title-head', 'Nueva máquina')

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
        <i class="fa fa-desktop"></i> Máquinas
        <small>Nueva máquina</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Máquinas</li>
        <li class="active">Nueva máquina</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-desktop"></i>
        <h3 class="box-title">Nueva máquina</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'machines.store', 'method' => 'POST', 'files' => true]) !!}
    <div class="box-body">

        <div class="row">
            
            {{-- Nombre --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                </div>
            </div>

            {{-- Serial --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('serial', 'Serial') !!}
                    {!! Form::text('serial', null, ['class' => 'form-control', 'placeholder' => 'Ingrese serial', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                </div>
            </div>

        </div>

        <div class="row">
            {{-- Contraseña --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña de Ingreso') !!}
                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña de ingreso', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                </div>
            </div>

            {{-- Fecha de compra --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('date_purchased', 'Fecha de compra') !!}
                    {!! Form::text('date_purchased', null, ['class' => 'form-control', 'data-inputmask' => '"alias": "yyyy/mm/dd"', 'date-mask']) !!}
                </div>
            </div>

        </div>

        <div class="row">
            {{-- Tipo de máquina --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('machinetype_id', 'Tipo de Máquina') !!}
                    {!! Form::select('machinetype_id', $machinetypes, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar tipo de máquina -', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>

            {{-- Usuario --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('user_id', 'La utiliza') !!}
                    <select class="form-control select-simple" id="user_id" name="user_id">
                        <option value="">- Seleccionar persona que utiliza -</option>
                        @foreach ( $users as $user )
                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }} ({{ $user->area->name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="row">            
            {{-- Imagen --}}
            <div class="col-md-12">
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

    {{-- Scripts necesarios para inputmask --}}
    @include('panel.partials.scripts.inputmask')

@endsection