<template>
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <b-navbar-brand class="md-mx-auto">
                <img class="navbar-logo" src="images/utalca_icon.png" alt="Tryvium Logo">
            </b-navbar-brand>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="margin-left: 30px">
                    <li class="nav-item active">
                        <a class="nav-link" href="" style="color:white; font-size: 16">Agregar carrera<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="" style="color:white; font-size: 16">Agregar usuario<span class="sr-only">(current)</span></a>
                    </li>


                </ul>       
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home" style="color:white; font-size: 16">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown" style="margin-right: 20%">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-size: 16">
                        Cuenta
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/login/logout">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
