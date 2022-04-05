<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') - Universidad de Talca</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="js/dashboard.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    

</head>
<body>
    <div id="app">

        @guest

        @if (Route::has('login'))

        @endif

        @else
            
        <!-- MODAL DATOS DE USUARIO  -->
            <div class="container">
                <div class="row">
                    <div class ="col-md-12">
                        <div tabIndex="-1"  class="modal fade" id="modal_profile" aria-hidden="true" aria-labelledby="modalLabel">
                            <div class="modal-dialog modal-md">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center"  style="margin: auto">Perfil de Usuario</h1>
                                        </div>
                                        <div class="modal-body">
                                            <h4 style="color: black; font-weight: bold">Nombre</h4>
                                            <h6 style="color: black">{{Auth::user()->nombre}}</h6>      
                                            <h4 style="color: black; font-weight: bold">Correo Electrónico</h4>
                                            <h6 style="color: black">{{Auth::user()->email}}</h6>      
                                            <h4 style="color: black; font-weight: bold">Carrera</h4>
                                            <h6 style="color: black">{{Auth::user()->facultad}}</h6>               
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cerrar</button>
                                        </div> 
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class ="col-md-12">
                        <div tabIndex="-1"  class="modal fade" id="modal_logout" aria-hidden="true" aria-labelledby="modalLabel">
                            <div class="modal-dialog modal-md">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="justify-content-center"  style="margin: auto">Cerrar sesión</h1>
                                        </div>
                                        <div class="modal-body">
                                            ¿Está seguro que desea finalizar la sesión?          
                                        </div>
                                        <div class="modal-footer">
                                            <a href="/logout"><button class="btn btn-danger" style="width: 120%;">Cerrar sesión</button></a>
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button" style="margin-left: 25px">Cancelar</button>
                                        </div> 
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endguest
        <div id="wrapper">

            @guest

            @if (Route::has('login'))

            @endif

            @else

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #333333">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home" style="height: 100px; ">
                    <div class="sidebar-brand-text mx-3"><img src="/images/logo.png" alt="" style="width: 130px; height: 100px"></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="text-center" style="font-size: 15px; color: white; font-weight: bold">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Header -->
                <div class="sidebar-heading">
                    Principal
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/home">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Inicio</span></a>
                </li>
                
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Header -->
                <div class="sidebar-heading">
                    Tablas
                </div>
               <!--Listado de carreras -->
                <li class="nav-item">
                    <a class="nav-link" href="/carreras">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Carreras</span></a>
                </li>

                <!-- Listado de Usuarios -->
                <li class="nav-item">
                    <a class="nav-link" href="/usuarios">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Usuarios</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Message -->
                <div class="sidebar-card d-none d-lg-flex">
                    <p class="text-center mb-2">Sitio Web desarrollado por <strong>Rubén Ramírez</strong> para la Universidad de Talca</p>
                </div>

            </ul>
            <!-- End of Sidebar -->


            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Contenido principal -->
                <div id="content" style="background-color: #f6f6f6">
                <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #333333">
                    <!-- Topbar-->
                    <ul class="navbar-nav ms-auto ml-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white"><i class="fas fa-user fa-fw"></i> {{Auth::user()->nombre}}</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal_profile" aria-expanded="true">
                                        Ver perfil
                                    </a></li>
                                    <li><a class="dropdown-item" href="">Cambiar contraseña</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href=""  data-bs-toggle="modal" data-bs-target="#modal_logout"
                                        aria-expanded="true">Cerrar sesión</a></li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endguest
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
</body>
</html>
