@extends('layouts.app')

@section('pageTitle', 'Inicio')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />

<navbar-component> </navbar-component>

<body style="background-image:none">    





        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    
                </div>
            </div>
        </div>





        <div class="inicio">
            <div id="lista" style="width: 400px; float: left; border: 1px solid black">
                <input type="text" id="busc_carrera" onkeyup="buscarCarrera()" placeholder="Buscar carrera...">
                <div class="col text-center">
                    <button class="agregar_carrera" href="/views/crearCarrera" data-toggle="modal" data-target="#modal_crear_carrera" style="color:black; font-size: 16; margin-bottom: 10px;">
                        Agregar carrera                    
                    </button>
                </div>

                <ul id="carreras_lista"> 
                    @foreach($carreras as $item) 
                    <li>
                        <a href="#"> 
                            {{$item['Nombre de la Carrera']}}
                            <input type="button" id="mod_carrera" data-toggle="modal" data-target="#modal_modificar_carrera">
                            <input type="button" id="del_carrera" data-toggle="modal" data-target="#modal_eliminar_carrera">
                        </a>

                    </li>
                    @endforeach
                </ul> 
            </div>


            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Planes de estudio</div>

                                <div class="alert alert-danger success-block">
                                    <strong>Bienvenido</strong>  
                        <div class="card-body">
                            Esto aún no está implementado, pero aquí irán los planes de estudio.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</body>
@endsection

<script>
    function buscarCarrera() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('busc_carrera');
        filter = input.value.toUpperCase();
        ul = document.getElementById("carreras_lista");
        li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }


</script>

<script type="test/javascript">
    @if (count($errors) > 0) 
        $('#modal_crear_carrera').modal('show');
    @endif

</script>


@include('modals.crearUsuario')
@include('modals.crearCarrera')
@include('modals.modificarCarrera')
@include('modals.eliminarCarrera')