@extends('templates.panel-template')

@section('title-head', 'Listado de routers')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-wifi"></i> Routers
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Routers</li>
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
            <h3 class="box-title"><i class="fa fa-wifi"></i> Listado de routers</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">

        {{-- Boton nuevo router --}}
        <a href="{{ route('routers.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo router"><i class="fa fa-wifi"></i> Nuevo router</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre de Red</th>
                        <th>Contraseña</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $routers as $router )
                        <tr>
                            
                            <td><a href="{{ route('routers.show', $router->id) }}" data-toggle="tooltip" title="Ver">{!! $router->name !!}</a></td>

                            @if ( $router->password != null)
                                <td>{{ Crypt::decrypt($router->password) }}</td>
                            @else
                                <td class="text-danger">No tenemos registro</td>
                            @endif

                            <td>{!! $router->area->name !!}</td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre de Red</th>
                        <th>Contraseña</th>
                        <th>Área</th>
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
    @include('panel.partials.scripts.datatables')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection