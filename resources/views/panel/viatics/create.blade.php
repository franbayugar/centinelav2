@extends('templates.panel-template')

@section('title-head', 'Nuevo viatico')

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
        <i class="fa fa-car"></i> Viático
        <small>Nuevo viático</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Viáticos</li>
        <li class="active">Nuevo viático</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {{--
    <div class="box-header">
        <i class="fa fa-car"></i>
        <h3 class="box-title">Nuevo viático</h3>
    </div>{{-- /.box-header --}}
    {{-- form start --}}
    {!! Form::open(['route' => 'viatics.store', 'method' => 'POST']) !!}
    <div class="box-body">
        <div class="row">
            {{-- Fecha --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('work_date', 'Fecha') !!}
                    {!! Form::text('work_date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'required']) !!}
                </div>
            </div>

            {{-- Área --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('area_id', 'Área') !!}
                    {!! Form::select('area_id', $areas, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Description --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
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