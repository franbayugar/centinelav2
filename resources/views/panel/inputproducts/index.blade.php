@extends('templates.panel-template')

@section('title-head', 'Listado de ingresos')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-level-down"></i> Ingresos
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ingresos</li>
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
            <h3 class="box-title"><i class="fa fa-level-down"></i> Listado de ingresos</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">

        {{-- Boton nuevo ingreso --}}
        <a href="{{ route('inputproducts.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo ingreso"><i class="fa fa-level-down"></i> Nuevo ingreso</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $inputproducts as $inputproduct )
                        <tr>
                            
                            <td><a href="{{ route('inputproducts.show', $inputproduct->id) }}" data-toggle="tooltip" title="Ver">{!! date('Y-m-d', strtotime($inputproduct->input_date)) !!}</a></td>

                            <td>{!! date('H:i', strtotime($inputproduct->input_date)) !!}</td>

                            <td>{!! $inputproduct->product->name !!}</td>

                            <td>{!! $inputproduct->quantity !!}</td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
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