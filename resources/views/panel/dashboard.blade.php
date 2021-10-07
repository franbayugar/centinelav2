@extends('templates.panel-template')

@section('title-head', 'Dashboard')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-dashboard"></i> Dashboard
        <small>Panel de control</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
</section>
@endsection

@section('main-content')

@if ( Auth::user()->isAdmin() )
{{-- Small boxes (Stat box) --}}
<div class="row">
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="counter">
                    {!! $mails !!}
                </h3>
                <p>
                    Correos
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-envelope"></i>
            </div>
            <a href="{{ route('mails.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-green">
            <div class="inner">
                <h3 class="counter">
                    {!! $desktops !!}
                </h3>
                <p>
                    PCs Escritorio
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-desktop"></i>
            </div>
            <a href="{{ route('machines.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3 class="counter">
                    {!! $laptops !!}
                </h3>
                <p>
                    Notebooks
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-laptop"></i>
            </div>
            <a href="{{ route('machines.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-red">
            <div class="inner">
                <h3 class="counter">
                    {!! $printers !!}
                </h3>
                <p>
                    Impresoras
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-print"></i>
            </div>
            <a href="{{ route('machines.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}
</div>{{-- /.row --}}

{{-- Small boxes (Stat box) --}}
<div class="row">
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-blue">
            <div class="inner">
                <h3 class="counter">
                    {{ $outputproducts }}
                </h3>
                <p>
                    Pedidos Reservados
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-plus"></i>
            </div>
            <a href="{{ route('reservedorders') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}

    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-purple">
            <div class="inner">
                <h3 class="counter">
                    {{ $users }}
                </h3>
                <p>
                    Usuarios registrados
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}

    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3 class="counter">
                    {{ $pendingTasks }}
                </h3>
                <p>
                    Tareas sin asignar
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ route('workassignments.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}

    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-navy">
            <div class="inner">
                <h3 class="counter">
                    {{ $inbox }}
                </h3>
                <p>
                    Bandeja de entrada
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ route('workassignments.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}

</div>

<div class="row">
    <div class="col-md-6">
        {{-- Warning box --}}
        <div class="box box-solid box-warning">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Productos bajos de stock</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <p>
                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $low_stock as $product )
                                <tr>
                                    
                                    <td><a href="{{ route('products.show', $product->id) }}" data-toggle="tooltip" title="Ver">{!! $product->name !!}</a></td>
        
                                    <td>{!! $product->stock !!}</td>
        
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                            </tr>
                        </tfoot>
                    </table>
                </p>
            </div>{{-- /.box-body --}}
        </div>{{-- /.box --}}
    </div>{{-- /.col --}}
</div>

@else
{{-- Small boxes (Stat box) --}}
<div class="row">
    <div class="col-lg-3 col-xs-6">
        {{-- small box --}}
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="counter">
                    {!! $userOrders !!}
                </h3>
                <p>
                    Mis pedidos
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{ route('orders.index') }}" class="small-box-footer">
                Listado <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>{{-- ./col --}}
</div>

<div class="row">

    <div class="col-md-8">

        {{-- info box --}}
        <div class="box box-solid box-info">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-book"></i> Agenda</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Área</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )
                            <tr>
                                
                                <td>{!! $user->name !!} {!! $user->lastname !!}</td>
    
                                <td>{!! $user->area->name !!}</td>

                                <td>{!! $user->phone !!}</td>
    
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Área</th>
                            <th>Teléfono</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div>{{-- /.box-body --}}
        </div>{{-- /.box --}}

    </div>

    <div class="col-md-4">
        {{-- info box --}}
        <div class="box box-solid box-info">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-exclamation-triangle"></i> Importante!</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <p>
                    Le solicitamos por favor, <b>mantener sus datos actualizados. </b>
                    <ul>
                        <li>
                            Clickeando en su nombre en la barra superior, entrando en perfil.
                        </li>
                    </ul>
                    De está manera siempre podremos tener la <b>agenda</b> que les aparece en el <b>Dashboard</b> Actualizada.
                    <br>
                    Desde ya ¡muchas gracias!
                    <br>
                    Centro de Cómputos, Municipalidad de Tres Arroyos.
                </p>
            </div>{{-- /.box-body --}}
        </div>{{-- /.box --}}
    </div>

</div>
@endif

@endsection

@section('script')

    {{-- Scripts necesarios para datatables --}}
    @include('panel.partials.scripts.datatables-dashboard')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

    {{-- Scripts necesarios para counter --}}
    @include('panel.partials.scripts.counter')

@endsection