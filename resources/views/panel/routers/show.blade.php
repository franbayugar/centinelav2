@extends('templates.panel-template')

@section('title-head', 'Ver router')

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
        <i class="fa fa-wifi"></i> Detalle/Modificar
        <small>Router</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Routers</li>
        <li><a href="{{ route('routers.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle del router</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong>
                    <i class="fa fa-wifi margin-r-5"></i> 
                    Nombre
                </strong>
        
                <p class="text-muted">{{ $router->name }}</p>
        
                <hr>
        
                @if ( $router->password != null )
                    <strong><i class="fa fa-unlock-alt margin-r-5"></i> Contraseña</strong>

                    <p class="text-muted">
                        {{ Crypt::decrypt($router->password) }}
                    </p>

                    <hr>
                @endif
        
                <strong><i class="fa fa-sitemap margin-r-5"></i> Área</strong>

                <p class="text-muted">
                    {{ $router->area->name }}
                </p>

                <hr>
        
                @if ( $router->description != null )
                    <strong><i class="fa fa-commenting margin-r-5"></i> Descripción</strong>

                    <p class="text-muted">
                        {!! Crypt::decrypt($router->description) !!}
                    </p>

                    <hr>
                @endif

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
                            <p>Está seguro que desea eliminar el router <b>"{{ $router->name }}"</b> correspondiente al área de <b>"{{ $router->area->name }}"</b>?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['routers.destroy', $router->id], 'method' => 'DELETE']) }}
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

                {!! Form::open(['route' => ['routers.update', $router->id], 'method' => 'PUT']) !!}
                <div class="box-body">

                    <div class="row">
                        {{-- Nombre --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', $router->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                            </div>
                        </div>

                        {{-- Contraseña --}}
                        <div class="col-md-4">
                            @if ( $router->password != null)
                                {{-- Si hay contraseña desencripto --}}
                                <div class="form-group">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::text('password', Crypt::decrypt($router->password), ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                                </div>
                            @else
                                {{-- Si no hay contraseña --}}
                                <div class="form-group">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                                </div>
                            @endif
                        </div>
                        {{-- Área --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('area_id', 'Área') !!}
                                {!! Form::select('area_id', $areas, $router->area_id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -']) !!}
                            </div>
                        </div>
                    </div>
                    
                    {{-- Description --}}
                    <div class="row">
                        <div class="col-md-12">
                            @if ( $router->description != null)
                                {{-- Desencripto si hay descripción --}}
                                <div class="form-group">
                                    {!! Form::label('description', 'Descripción') !!}
                                    {!! Form::textarea('description', Crypt::decrypt($router->description), ['class' => 'form-control']) !!}
                                </div>
                            @else
                                {{-- Si no hay descripción --}}
                                <div class="form-group">
                                    {!! Form::label('description', 'Descripción') !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                </div>
                            @endif
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

@endsection