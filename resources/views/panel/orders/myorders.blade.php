@extends('templates.panel-template')

@section('title-head', 'Mis Pedidos')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-shopping-cart"></i> Listado de pedidos
        <small>Mis pedidos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pedidos</li>
        <li class="active">Mis pedidos</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="col-md-12">
    {{-- Info box --}}
    <div class="box box-info">
        {{-- 
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Mis Pedidos</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>--}}
        <div class="box-body">

        {{-- Boton nuevo pedido --}}
        <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo pedido"><i class="fa fa-shopping-cart"></i> Nuevo pedido</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $myorders as $myorder )
                        <tr>
                            
                            <td><a href="{{ route('orders.show', $myorder->id) }}" data-toggle="tooltip" title="Ver">{!! date('Y-m-d', strtotime($myorder->output_date)) !!}</a></td>

                            <td>{!! date('H:i', strtotime($myorder->output_date)) !!}</td>

                            <td>{!! $myorder->product->name !!}</td>

                            <td>{!! $myorder->quantity !!}</td>

                            <td class="{!! $myorder->statusoutput->color !!}">{!! $myorder->statusoutput->name !!}</td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
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