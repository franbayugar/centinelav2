@extends('templates.panel-template')

@section('title-head', 'Ver evento')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')
    
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
        <i class="fa fa-clock-o"></i> Modificar Evento
        <small>{{ $event->machine->name }} de {{ $event->machine->user->name }} {{ $event->machine->user->lastname }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('machines.index') }}">Máquinas</a></li>
        <li><a href="{{ route('machines.show', $event->machine_id) }}">{{ $event->machine->name }} de {{ $event->machine->user->name }} {{ $event->machine->user->lastname }}</a></li>
        <li class="active">Evento</li>
        <li class="active">Modificar</li>
    </ol>
</section>
@endsection

@section('main-content')

{{-- general form elements --}}
<div class="box box-warning">
    {{--
    <div class="box-header">
        <i class="fa fa-clock-o"></i>
        <h3 class="box-title">Modificar evento</h3>
    </div>{{-- /.box-header --}}

    {{-- form start --}}
    {!! Form::open(['route' => ['events.update', $event->id], 'method' => 'PUT']) !!}
    {{-- {!! Form::hidden('machine_id', $event->machine_id) !!} --}}
    <div class="box-body">

        <div class="row">
            {{-- Fecha de entrada --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('admission_date', 'Fecha de entrada') !!}
                    {!! Form::text('admission_date', $event->admission_date, ['class' => 'form-control', 'id' => 'datetimepicker1', 'data-validation' => 'required', 'placeholder' => 'yyyy-mm-dd hh:mm:ss']) !!}
                </div>
            </div>
            {{-- Fecha de salida --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('departure_date', 'Fecha de salida') !!}
                    {!! Form::text('departure_date', $event->departure_date, ['class' => 'form-control', 'id' => 'datetimepicker2', 'placeholder' => 'yyyy-mm-dd hh:mm:ss']) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            {{-- Usuario de computos --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('user_id', 'Asignada a') !!}
                    <select class="form-control select-simple" id="user_id" name="user_id">
                        @foreach ( $users_computos as $user )
                            @if ( $user->id == $event->user_id)
                                <option value="{{ $user->id }}" selected>{{ $user->lastname }}, {{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Estados de reparación --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('statusrepair_id', 'Estado') !!}
                    {!! Form::select('statusrepair_id', $status_repairs, $event->statusrepair_id, ['class' => 'form-control select-simple', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Acciones --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('action_id', 'Acción') !!}
                    {!! Form::select('action_id', $actions, $event->action_id, ['class' => 'form-control select-simple', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            {{-- Description --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', $event->description, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

    </div>

    <div class="box-footer">
        {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
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

    {{-- Scripts para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker')

    {{-- Scripts necesarios para inputmask --}}
    @include('panel.partials.scripts.inputmask')

@endsection