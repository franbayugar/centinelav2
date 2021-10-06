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
        <i class="fa fa-tasks"></i> Bandeja de entrada
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

                            @if ($workAssignment->user != null)
                                <td>{!! $workAssignment->user->name !!} {!! $workAssignment->user->lastname !!}</td>
                            @else
                                <td class="text-danger">Sin asignado</td>
                            @endif
                            <td class="text-danger">Sin asignado</td>

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