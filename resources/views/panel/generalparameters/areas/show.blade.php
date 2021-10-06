@extends('templates.panel-template')

@section('title-head', 'Ver área')

@section('head')
        
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-sitemap"></i> Detalle/Modificar
        <small>Área</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Áreas</li>
        <li><a href="{{ route('areas.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle de la acción</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="fa fa-sitemap margin-r-5"></i> Área</strong>

                <p class="text-muted">
                    {{ $area->name }}
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
                            <p>Está seguro que desea eliminar el área <b>"{{ $area->name }}"</b>?</p>
                        </div>
                        <div class="modal-footer">
    
                            {{ Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Sí', ['class' => 'btn btn-danger btn-sm btn-sm']) }}
    
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

                {!! Form::open(['route' => ['areas.update', $area->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    {{-- Nombre --}}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', $area->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
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

@endsection