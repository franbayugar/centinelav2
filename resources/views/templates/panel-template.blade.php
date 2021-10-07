<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Centinela | @yield('title-head')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{-- Icono centinela --}}
        <link rel="shortcut icon" href="{{ asset('img/icons/centinela-rojo.ico') }}" type="image/x-icon">
        {{-- bootstrap 3.0.2 --}}
        <link href="{{ asset('AdminLTE/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- font Awesome --}}
        <link href="{{ asset('AdminLTE/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- Ionicons 
        <link href="{{ asset('AdminLTE/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" /> --}}
        {{-- Theme style --}}
        <link href="{{ asset('AdminLTE/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- Centinela Theme style --}}
        <link href="{{ asset('AdminLTE/css/centinela.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- Icono google --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
        {{--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]--}}
        @yield('head')
    </head>

    @if ( Request::is('admin/orders/create') )
        <body class="skin-black fixed" onload="actualizaReloj()">
    @else
        <body class="skin-black" onload="actualizaReloj()">
    @endif
    
        {{-- Nav-bar --}}
        @include('panel.partials.nav')
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            {{-- Left sidebar --}}
            @include('panel.partials.sidebar')

            {{-- Right side column. Contains the navbar and content of the page --}}
            <aside class="right-side">

                @yield('breadcrumb')

                {{-- Main content --}}
                <section class="content">

                    {{-- Etiqueta para mostrar mensajes (Success, Warnings, errors de operaciones) --}}
	  	            @include('flash::message')
                    {{-- Con esta parte se muestra el error, en ese directorio esta el codigo --}}
                    @include('panel.partials.errors')
                
                    @yield('main-content')

                </section>{{-- /.content --}}
            </aside>{{-- /.right-side --}}
        </div>{{-- ./wrapper --}}


        {{-- jQuery 2.0.2 --}}
        <script src="{!! asset('js/jquery.min.js') !!}"></script>
        {{-- Bootstrap --}}
        <script src="{{ asset('AdminLTE/js/bootstrap.min.js') }}" type="text/javascript"></script>
        {{-- AdminLTE App --}}
        <script src="{{ asset('AdminLTE/js/AdminLTE/app.min.js') }}" type="text/javascript"></script>

        {{-- Script para mensajes flash --}}
        <script>
            $('#flash-overlay-modal').modal();
        </script>

        {{-- Scripts para fecha y hora detalle al cerrar sesión --}}
        <script src="{{ asset('AdminLTE/plugins/fecha-hora/fecha-hora.min.js') }}" type="text/javascript"></script>

        @yield('script')

    </body>
</html>