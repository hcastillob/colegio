<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>San Gabriel | Sistema de Gesti&oacute;n Acad&eacute;mica</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('/css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body id="app-layout">
    <div class="container">
        <!--header>
            <h1>Sistema de Gestión Académica</h1>
        </header-->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">Colegio San Gabriel</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <img src="img/perfil.jpg" alt="H" height="50px" width="50px" class="img-responsive img-circle">
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-address-book" aria-hidden="true"></i> Mis datos</a></li>
                                <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Seguridad</a></li>
                                <li class="divider"></li>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i> Cerrar sesi&oacute;n</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>Men&uacute;</p>
                    </div>
                    <div class="panel body">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
                            <li role="presentation"><a href="{{url('profesor/cursos')}}"><i class="fa fa-book" aria-hidden="true"></i> Mis Cursos</a></li>
                            <li role="presentation"><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Mis Notas</a></li>
                            <li role="presentation"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Horario</a></li>
                            <li role="presentation"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Contactos</a></li>
                            <li class="divider"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    Ayuda <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-map-o" aria-hidden="true"></i> Acerca del manejo del sistema</a></li>
                                    <li class="divider"></li>                                   
                                    <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Acerca del desarrollador</a></li>
                                </ul>
                            </li>
                            <!--li role="presentation"><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Ayuda (?)</a></li-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 bg-info">
                @yield('content')
            </div>
        </div>
    </div>
    <hr>
    <footer class="container footer text-center">
        <div class="row">
            <span>&copy; Todos los Derechos Reservados | </span><small>Desarrollado por <a href="#">@ehitalocb</a></small>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
