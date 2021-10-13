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

                            <td>{!! $call->area->name !!}</td>
                           {{-- <td>{!! $user->area->name !!}</td> --}}

                            @if ($call->notified == 1)
                                <td class="bi bi-check-square-fill" style="font-size: 2rem; color: rgb(137, 158, 230);">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                                  </svg>  </td>
                           @else
                                <td <i class="bi bi-x-square-fill" style="color: rgb(212, 17, 17) " ></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                  </svg>  </td>
                           @endif 
                           
                           
                          {{-- 47, 185, 59) --}} 
                                 
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