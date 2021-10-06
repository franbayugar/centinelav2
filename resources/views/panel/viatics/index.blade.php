@extends('templates.panel-template')

@section('title-head', 'Listado de viáticos')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-car"></i> Viáticos
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Viáticos</li>
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
            <h3 class="box-title"><i class="fa fa-car"></i> Listado de viáticos</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">

        {{-- Boton nuevo viático --}}
        <a href="{{ route('viatics.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo viático"><i class="fa fa-car"></i> Nuevo viático</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Área</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $viatics as $viatic )
                        <tr>
                            
                            <td><a href="{{ route('viatics.show', $viatic->id) }}" data-toggle="tooltip" title="Ver">{!! date('Y-m-d', strtotime($viatic->work_date)) !!}</a></td>

                            <td>{!! date('H:i', strtotime($viatic->work_date)) !!}</td>

                            @if ( $viatic->area_id == null )
                                <td class="text-danger">Sin área asignada</td>
                            @else
                                <td>{!! $viatic->area->name !!}</td>
                            @endif

                            <td>{!! $viatic->description !!}</td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Área</th>
                        <th>Descripción</th>
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