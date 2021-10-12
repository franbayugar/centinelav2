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
                        
                        <th>Resuelto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $calls as $call )
                  
                            <td><a href="{!! route('calls.edit', $call->id) !!}" data-toggle="tooltip" title="Detalle/Modificar">{!! $call->emitter_name !!}</a></td>

                            <td>{!! date('Y-m-d', strtotime($call->date)) !!}</td>

                            <td>{!! $call->call_description !!}</td>

                            <td>{!! $call->area_id !!}</td>
                           {{-- <td>{!! $user->area->name !!}</td> --}}

                            @if ($call->notified == 1)
                                <td class="bi bi-check2-all">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                  </svg>  </td>
                           @else
                                <td class="bi bi-file-excel"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel" viewBox="0 0 16 16">
                                    <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>
                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                  </svg>  </td>
                           @endif 
                           
                           
                                
                                 
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