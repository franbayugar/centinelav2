@extends('templates.panel-template')

@section('title-head', 'Listado de usuarios')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-users"></i> Usuarios
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Usuarios</li>
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
            <h3 class="box-title"><i class="fa fa-users"></i> Listado de usuarios</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div> --}}
        <div class="box-body">

        {{-- Boton nuevo usuario --}}
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo usuario"><i class="fa fa-user"></i> Nuevo usuario</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $user )
                        <tr>

                            <td><a href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" title="Ver">{!! $user->name !!} {!! $user->lastname !!}</a></td>

                            <td>{!! $user->email !!}</td>

                            @if ( $user->phone != null )
                                <td>{!! $user->phone !!}</td>
                            @else
                                <td class="text-danger">Sin teléfono</td>
                            @endif

                            <td>{!! $user->area->name !!}</td>

                            @if ( $user->type == 'Admin')
                                <td class="text-danger"><i class="fa fa-user"></i> {!! $user->type !!}</td>
                            @else
                                <td class="text-info"><i class="fa fa-user"></i> {!! $user->type !!}</td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Tipo</th>
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
    @include('panel.partials.scripts.datatables-users')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection