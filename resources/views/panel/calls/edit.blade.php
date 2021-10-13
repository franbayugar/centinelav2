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
        <small>Llamados</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Llamados</li>
        <li><a href="{{ route('calls.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle de la llamada</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="fa fa-commenting margin-r-5"></i> Nombre</strong>

                <p class="text-muted">
                    {!! $calls->emitter_name !!}
                </p>
    
                <hr>
        
                <strong><i class="fa fa-calendar margin-r-5"></i> Àrea</strong>

                <p class="text-muted">
                    {!!($calls->area->name) !!}
                </p>

                <hr>

                <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Resuelto</strong>

                <p class="text-muted">
                    @if ($calls->notified == 1)
                    <td class="bi bi-check-square-fill" style="font-size: 2rem; color: rgb(137, 158, 230);">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                      </svg>  </td>
               @else
                    <td <i class="bi bi-x-square-fill" style="color: rgb(212, 17, 17) " ></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                      </svg>  </td>
               @endif 
                </p>

                
                <hr>

                <strong><i class="fa fa-commenting-o margin-r-5"></i> Descripción</strong>

                <p class="text-muted">
                    {!! $calls->call_description !!}
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
                            <p>Está seguro que desea eliminar la llamada <b>"{!!($calls->emitter_name)!!}"</b> 
                                proveniente del area  <b>"{!! $calls->area->name !!}"</b>
                                ?
                            </p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['calls.destroy', $calls->id], 'method' => 'DELETE']) }}
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
                {!! Form::open(['route' => ['calls.update', $calls->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="row">
                        {{-- Nombre --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('emitter_name', 'Nombre *') !!}
                                {!! Form::text('emitter_name', $calls->emitter_name, ['class' => 'form-control', 'placeholder' => 'Ingrese breve descripción', 'data-validation' => 'length', 'data-validation-length' => '3-30', 'required']) !!}
                            </div>
                        </div>
            
                        {{--Area --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('area', 'Seleccionar area') !!}
                                        <select class="form-control select-simple" id="area_id" name="area_id" >
                                            @foreach ( $areas as $area )
                                                @if ( $area->id == $calls->area_id)
                                                    <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                                                @else
                                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                            </div>
                        </div>
            
                        {{-- Estado --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('notified', 'Resuelto') !!}
                                {{--{!! Form::checkbox('notified', '1',  null, ['class' => 'form-control']) !!}--}}
     
                                        @if ($calls->notified == 1)
                                        {!! Form::checkbox('notified', '1',  1, ['class' => 'form-control']) !!}
                                        {{--<td class="bi bi-check-square-fill" style="font-size: 2rem; color: rgb(137, 158, 230);">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                          </svg>  </td> --}}
                                        @else
                                        {!! Form::checkbox('notified', '1',  null, ['class' => 'form-control']) !!}
                                        @endif
    
                            </div>
                        </div>
            
                    
                        {{-- Descripción --}}
                        <div class="col-md-11">
                            <div class="form-group">
                                {!! Form::label('call_description', 'Descripción *') !!}
                                {!! Form::textarea('call_description', $calls->call_description, ['class' => 'form-control', 'required']) !!}
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