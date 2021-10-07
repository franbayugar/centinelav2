@extends('templates.panel-template')

@section('title-head', 'Detalle/Modificar tarea')

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
        <i class="fa fa-tasks"></i> Detalle/Modificar
        <small>Tarea</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tareas</li>
        <li><a href="{{ route('workassignments.index') }}">Listado</a></li>
        <li class="active">Detalle/Modificar</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">

    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle de la tarea</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="fa fa-commenting margin-r-5"></i> Descripción corta</strong>

                <p class="text-muted">
                    {!! $workassignment->name !!}
                </p>
    
                <hr>
        
                <strong><i class="fa fa-calendar margin-r-5"></i> Fecha iniciada</strong>

                <p class="text-muted">
                    {!! date('d/m/Y H:i', strtotime($workassignment->start_date)) !!}
                </p>

                <hr>

                @if ($workassignment->finish_date != null)
                <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Fecha finalización</strong>

                <p class="text-muted">
                    {!! date('d/m/Y H:i', strtotime($workassignment->finish_date)) !!}
                </p>

                <hr>
                @endif

                @if ($workassignment->user != null)
                <strong><i class="fa fa-user margin-r-5"></i> Realizada por</strong>

                <p class="text-muted">
                    {!! $workassignment->user->name !!} {!! $workassignment->user->lastname !!}
                </p>

                <hr>
                @endif

                <strong><i class="fa fa-commenting-o margin-r-5"></i> Descripción</strong>

                <p class="text-muted">
                    {!! $workassignment->description !!}
                </p>

                <hr>

                {{-- Boton eliminar usuario --}}
                <a href="#" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal"><b>Eliminar</b></a>

                {{-- Modal --}}
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        {{-- Modal content --}}
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Alerta!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Está seguro que desea eliminar la tarea de la fecha <b>"{!! date('d/m/Y', strtotime($workassignment->start_date)) !!}"</b> 
                                @if ($workassignment->user != null)
                                realizada por  <b>"{!! $workassignment->user->name !!} {!! $workassignment->user->lastname !!}"</b>
                                @endif
                                ?
                            </p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['workassignments.destroy', $workassignment->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Sí', ['class' => 'btn btn-success btn-sm btn-sm']) }}

                                <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">No</button>
                            {{ Form::close() }}

                        </div>
                        </div>

                    </div>
                </div>
                
            </div>{{-- /.box-body --}}
        </div>{{-- /.box --}}

    </div>
    {{-- /.col --}}

    <div class="col-md-9">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Modificar</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="settings">

                {{-- form start --}}
                {!! Form::open(['route' => ['workassignments.update', $workassignment->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="row">
                        {{-- Nombre --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', 'Descripción corta *') !!}
                                {!! Form::text('name', $workassignment->name, ['class' => 'form-control', 'placeholder' => 'Ingrese breve descripción', 'data-validation' => 'length', 'data-validation-length' => '3-30', 'required']) !!}
                            </div>
                        </div>
                        {{-- Fecha inicio --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('start_date', 'Fecha inicio *') !!}
                                {!! Form::text('start_date', $workassignment->start_date, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'required']) !!}
                            </div>
                        </div>
            
                        {{-- Fecha finzalización --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('finish_date', 'Fecha finalización') !!}
                                {!! Form::text('finish_date', $workassignment->finish_date, ['class' => 'form-control', 'id' => 'datetimepicker2', 'readonly']) !!}
                            </div>
                        </div>
            
                        {{-- Estado --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('working_state_id', 'Estado *') !!}
                                {!! Form::select('working_state_id', $working_states, $workassignment->working_state_id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar estado -', 'required']) !!}
                            </div>
                        </div>
            
                        {{-- Usuario --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('user_id', 'Asignada') !!}
                                <select class="form-control select-simple" multiple id="user_id" name="user_id">
                                    <option value="">- Seleccionar realizador -</option>
                                    @foreach ( $users_computos as $user )
                                        @if ( $user->id == $workassignment->user_id)
                                            <option value="{{ $user->id }}" selected>{{ $user->lastname }}, {{ $user->name }}</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }}</option>
                                        @endif
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
                                {!! Form::textarea('description', $workassignment->description, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="box-footer">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            {{-- /.tab-pane --}}
        </div>
        {{-- /.tab-content --}}
        </div>
        {{-- /.nav-tabs-custom --}}
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}

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