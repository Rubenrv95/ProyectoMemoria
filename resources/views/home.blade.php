@extends('layouts.app')

@section('pageTitle', 'Inicio')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />

<navbar-component> </navbar-component>

<body style="background-image:none">    
        <div class="inicio">
            <div id="lista" style="width: 400px; float: left;">
                <input type="text" id="busc_carrera" onkeyup="buscarCarrera()" placeholder="Buscar carrera...">


                <ul id="carreras_lista"> 
                    @foreach($carreras as $item) 
                    <li>
                        <a href="#"> 
                            {{$item['Nombre de la Carrera']}}
                            <input type="button" id="mod_carrera">
                            <input type="button" id="del_carrera">
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