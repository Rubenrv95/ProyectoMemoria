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
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">
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
                                            <button class="button-cancel" data-bs-dismiss="modal" type="button">Cerrar</button>
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
                    <div class="col-md-12">
                        <div class="modal-fade">  

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
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"  style="background: rgb(79,43,105);
                background: linear-gradient(94deg, rgba(79,43,105,1) 25%, rgba(111,94,124,1) 100%, rgba(117,96,133,1) 100%); ">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"><img src="/images/utalca_icon.png" alt="" style="width: 215px; height: 50px"></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="text-center" style="font-size: 15px; color: white; font-weight: bold">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>{{Auth::user()->nombre}}</span>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Header-->
                <div class="sidebar-heading">
                    Cuenta
                </div>

                <!-- Perfil de Usuario-->
                <li class="nav-item">
                    <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#modal_profile"
                        aria-expanded="true">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Ver datos de usuario</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#modal_profile"
                        aria-expanded="true">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Cambiar contraseña</span>
                    </a>
                </li>


                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="/logout"
                        aria-expanded="true">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>

                
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Header -->
                <div class="sidebar-heading">
                    Navegación
                </div>

                <!--Página inicial -->
                <li class="nav-item">
                    <a class="nav-link" href="/home">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Inicio</span></a>
                </li>

               <!--Listado de carreras -->
                <li class="nav-item">
                    <a class="nav-link" href="/carreras">
                        <i class="fas fa-fw fa-chart-area"></i>
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


            @endguest
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content" style="background-color: #f6f6f6">
                    
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
</body>
</html>
