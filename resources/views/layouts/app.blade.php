<!DOCTYPE html>

<html lang="es">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mini Academico </title>
    
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">


    <link href="{{ asset('css/miniAcademico.css') }}" rel="stylesheet">
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <div id="app">
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
          <div class="navbar-wrapper">
            <div class="navbar-header">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
                <li class="nav-item"><a href="#" class="navbar-brand nav-link"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
              </ul>
            </div>
            <div class="navbar-container content container-fluid">
              <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav float-xs-right">
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" data-toggle="dropdown" class="nav-link " onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="icon-switch"></i>
                        <span class="user-name">Cerrar Sesión</span>
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
    </nav>


    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
          <div class="main-menu-header">
            <input type="text" placeholder="Dashboard" class="menu-search form-control round" disabled />
          </div>      <div class="main-menu-content">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                @if (Auth::guest())
              
                    <li class="nav-item">
                        <a href="{{ route('login') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Register</span></a>
                    </li>
                @elseif(Auth::user()->getRol() == 'Administrador')
                    <li class="nav-item">
                        <a href="{{ route('docente') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Docente</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('curso') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">curso</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alumno') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Alumno</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('inscripcion') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Inscripcion</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pagos') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Pagos</span></a>
                    </li>
                @elseif(Auth::user()->getRol() == 'Docente')
                    <li class="nav-item">
                        <a href="{{ route('pagosalumno') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Pagos de Alumnos</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('alumnoslista') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Lista de Alumnos</span></a>
                    </li>

                @endif
            </ul>
          </div>
    </div>

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
                    @yield('content')
                
            </div>
        </div>
    </div>
   
    
</div>

<script src="{{ asset('js/miniAcademico.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</body>

</html>