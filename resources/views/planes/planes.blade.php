@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Planes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>

@section('content')
<body>


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @foreach($name as $n)
            <h1 class="mb-0 text-gray-800"> {{ $n['nombre'] }} </h1>
        @endforeach
        </div>
        <button class="agregar_carrera" data-bs-toggle="modal" data-bs-target="#modal_crear_plan"  style="margin-bottom: 10px;">
            Añadir plan de estudio                    
        </button>


        <table id="lista" class="table table-striped table-bordered" width="100%">
            <thead>
                <tr style="font-weight: bold; background-color: #8f6ea3; color: white">
                    <th style="width: 350px">Plan </th>
                    <th style="width: 350px">Fecha de actualización </th>
                    <td></td>
                </tr>
            </thead>
            
            <tbody>
            
            
            @foreach($data as $item)
                <tr>
                    <td style="width: 350px"> {{ $item['Nombre'] }}</td>
                    <td style="width: 350px">{{ $item['updated_at'] }}</td>
                    <td style="width: 100px">
                        <button type="button" id="mod">
                        <button type="button" id="del">
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
            
        </table> 


        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1" class="modal fade" id="modal_crear_plan" aria-hidden="true"> 
                        <div class="modal-dialog modal-md">
                            <form action="/carreras/{{$id}}/crearPlan" method="POST" class="form-group">
                            @csrf
                            @method('POST')
                                <div class="modal-content" style="width: 600px">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Crear Plan de Estudio</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Nombre del plan</label>
                                                <input class="form-control form-control-lg" name="nombre_plan" style="width: 550px"  placeholder="Ingrese el nombre del plan"/>
                                                <span style="color: red">@error('nombre_plan')  Debe ingresar un nombre para el plan  @enderror</span>                 
                                            </div>

                                            <div class="form-group">
                                                <input name="nombre_carrera" type="hidden" value="{{ $id }}">              
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                                <button class="button-accept" type="submit">Guardar</button>
                                                <button class="button-cancel" data-bs-dismiss="modal" type="button">Cancelar</button>
                                    </div> 
                                
                                </div>
                            </form>
                        </div>
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
            var table = $('#lista').DataTable( {
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


</html>


@endsection
