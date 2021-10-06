{{-- Left side column. contains the logo and sidebar --}}
<aside class="left-side sidebar-offcanvas">
    {{-- sidebar: style can be found in sidebar.less --}}
    <section class="sidebar">
        {{-- Sidebar user panel --}}
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE/img/avatar10.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hola, {{ Auth::user()->name }}</p>

                <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        {{-- sidebar menu: : style can be found in sidebar.less --}}
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            
            @if ( !Auth::user()->isAdmin() )
            {{-- Pedidos --}}
            <li class="treeview {{ Request::segment(2) === 'orders' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Pedidos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/orders/create') ? 'active' : '' }}"><a href="{{ route('orders.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo pedido</a></li>
                    <li class="{{ Request::is('admin/orders') ? 'active' : '' }}"><a href="{{ route('orders.index') }}"><i class="fa fa-angle-double-right"></i> Listado de pedidos</a></li>
                </ul>
            </li>
            @endif

            @if ( Auth::user()->isAdmin() )
            {{-- Productos --}}
            <li class="treeview {{ Request::segment(2) === 'products' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Productos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/products/create') ? 'active' : '' }}"><a href="{{ route('products.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo producto</a></li>
                    <li class="{{ Request::is('admin/products') ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="fa fa-angle-double-right"></i> Listado de productos</a></li>
                </ul>
            </li>
            {{-- Ingresos --}}
            <li class="treeview {{ Request::segment(2) === 'inputproducts' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-level-down"></i> <span>Ingresos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/inputproducts/create') ? 'active' : '' }}"><a href="{{ route('inputproducts.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo ingreso</a></li>
                    <li class="{{ Request::is('admin/inputproducts') ? 'active' : '' }}"><a href="{{ route('inputproducts.index') }}"><i class="fa fa-angle-double-right"></i> Listado de ingresos</a></li>
                </ul>
            </li>
            {{-- Egresos --}}
            <li class="treeview {{ Request::segment(2) === 'outputproducts' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-level-up"></i> <span>Egresos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/outputproducts/create') ? 'active' : '' }}"><a href="{{ route('outputproducts.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo egreso</a></li>
                    <li class="{{ Request::is('admin/outputproducts') ? 'active' : '' }}"><a href="{{ route('outputproducts.index') }}"><i class="fa fa-angle-double-right"></i> Listado de Egresos</a></li>
                </ul>
            </li>
            {{-- Pedidos --}}
            <li class="treeview {{ Request::segment(2) === 'userorders' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-cart-plus"></i> <span>Pedidos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/userorders/reservedorders') ? 'active' : '' }}"><a href="{{ route('reservedorders') }}"><i class="fa fa-angle-double-right"></i> Listado pedidos reserv.</a></li>
                    <li class="{{ Request::is('admin/userorders/canceledorders') ? 'active' : '' }}"><a href="{{ route('canceledorders') }}"><i class="fa fa-angle-double-right"></i> Listado pedidos cancel.</a></li>
                </ul>
            </li>
            {{-- Maquinas --}}
            <li class="treeview {{ Request::segment(2) === 'machines' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>Máquinas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/machines/create') ? 'active' : '' }}"><a href="{{ route('machines.create') }}"><i class="fa fa-angle-double-right"></i> Nueva máquina</a></li>
                    <li class="{{ Request::is('admin/machines') ? 'active' : '' }}"><a href="{{ route('machines.index') }}"><i class="fa fa-angle-double-right"></i> Listado de máquinas</a></li>
                </ul>
            </li>
            {{-- Routers --}}
            <li class="treeview {{ Request::segment(2) === 'routers' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-wifi"></i> <span>Routers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/routers/create') ? 'active' : '' }}"><a href="{{ route('routers.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo router</a></li>
                    <li class="{{ Request::is('admin/routers') ? 'active' : '' }}"><a href="{{ route('routers.index') }}"><i class="fa fa-angle-double-right"></i> Listado de routers</a></li>
                </ul>
            </li>
            {{-- Correos --}}
            <li class="treeview {{ Request::segment(2) === 'mails' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Correos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/mails/create') ? 'active' : '' }}"><a href="{{ route('mails.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo correo</a></li>
                    <li class="{{ Request::is('admin/mails') ? 'active' : '' }}"><a href="{{ route('mails.index') }}"><i class="fa fa-angle-double-right"></i> Listado de correos</a></li>
                </ul>
            </li>
            {{-- Viaticos --}}
            <li class="treeview {{ Request::segment(2) === 'viatics' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-car"></i> <span>Viáticos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/viatics/create') ? 'active' : '' }}"><a href="{{ route('viatics.create') }}"><i class="fa fa-angle-double-right"></i> Nuevo viático</a></li>
                    <li class="{{ Request::is('admin/viatics') ? 'active' : '' }}"><a href="{{ route('viatics.index') }}"><i class="fa fa-angle-double-right"></i> Listado de viáticos</a></li>
                </ul>
            </li>
            {{-- Tareas --}}
            <li class="treeview {{ Request::segment(2) === 'workassignments' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Tareas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/workassignments/create') ? 'active' : '' }}"><a href="{!! route('workassignments.create') !!}"><i class="fa fa-angle-double-right"></i> Nueva tareas</a></li>
                    <li class="{{ Request::is('admin/workassignments') ? 'active' : '' }}"><a href="{{ route('workassignments.index') }}"><i class="fa fa-angle-double-right"></i> Listado de tareas</a></li>
                    <li class="{{ Request::is('admin/workassignments') ? 'active' : '' }}"><a href="{{ route('workassignments.bentrada') }}"><i class="fa fa-angle-double-right"></i>Bandeja de entrada </a></li>
                </ul>
            </li>
            {{-- Parametros Generales --}}
            <li class="treeview {{ Request::segment(2) === 'parameters' ? 'active' : null }}">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Parámetros Generales</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/parameters/actions') ? 'active' : '' }}"><a href="{{ route('actions.index') }}"><i class="fa fa-angle-double-right"></i> Acciones</a></li>
                    <li class="{{ Request::is('admin/parameters/areas') ? 'active' : '' }}"><a href="{{ route('areas.index') }}"><i class="fa fa-angle-double-right"></i> Áreas</a></li>
                    <li class="{{ Request::is('admin/parameters/statusrepairs') ? 'active' : '' }}"><a href="{{ route('statusrepairs.index') }}"><i class="fa fa-angle-double-right"></i> Est. de reparación</a></li>
                    <li class="{{ Request::is('admin/parameters/statusoutputs') ? 'active' : '' }}"><a href="{{ route('statusoutputs.index') }}"><i class="fa fa-angle-double-right"></i> Est. de salida</a></li>
                    <li class="{{ Request::is('admin/parameters/machinetypes') ? 'active' : '' }}"><a href="{{ route('machinetypes.index') }}"><i class="fa fa-angle-double-right"></i> Tipos de máquinas</a></li>
                    <li class="{{ Request::is('admin/parameters/users') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
    {{-- /.sidebar --}}
</aside>