@extends('templates.panel-template')

@section('title-head', 'Ver usuario')

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
        <i class="fa fa-users"></i> Detalle/Modificar
        <small>Usuario</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Usuarios</li>
        <li><a href="{{ route('users.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle del usuario</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong><i class="fa fa-user margin-r-5"></i> Nombre</strong>

                <p class="text-muted">
                {{ $user->name }} {{ $user->lastname }}
                </p>

                <hr>

                <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                <p class="text-muted dont-break-out">{{ $user->email }}</p>

                <hr>

                <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>

                <p class="text-muted">{{ $user->phone }}</p>

                <hr>

                <strong><i class="fa fa-sitemap margin-r-5"></i> Área</strong>

                <p class="text-muted dont-break-out">{{ $user->area->name }}</p>

                <hr>

                <strong><i class="fa fa-vcard margin-r-5"></i> Tipo</strong>

                <p>
                    @if ( $user->type == 'Admin')
                        <span class="label label-danger">{{ $user->type }}</span>
                    @else
                        <span class="label label-primary">{{ $user->type }}</span>
                    @endif        
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
                            <p>Está seguro que desea eliminar?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) }}
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
            <li class="active"><a href="#settings" data-toggle="tab">Datos del usuario</a></li>
            <li><a href="#changepass" data-toggle="tab">Cambiar contraseña</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="settings">

                {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    {{-- Nombre --}}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'required', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                    </div>
            
                    {{-- Apellido --}}
                    <div class="form-group">
                        {!! Form::label('lastname', 'Apellido') !!}
                        {!! Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido', 'required', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                    </div>
            
                    {{-- Email --}}
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'data-validation' => 'email']) !!}
                    </div>

                    {{-- Teléfono --}}
                    <div class="form-group">
                        {!! Form::label('phone', 'Teléfono') !!}
                        {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'data-validation' => 'phone', 'data-mask']) !!}
                    </div>
            
                    {{-- Tipo --}}
                    <div class="form-group">
                        {!! Form::label('type', 'Tipo') !!}
                        {!! Form::select('type', ['Admin' => 'Admin', 'Member' => 'Member'], $user->type, ['class' => 'form-control', 'required', 'data-validation' => 'required']) !!}
                    </div>

                    {{-- Área --}}
                    <div class="form-group">
                        {!! Form::label('area_id', 'Área') !!}
                        {!! Form::select('area_id', $areas, $user->area_id, ['class' => 'form-control select-simple', 'required', 'data-validation' => 'required']) !!}
                    </div>
                    
            
                </div>
            
                <div class="box-footer">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            {{-- /.tab-pane --}}

            <div class="tab-pane" id="changepass">
                
                {!! Form::open(['route' => ['users.changepassword', $user->id], 'method' => 'PUT']) !!}
                <div class="box-body">

                    {{-- Contraseña --}}
                    <div class="form-group">
                        {!! Form::label('pass_confirmation', 'Contraseña') !!}
                        {!! Form::password('pass_confirmation', ['class' => 'form-control', 'placeholder' => '***************', 'data-validation' => 'length', 'data-validation-length' => 'min6']) !!}
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div class="form-group">
                        {!! Form::label('pass', 'Confirmar contraseña') !!}
                        {!! Form::password('pass', ['class' => 'form-control', 'placeholder' => '***************', 'data-validation' => 'confirmation']) !!}
                    </div>

                </div>

                <div class="box-footer">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}
            </div>

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

    {{-- Scripts necesarios para inputmask --}}
    @include('panel.partials.scripts.inputmask')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

@endsection