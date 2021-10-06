@extends('templates.panel-template')

@section('title-head', $machine->machinetype->name . ' - ' . $machine->name . ' de ' .$machine->user->name. ' ' .$machine->user->lastname )

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
        <i class="fa fa-desktop"></i> Detalle/Eventos
        <small>{{ $machine->name }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Máquinas</li>
        <li><a href="{{ route('machines.index') }}">Listado</a></li>
        <li class="active">{{ $machine->name }}</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">
<div class="col-md-3">

  {{-- Datos de la maquina eliminar y modificar --}}
  @include('panel.machines.partials.datamachine')

</div>
{{-- /.col --}}
<div class="col-md-9">
  <div class="nav-tabs-custom">

    <ul class="nav nav-tabs">
      <li class="active"><a href="#timeline" data-toggle="tab">Linea de tiempo</a></li>
      <li><a href="#settings" data-toggle="tab">Nuevo evento</a></li>    
    </ul>
    
    <div class="tab-content">

      {{-- Linea de tiempo --}}
      @include('panel.machines.partials.timeline')

      {{-- Formulario de nuevo evento --}}
      @include('panel.machines.partials.newevent')
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

  {{-- Scripts para datetimepicker --}}
  @include('panel.partials.scripts.datetimepicker')

  {{-- Scripts necesarios para inputmask --}}
  @include('panel.partials.scripts.inputmask')

  {{-- Scripts necesarios para contraer textos expander --}}
  @include('panel.partials.scripts.expander')

@endsection