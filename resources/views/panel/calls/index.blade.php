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
        <a href="{!! route('workassignments.create') !!}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nueva tarea"><i class="fa fa-tasks"></i> Nuevo tarea</a><br><br>
        <table id="example" class="table  table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Pedido</th>
                        <th>Area Proveniente</th>
                        <th>Notificado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $calls as $call )
                  
      
                            <td><a href="{!! route('calls.edit', $call->id) !!}" data-toggle="tooltip" title="Detalle/Modificar">{!! $call->emitter_name !!}</a></td>

                            <td> {!! date('Y-m-d', strtotime($call->date)) !!} </td>


                            <td> {!! $call->description !!} </td>

                                <td> {!! $call->emitter->area !!} </td>

                            @if( $call->notified )

                            <td  class="bi bi-check-square-fill"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                              </svg> </td>
                               
                            @else
                               <td class="bi bi-file-x"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-x" viewBox="0 0 16 16">
                                <path d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                              </svg> </td>
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