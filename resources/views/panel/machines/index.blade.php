@extends('templates.panel-template')

@section('title-head', 'Listado de máquinas')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-desktop"></i> Máquinas
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Máquinas</li>
        <li class="active">Listado</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="col-md-12">
    {{-- Info box --}}
    <div class="box box-info">
        {{--
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-desktop"></i> Listado de máquinas</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">

        {{-- Boton nueva máquina --}}
        <a href="{{ route('machines.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nueva máquina"><i class="fa fa-desktop"></i> Nueva máquina</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Utilizada por</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Máquina</th>
                        <th>Tipo</th>
                        <th>Serial</th>
                        <th>Comprada</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $machines as $machine )
                        <tr>

                            <td>{!! $machine->user->lastname !!}, {!! $machine->user->name !!}</td>

                            @if ( $machine->user->phone != null )
                                <td>{!! $machine->user->phone !!}</td>
                            @else
                                <td class="text-danger">Sin teléfono</td>
                            @endif

                            <td>{!! $machine->user->area->name !!}</td>
                            
                            <td><a href="{{ route('machines.show', $machine->id) }}" data-toggle="tooltip" title="Ver">{!! $machine->name !!}</a></td>

                            <td>{!! $machine->machinetype->name !!}</td>

                            @if ( $machine->serial != null )
                                <td>{!! $machine->serial !!}</td>
                            @else
                                <td class="text-danger">Sin serial</td>
                            @endif

                            @if ( $machine->date_purchased != null )
                                <td>{!! $machine->date_purchased !!}</td>
                            @else    
                                <td class="text-danger">Sin fecha</td>
                            @endif

                            @if ( $machine->lastStatusRepair() != null )
                                <td class="{{ $machine->lastStatusRepair()->color_text }}">{!! $machine->lastStatusRepair()->name !!}</td>
                            @else
                                <td class="text-no-state">Sin estado</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Utilizado por</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Máquina</th>
                        <th>Tipo</th>
                        <th>Serial</th>
                        <th>Comprada</th>
                        <th>Estado</th>
                    </tr>
                </tfoot>
            </table>

        </div>{{-- /.box-body --}}
        <div class="box-footer">
            
        </div>{{-- /.box-footer--}}
    </div>{{-- /.box --}}
</div>{{-- /.col --}}

@endsection

@section('script')

    {{-- Scripts necesarios para datatables --}}
    @include('panel.partials.scripts.datatables-machines')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection