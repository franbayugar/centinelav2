@extends('templates.panel-template')

@section('title-head', 'Listado de correos')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-envelope"></i> Correos
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Correos</li>
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
            <h3 class="box-title"><i class="fa fa-envelope"></i> Listado de correos</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">

        {{-- Boton nuevo correo --}}
        <a href="{{ route('mails.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo correo"><i class="fa fa-envelope"></i> Nuevo correo</a><br><br>
            
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Persona</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $mails as $mail )
                        <tr>
                            
                            <td><a href="{{ route('mails.show', $mail->id) }}" data-toggle="tooltip" title="Ver">{!! $mail->email !!}</a></td>

                            @if ( $mail->password == null )
                                <td class="text-danger">No tenemos registro</td>
                            @else
                                <td>{{ Crypt::decrypt($mail->password) }}</td>
                            @endif

                            @if ( $mail->person == null )
                                <td class="text-danger">Sin persona asignada</td>
                            @else
                                <td>{!! $mail->person !!}</td>
                            @endif

                            @if ( $mail->area_id == null )
                                <td class="text-danger">Sin área asignada</td>
                            @else
                                <td>{!! $mail->area->name !!}</td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Persona</th>
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