@extends('layouts.app')

@section('pageTitle', 'Inicio')
<head>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css}" />
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    
</head>

@section('content')

<navbar-component> </navbar-component>
<body style="background-image:none; background-color: #f6f6f6">    

        <div class="container">
            <div class="inicio">
                <div id="lista" style="width: auto; margin:center;">
                <h1 style="margin: center; text-align: center">Listado de carreras</h1>
                    <input type="text" id="busc_carrera" onkeyup="buscarCarrera()" placeholder="Buscar carrera...">
                    <div class="col text-right">
                        <button class="agregar_carrera" href="/views/crearCarrera" data-toggle="modal" data-target="#modal_crear_carrera" style="color:black; font-size: 16; margin-bottom: 10px;">
                            Agregar carrera                    
                        </button>
                        <button class="agregar_carrera" href="#" data-toggle="modal" data-target="#modal_user" style="color:black; font-size: 16; margin-bottom: 10px;">Agregar usuario</button>
                    </div>

                    <table id="carreras_lista" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td class="td-sm" style="width: 350px">Carrera </td>
                                <td class="td-sm" style="width: 350px">Área profesional </td>
                            </tr>
                        <tbody>
                        @foreach($carrera as $item) 
                            <tr>
                                <th style="width: 350px"> <a href="/planes">{{$item['Nombre de la Carrera']}}</a></th>
                                <td style="width: 350px">{{$item['Área profesional']}}</td>
                                <td style="width: 100px">
                                    <button type="button" id="mod_carrera" data-toggle="modal" data-target="#modal_modificar_carrera">
                                    <button type="button" id="del_carrera" data-toggle="modal" data-target="#modal_eliminar_carrera">
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>



        <!-- Modal modificar carrera   -->

        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_modificar_carrera">
                        <div class="modal-dialog modal-md" >

                            <form method = "post" action = "/carreras" class="form-group" id = "editForm">

                            {{ csrf_field()}}
                            {{ method_field('PUT')}}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 60; text-align: center"> Modificar carrera</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Nombre de la carrera</label>
                                            <input class="form-control form-control-lg" name="nombre_carrera" id ="nombre_carrera" style="width: 470px; margin-bottom: 20px" value="" placeholder="Ingrese el nombre de la carrera"/>
                                        </div>

                                        <div class="form-group" style="margin: auto">
                                            <label style="font-size: 20">Área profesional</label>
                                            <select class="form-select form-select-lg" name="area" id = "area" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
                                                    <option selected value="Administración y Comercio">Administración y Comercio</option>
                                                    <option value="Arte y Arquitectura">Arte y Arquitectura</option>
                                                    <option value="Carreras Técnicas">Carreras Técnicas</option>
                                                    <option value="Ciencias">Ciencias</option>
                                                    <option value="Ciencias Sociales">Ciencias Sociales</option>
                                                    <option value="Educación">Educación</option>
                                                    <option value="Recursos Naturales">Recursos Naturales</option>
                                                    <option value="Salud">Salud</option>
                                                    <option value="Tecnología">Tecnología</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="button-accept">Guardar</button>
                                        <button type="button" class="button-cancel" data-dismiss="modal">Cancelar</button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal eliminar carrera   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_eliminar_carrera">
                        <div class="modal-dialog modal-md" >
                            <form method = "post" action = "/carreras" class="form-group" id = "deleteForm">

                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 60; text-align: center"> {{ _('Eliminar Carrera') }}</h1>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="_method" value="DELETE"> 
                                        <p style="font-size: 18">¿Está seguro de que desea eliminar ésta carrera?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type ="button" class="button-delete delete">{{ _('Eliminar') }}</button>
                                        <button type ="button" class="button-cancel" data-dismiss="modal">{{ _('Cancelar') }}</button>
                                    </div> 
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    <script src="//cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <script>
    $(document).ready(function() {
        var table = $('#carreras_lista').DataTable();

        //modificar
        table.on('click', '.edit', function() {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('nombre_carrera').val(data[1]);

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

    function buscarCarrera() {
        // Declare variables
        var input, filter, table, tr, th, i, txtValue;
        input = document.getElementById("busc_carrera");
        filter = input.value.toUpperCase();
        table = document.getElementById("carreras_lista");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            th = tr[i].getElementsByTagName("th")[0];
            if (th) {
            txtValue = th.textContent || th.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
    }


    </script>

        
</body>
@endsection





@include('modals.crearUsuario')
@include('modals.crearCarrera')