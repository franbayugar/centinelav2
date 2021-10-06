@extends('templates.panel-template')

@section('title-head', 'Ver correo')

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
        <i class="fa fa-envelope"></i> Detalle/Modificar
        <small>Correo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Correos</li>
        <li><a href="{{ route('mails.index') }}">Listado</a></li>
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
                <h3 class="box-title">Detalle de la cuenta</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <strong>
                    <i class="fa fa-envelope margin-r-5"></i> 
                    Email
                </strong>
        
                <p class="text-muted">{{ $mail->email }}</p>
        
                <hr>
        
                @if ( $mail->password != null )
                    <strong><i class="fa fa-unlock-alt margin-r-5"></i> Contraseña</strong>

                    <p class="text-muted">
                        {{ Crypt::decrypt($mail->password) }}
                    </p>

                    <hr>
                @endif

                <strong><i class="fa fa-user margin-r-5"></i> Persona</strong>

                @if ( $mail->person != null )
                    <p class="text-muted">
                        {{ $mail->person }}
                    </p>
                @else
                    <p class="text-danger">
                        Sin persona asignada
                    </p>
                @endif

                <hr>

                <strong><i class="fa fa-sitemap margin-r-5"></i> Área</strong>

                
                @if ( $mail->area_id != null)
                    <p class="text-muted">
                        {!! $mail->area->name !!}
                    </p>
                @else
                    <p class="text-danger">
                        Sin área asignada
                    </p>
                @endif
                

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
                            <p>Está seguro que desea eliminar el correo <b>"{{ $mail->email }}"</b>?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['mails.destroy', $mail->id], 'method' => 'DELETE']) }}
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

                {!! Form::open(['route' => ['mails.update', $mail->id], 'method' => 'PUT']) !!}
                <div class="box-body">

                    <div class="row">
                        {{-- Correo --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('email', 'Correo') !!}
                                {!! Form::text('email', $mail->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'data-validation' => 'email', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if ( $mail->password != null )
                                {{-- Contraseña --}}
                                <div class="form-group">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::text('password', Crypt::decrypt($mail->password), ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                                </div>
                            @else
                                {{-- Contraseña --}}
                                <div class="form-group">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese contraseña', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        {{-- Persona --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('person', 'Persona') !!}
                                {!! Form::text('person', $mail->person, ['class' => 'form-control', 'placeholder' => 'Ingrese persona', 'data-validation' => 'length', 'data-validation-length' => '0-191']) !!}
                            </div>
                        </div>

                        {{-- Área --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('area_id', 'Área') !!}
                                {!! Form::select('area_id', $areas, $mail->area_id, ['class' => 'form-control select-simple', 'placeholder' => '- Seleccionar área -']) !!}
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

@endsection