@extends('templates.panel-template')

@section('title-head', 'Listado de egresos')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-level-up"></i> Egresos
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Egresos</li>
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
            <h3 class="box-title"><i class="fa fa-level-up"></i> Listado de egresos</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">

        {{-- Boton nuevo egreso --}}
        <a href="{{ route('outputproducts.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo egreso"><i class="fa fa-level-up"></i> Nuevo egreso</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Solicitante</th>
                        <th>Área</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $outputproducts as $outputproduct )
                        <tr>
                            
                            <td><a href="{{ route('outputproducts.show', $outputproduct->id) }}" data-toggle="tooltip" title="Ver">{!! date('Y-m-d', strtotime($outputproduct->output_date)) !!}</a></td>

                            <td>{!! date('H:i', strtotime($outputproduct->output_date)) !!}</td>

                            <td>{!! $outputproduct->product->name !!}</td>

                            <td>{!! $outputproduct->quantity !!}</td>

                            <td>{!! $outputproduct->user->lastname !!}, {!! $outputproduct->user->name !!}</td>

                            <td>{!! $outputproduct->user->area->name !!}</td>

                            <td class="{!! $outputproduct->statusoutput->color !!}">{!! $outputproduct->statusoutput->name !!}</td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Solicitante</th>
                        <th>Área</th>
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
    @include('panel.partials.scripts.datatables-desc')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection