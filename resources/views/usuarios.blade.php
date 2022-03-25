@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de usuarios</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
@section('content')
<body >
        <div class="container-fluid">   
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0 text-gray-800">Lista de Usuarios</h1>
                </div>

                <button class="agregar_carrera" href="#" data-bs-toggle="modal" data-bs-target="#modal_user" style="font-size: 16; margin-bottom: 10px;">
                Agregar usuario
                </button>

                <table id="lista" class="table table-striped table-bordered" width="100%">
                        <thead>
                                <tr style="font-weight: bold; background-color: #8f6ea3; color: white">
                                <th>Nombre de usuario </th>
                                <th>Correo Electrónico </th>
                                <th>Facultad</th>
                                <th></th>
                                </tr>
                        </thead>
                        
                        <tbody>
                        
                                @foreach($user as $u)
                                <tr>
                                <td> {{$u['nombre']}}</td>
                                <td>{{$u['email']}}</td>
                                <td>{{$u['facultad']}}</td>
                                <td>
                                        <button type="button" id="mod" data-bs-toggle="modal" data-bs-target="#modal_modificar_carrera" class="edit"> </button>
                                        <button type="button" id="del" data-bs-toggle="modal" data-bs-target="#modal_eliminar_carrera" class="delete"> </button>
                                </td>
                                
                                </tr>
                                @endforeach
                        
                        </tbody>
                </table> 

        </div>


        <!-- Modal modificar usuario   -->

        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_modificar_usuario" aria-hidden="true">
                        <div class="modal-dialog modal-md" >

                            <form method = "post" action = "/usuarios" class="form-group" id = "editForm">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Modificar Usuario</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Nombre Completo</label>
                                            <input type="name" class="form-control form-control-lg" name="nombre" id="nombre" style="width: 470px; margin-bottom: 20px" placeholder="Ingrese el nombre del usuario" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Debe ingresar un nombre para el usuario</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20" >Correo Electrónico</label>
                                            <input type="email" class="form-control form-control-lg" name="email" id="email" style="width: 470px; margin-bottom: 20px" placeholder="Ingrese el correo del usuario" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Debe ingresar el correo del usuario</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group" style="margin: auto">
                                            <label style="font-size: 20">Facultad</label>
                                            <select class="form-select form-select-lg" name="facultad" id = "facultad" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
                                                    <option value="Talca">Talca</option>
                                                    <option value="Los Niches">Los Niches</option>
                                                    <option value="Linares">Linares</option>
                                                    <option value="Santiago">Santiago</option>
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




        <!-- Modal eliminar usuario   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_eliminar_usuario" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form method = "post" action = "/usuarios" class="form-group" id = "deleteForm">

                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Eliminar Usuario</h1>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="method" value="DELETE"> 
                                        <p style="font-size: 18">¿Está seguro de que desea eliminar a éste usuario?</p>
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
            var table = $('#lista').DataTable({

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

                $('#nombre').val(data[0]);
                $('#email').val(data[1]);
                $('#facultad').val(data[2]);

                $('#editForm').attr('action', '/usuarios/'+data[0]);
                $('#modal_modificar_usuario').modal('show');

            });


            //eliminar
            table.on('click', '.delete', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);


                $('#deleteForm').attr('action', '/usuarios/'+data[0]);
                $('#modal_eliminar_usuario').modal('show');

            }  );
            
        });

    </script>
</body>
@endsection

</html>

@include('modals.crearUsuario')
