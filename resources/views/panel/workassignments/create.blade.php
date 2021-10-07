@extends('templates.panel-template')

@section('title-head', 'Nueva tarea')

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
        <i class="fa fa-tasks"></i> Tareas
        <small>Nueva tarea</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{ route('workassignments.index') }}">Tareas</a></li>
        <li class="active">Nueva tarea</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-success">
    {!! Form::open(['route' => 'workassignments.store', 'method' => 'POST']) !!}
    <div class="box-body">
        <div class="row">
            {{-- Nombre --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('name', 'Descripción corta *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese breve descripción', 'data-validation' => 'length', 'data-validation-length' => '3-30', 'required']) !!}
                </div>
            </div>
            {{-- Fecha inicio --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('start_date', 'Fecha inicio *') !!}
                    {!! Form::text('start_date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'required']) !!}
                </div>
            </div>

            {{-- Fecha finzalización --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('finish_date', 'Fecha finalización') !!}
                    {!! Form::text('finish_date', null, ['class' => 'form-control', 'id' => 'datetimepicker2', 'readonly']) !!}
                </div>
            </div>

            {{-- Estado --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('working_state_id', 'Estado *') !!}
                    {!! Form::select('working_state_id', $working_states, null, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar estado -', 'required']) !!}
                </div>
            </div>

            {{-- Usuario --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('user_id', 'Asignada') !!}
                    <select class= "form-control select-simple" multiple id="user_id" name="user_id">
                        <option value="">- Seleccionar realizador -</option>
                        @foreach ( $users_computos as $user )
                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Descripción --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción *') !!}
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
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>--}}

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

    {{-- Scripts necesarios para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker')

@endsection