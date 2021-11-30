@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
@section('pageTitle', 'Inicio')
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    
</head>

@section('content')

<body style="background-image:none; background-color: #f6f6f6">    

    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <b-navbar-brand class="md-mx-auto">
                <img class="navbar-logo" src="images/utalca_icon.png" alt="Tryvium Logo">
            </b-navbar-brand>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto">
                    <div class="row" style="margin-right: 20px">
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="/carreras" style="color:white; font-size: 16">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-size: 16">
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

    <div class="container">
        <div class="inicio">
            <div id="lista" style="width: auto; margin:center;">
            <h1 style="margin: center; text-align: center; font-weight: bold; font-size: 36">Listado de carreras</h1>
                <!--<input type="text" id="busc_carrera" onkeyup="buscarCarrera()" placeholder="Buscar carrera..."> -->
                <div class="col text-right">
                    <button class="agregar_carrera" href="/views/crearCarrera" data-toggle="modal" data-target="#modal_crear_carrera" style="color:black; font-size: 16; margin-bottom: 10px;">
                        Agregar carrera                    
                    </button>
                    <button class="agregar_carrera" href="#" data-toggle="modal" data-target="#modal_user" style="color:black; font-size: 16; margin-bottom: 10px;">
                        Agregar usuario
                    </button>
                </div>

                <table id="carreras_lista" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr style="font-weight: bold; background-color: #8f6ea3; color: white">
                            <td class="td-sm" style="width: 350px">Carrera </td>
                            <td class="td-sm" style="width: 350px">Área profesional </td>
                            <td></td>
                        </tr>
                    <tbody>
                    @foreach($carrera as $item) 
                        <tr>
                            <td style="width: 350px"> {{$item['Nombre de la Carrera']}}</td>
                            <td style="width: 350px">{{$item['Area profesional']}}</td>
                            <td style="width: 100px">
                                 <a href="carreras/{{$item['Nombre de la Carrera']}}"><button type="button" id="info" > </button></a>
                                <button type="button" id="mod_carrera" data-toggle="modal" data-target="#modal_modificar_carrera" class="edit">
                                <button type="button" id="del_carrera" data-toggle="modal" data-target="#modal_eliminar_carrera" class="delete">
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
                                    <button type="submit" class="button-delete">{{ _('Eliminar') }}</button>
                                    <button type ="button" class="button-cancel" data-dismiss="modal">{{ _('Cancelar') }}</button>
                                </div> 
                            </div>

                        </form>
                    </div>
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
            var table = $('#carreras_lista').DataTable( {

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

</html>

@include('modals.crearUsuario')
@include('modals.crearCarrera')