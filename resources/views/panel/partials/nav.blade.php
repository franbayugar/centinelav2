{{-- header logo: style can be found in header.less --}}
<header class="header">
    <a href="{{ route('dashboard') }}" class="logo">
        {{-- Add the class icon to your logo image or logo icon to add the margining --}}
        Centinela
    </a>
    {{-- Header Navbar: style can be found in header.less --}}
    <nav class="navbar navbar-static-top" role="navigation">
        {{-- Sidebar toggle button--}}
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                {{-- User Account: style can be found in dropdown.less --}}
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        {{-- User image --}}
                        <li class="user-header bg-light-blue">
                            <img src="{{ asset('AdminLTE/img/avatar10.png') }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                <small>{{ Auth::user()->area->name }}</small>
                                <small id="Fecha_Reloj"></small>
                            </p>
                        </li>
                        {{-- Menu Footer--}}
                        <li class="user-footer">
                            {{-- Profile --}}
                            <div class="pull-left">
                                <a href="{{ route('profiles.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">Perfil</a>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Salir</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>