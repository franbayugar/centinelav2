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
        <i class="fa fa-tasks"></i> Llamados
        <small>Pedidos no pertenecientes al area</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Llamados</li>
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
        <a href="{!! route('calls.create') !!}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nueva tarea"><i class="fa fa-tasks"></i> Nuevo pedido</a><br><br>
        <table id="example" class="table  table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Pedido</th>
                        <th>Area Proveniente</th>
                        
                        <th>Aviso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $calls as $call )
                  
                            <td><a href="{!! route('calls.edit', $call->id) !!}" data-toggle="tooltip" title="Detalle/Modificar">{!! $call->emitter_name !!}</a></td>

                            <td>{!! date('Y-m-d', strtotime($call->date)) !!}</td>

                            <td>{!! $call->call_description !!}</td>

                            <td>{!! $call->emitter_area !!}</td>

                            <td>{!! $call->notified !!}</td>

                           
                                
                                 
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