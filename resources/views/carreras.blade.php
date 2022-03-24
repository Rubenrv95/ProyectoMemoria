@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de carreras</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
@section('content')
<body >
        <div class="container-fluid">   
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0 text-gray-800">Lista de Carreras</h1>
                </div>

                <button class="agregar_carrera" data-bs-toggle="modal" data-bs-target="#modal_crear_carrera" style="margin-bottom: 10px;">
                        Agregar carrera                    
                </button>

                <table id="carreras_lista" class="table table-striped table-bordered" width="100%">
                        <thead>
                                <tr style="font-weight: bold; background-color: #8f6ea3; color: white">
                                <td>Carrera </td>
                                <td>Área profesional </td>
                                <td></td>
                                </tr>
                        </thead>
                        
                        <tbody>
                        
                                @foreach($carrera as $item)
                                <tr>
                                <td> {{$item['nombre']}}</td>
                                <td>{{$item['area']}}</td>
                                <td>
                                        <a href="/carreras/{{$item['id']}}"><button type="button" id="info" > </button></a>
                                        <button type="button" id="mod" data-bs-toggle="modal" data-bs-target="#modal_modificar_carrera" class="edit"> </button>
                                        <button type="button" id="del" data-bs-toggle="modal" data-bs-target="#modal_eliminar_carrera" class="delete"> </button>
                                </td>
                                
                                </tr>
                                @endforeach
                        
                        </tbody>
                </table> 

        </div>


        <!-- Modal modificar carrera   -->

        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_modificar_carrera" aria-hidden="true">
                        <div class="modal-dialog modal-md" >

                            <form method = "post" action = "/carreras" class="form-group" id = "editForm">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Modificar carrera</h1>
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
                                        <button class="button-cancel" data-bs-dismiss="modal" type="button"> Cancelar</button>
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
                    <div class="modal fade" id="modal_eliminar_carrera" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form method = "post" action = "/carreras" class="form-group" id = "deleteForm">

                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Eliminar Carrera</h1>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="method" value="DELETE"> 
                                        <p style="font-size: 18">¿Está seguro de que desea eliminar ésta carrera?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="button-delete">Eliminar</button>
                                        <button class="button-cancel" data-bs-dismiss="modal" type="button"> Cancelar</button>
                                    </div> 
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>    
        $(document).ready(function() {
            var table = $('#carreras_lista').DataTable({

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
</body>
@endsection

</html>
@include('modals.crearCarrera')