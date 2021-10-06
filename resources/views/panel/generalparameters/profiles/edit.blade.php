@extends('templates.panel-template')

@section('title-head', 'Mi perfil')

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
        <i class="fa fa-user"></i> Perfil
        <small>Modificar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Mi perfil</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">
<div class="col-md-3">

    {{-- Info box --}}
    <div class="box box-solid box-info">
        <div class="box-header">
            <h3 class="box-title">Mi Perfil</h3>
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
    
            <p class="text-muted">{{ $user->area->name }}</p>
            
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

            {!! Form::open(['route' => ['profiles.update', $user->id], 'method' => 'PUT']) !!}
            <div class="box-body">

                {{-- Nombre --}}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'autofocus', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                </div>

                {{-- Apellido --}}
                <div class="form-group">
                    {!! Form::label('lastname', 'Apellido') !!}
                    {!! Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido', 'data-validation' => 'length', 'data-validation-length' => '1-191']) !!}
                </div>

                {{-- Email --}}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'data-validation' => 'email']) !!}
                    <p class="help-block">Utilizar mail del trabajo. En caso que no tenga o se encuentre registrado utilizar su mail particular.</p>
                </div>

                {{-- Teléfono --}}
                <div class="form-group">
                    {!! Form::label('phone', 'Teléfono') !!}
                    {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'data-validation' => 'required', 'data-mask']) !!}
                    <p class="help-block">Utilizar el teléfono de su oficina. Si no posee, puede dejar su nro. de celular.</p>
                </div>

                {{-- Área --}}
                <div class="form-group">
                    {!! Form::label('area_id', 'Área') !!}
                    {!! Form::select('area_id', $areas, $user->area_id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -', 'data-validation' => 'required']) !!}
                </div>
        
            </div>
        
            <div class="box-footer">
                {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
            </div>
            {!! Form::close() !!}

        </div>
        {{-- /.tab-pane --}}

        <div class="tab-pane" id="changepass">

            {!! Form::open(['route' => ['profiles.changepassword', $user->id], 'method' => 'PUT']) !!}
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

    {{-- Scripts necesarios para inputmask --}}
    @include('panel.partials.scripts.inputmask')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

@endsection