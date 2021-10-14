@extends('templates.panel-template')

@section('title-head', 'Listado de tareas')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-tasks"></i> Tareas sin asignar
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tareas</li>
        <li class="active">Listado</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="col-md-12">
    {{-- Info box --}}
    <div class="box box-info">
        <div class="box-body">

        {{-- Boton nuevo viático --}}
        <a href="{!! route('workassignments.create') !!}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nueva tarea"><i class="fa fa-tasks"></i> Nuevo tarea</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Iniciada</th>
                        <th>Estado</th>
                        <th>Asignada</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $workAssignments as $workAssignment )
                        <tr>    
                            <td><a href="{!! route('workassignments.edit', $workAssignment->id) !!}" data-toggle="tooltip" title="Detalle/Modificar">{!! $workAssignment->name !!}</a></td>
                            <td>{!! date('Y-m-d', strtotime($workAssignment->start_date)) !!}</td>
                            <td class="{!! $workAssignment->workingState->color !!}">{!! $workAssignment->workingState->name !!}</td>
                            <td class="text-danger">Sin asignado</td>
                            <td class="text-danger"><a  href="{!! route('workassignments.autoassing', $workAssignment->id) !!}" class="btn btn-success btn-sm btn-block"><b><span class="material-icons">
                                person_add_alt</span></b></a></td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>{{-- /.box-body --}}
        <div class="box-footer">
            
        </div>{{-- /.box-footer--}}
    </div>{{-- /.box --}}
</div>{{-- /.col --}}

@endsection

@section('script')

    {{-- Scripts necesarios para datatables --}}
    @include('panel.workassignments.datatables-style')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection