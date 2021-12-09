@extends('layouts.app')
@section('pageTitle', 'Lista de Planes')
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">



</head>
@section('content')

<body style="background-image:none; background-color: #f6f6f6">

    <!-- Barra de navegacion -->
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <b-navbar-brand class="md-mx-auto">
                <img class="navbar-logo" src=".../images/utalca_icon.png" alt="Tryvium Logo">
            </b-navbar-brand>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto">
                    <div class="row" style="margin-right: 20px">
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="/carreras" style="color:white; font-size: 16px; margin-right: 10px">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-size: 16px">
                            Cuenta
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Configuración</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/login/logout">Cerrar sesión</a>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>

    <h1 style="text-align: center"> {{ $name }} </h1>


    <div class="container">

        <table id="planes_lista" class="table table-striped table-bordered" width="100%">
            <thead>
                <tr style="font-weight: bold; background-color: #8f6ea3; color: white">
                    <td class="td-sm" style="width: 350px">Plan </td>
                    <td class="td-sm" style="width: 350px">Fecha de actualización </td>
                    <td></td>
                </tr>
            </thead>
            
            <tbody>
            
            
            @foreach($data as $item)
                <tr>
                    <th style="width: 350px"> {{ $item['Nombre'] }}</th>
                    <td style="width: 350px">{{ $item['updated_at'] }}</td>
                    <td style="width: 100px">
                        <button type="button" id="mod">
                        <button type="button" id="del">
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
            
        </table> 

            <div class="card" style="width:auto; height: auto; background-color: transparent; border: none">
                <div class="card-body">
                    <div class="col text-center">
                        <button class="agregar_plan" data-toggle="modal" data-target="#modal_crear_plan">
                            Añadir plan de estudio                    
                        </button>
                    </div>
                </div>
            </div>
    </div>


</body>

@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>    
        $(document).ready(function() {
            var table = $('#planes_lista').DataTable( {
                "sDom": '<"top"f>        rt      <"bottom"ip>      <"clear">'
                
            });

            //modificar
            table.on('click', '.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }


                var data = table.row($tr).data();
                console.log(data);

                $('#nombre_carrera').val(data[0]);
                $('#area').val(data[1]);

                $('#editForm').attr('action', '/carreras/'+data[0]);
                $('#modal_modificar_carrera').modal('show');

            });


            //eliminar
            table.on('click', '.delete', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);


                $('#deleteForm').attr('action', '/carreras/'+data[0]);
                $('#modal_eliminar_carrera').modal('show');

            }  );
            
        
            
        });

    </script>
@endsection

@include('modals.crearPlan')