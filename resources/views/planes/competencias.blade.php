@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @foreach ($plan as $p)
        <title>Competencias {{$p['Nombre']}}</title>
        @endforeach

        @foreach ($carrera as $c)
        @endforeach
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
@section('content')
<body >
        <div class="container-fluid">   
                
                <a href="/carreras/{{$c['id']}}/{{$p['id']}}"></a>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0 text-gray-800">{{$p['Nombre']}} - {{$c['nombre']}} </h1>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0 text-gray-800" style="font-size: 32px">Competencias </h1>
                </div>

                <button class="agregar" data-bs-toggle="modal" data-bs-target="#modal_crear_competencia" style="margin-bottom: 10px;">
                        Agregar competencia                   
                </button>

                <table id="lista" class="table table-striped table-bordered" width="100%">
                        <thead>
                                <tr style="font-weight: bold; color: white">
                                <th>ID <img src="/images/arrows.png" alt="" srcset=""> </th>
                                <th>Descripción<img src="/images/arrows.png" alt="" srcset=""></th>
                                <th>Tipo de Competencia <img src="/images/arrows.png" alt="" srcset=""></th>
                                <th style="width: 150px"></th>
                                </tr>
                        </thead>
                        
                        <tbody>
                        
                            @foreach ($competencia as $comp)   
                                <tr>
                                <td>{{$comp['id']}}</td>
                                <td>{{$comp['Descripcion']}}</td>
                                <td>{{$comp['Tipo']}}</td>
                                <td>
                                        <button type="button" id="mod" data-bs-toggle="modal" data-bs-target="#modal_modificar_competencia" class="edit"> </button>
                                        <button type="button" id="del" data-bs-toggle="modal" data-bs-target="#modal_eliminar_competencia" class="delete"> </button>
                                </td>
                                
                                </tr>
                            @endforeach   
                        
                        </tbody>
                </table> 

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0 text-gray-800" style="font-size: 32px">Aprendizajes</h1>
                </div>

                <button class="agregar" data-bs-toggle="modal" data-bs-target="#modal_crear_aprendizaje" style="margin-bottom: 10px;">
                        Agregar aprendizaje                    
                </button>

                <table id="lista2" class="table table-striped table-bordered" width="100%">
                        <thead>
                                <tr style="font-weight: bold; color: white">
                                <th>ID <img src="/images/arrows.png" alt="" srcset=""> </th>
                                <th>Descripción <img src="/images/arrows.png" alt="" srcset=""></th>
                                <th>Competencia Asociada <img src="/images/arrows.png" alt="" srcset=""></th>
                                <th style="width: 150px"></th>
                                </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($aprendizaje as $a)   
                                <tr>
                                <td>{{$a['id']}}</td>
                                <td>{{$a['Descripcion_aprendizaje']}}</td>
                                <td>{{$a['Descripcion']}}</td>
                                <td>
                                        <button type="button" id="mod" data-bs-toggle="modal" data-bs-target="#modal_modificar_aprendizaje" class="edit2"> </button>
                                        <button type="button" id="del" data-bs-toggle="modal" data-bs-target="#modal_eliminar_aprendizaje" class="delete2"> </button>
                                </td>
                                
                                </tr>
                            @endforeach   

                        </tbody>
                </table> 


        </div>


        <!-- MODALS COMPETENCIA -->

        <!-- Modal crear competencia   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1"  class="modal fade" id="modal_crear_competencia" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form action="/carreras/{{$c['id']}}/{{$p['id']}}/competencias" method="POST" class="form-group">
                            @csrf
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Agregar competencia</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Descripción de la competencia</label>
                                                <input class="form-control form-control-lg" name="desc_competencia" style="width: 470px" type="text"  placeholder="Ingrese la descripción de la competencia"/>
                                                <span style="color: red">@error('desc_competencia')  Debe ingresar una descripción para la competencia  @enderror</span>
                                            </div>

                                            <div class="form-group" style="margin: auto">
                                                <label style="font-size: 20">Tipo de Competencia</label>
                                                <select class="form-select form-select-lg" name="tipo" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
                                                    <option selected value="Carrera">Carrera</option>
                                                    <option value="Plan Común">Plan Común</option>
                                                    <option value="Idiomas">Idiomas</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit"> Guardar</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"> Cancelar</button>
                                    </div> 
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal modificar competencia   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_modificar_competencia" aria-hidden="true">
                        <div class="modal-dialog modal-md" >

                            <form method = "POST" action = "/carreras/{{$c['id']}}/{{$p['id']}}/competencias" class="form-group" id = "editForm">

                            @csrf
                            @method('PUT')

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Modificar competencia</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Descripción de la competencia</label>
                                                <input class="form-control form-control-lg" name="desc_competencia" id="desc_competencia" style="width: 470px" type="text"  placeholder="Ingrese la descripción de la competencia"/>
                                                <span style="color: red">@error('desc_competencia')  Debe ingresar una descripción para la competencia  @enderror</span>
                                            </div>

                                            <div class="form-group" style="margin: auto">
                                                <label style="font-size: 20">Tipo de Competencia</label>
                                                <select class="form-select form-select-lg" name="tipo" id="tipo" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
                                                    <option selected value="Carrera">Carrera</option>
                                                    <option value="Plan Común">Plan Común</option>
                                                    <option value="Idiomas">Idiomas</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"> Cancelar</button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal eliminar competencia   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_eliminar_competencia" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form method = "POST" action = "/carreras/{{$c['id']}}/{{$p['id']}}/competencias" class="form-group" id = "deleteForm">

                                @csrf
                                @method('DELETE')

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Eliminar competencia</h1>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="method" value="DELETE"> 
                                        <p style="font-size: 18">¿Está seguro de que desea eliminar ésta competencia?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"> Cancelar</button>
                                    </div> 
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Terminan Modals Competencia -->

        <!--MODALS APRENDIZAJE -->

        <!-- Modal crear aprendizaje   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1"  class="modal fade" id="modal_crear_aprendizaje" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form action="/carreras/{{$c['id']}}/{{$p['id']}}/competencias/aprendizajes" method="POST" class="form-group">
                            @csrf
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Agregar aprendizaje</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Descripción de la competencia</label>
                                                <input class="form-control form-control-lg" name="desc_aprendizaje" style="width: 470px" type="text"  placeholder="Ingrese la descripción de la competencia"/>
                                                <span style="color: red">@error('desc_aprendizaje')  Debe ingresar una descripción para el aprendizaje  @enderror</span>
                                            </div>

                                            <div class="form-group" style="margin: auto">
                                                <label style="font-size: 20">Competencia asociada</label>
                                                <select class="form-select form-select-lg" name="refComp" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
                                                @foreach ($competencia as $comp)   
                                                    <option selected value="{{$comp['id']}}">{{$comp['Descripcion']}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit"> Guardar</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"> Cancelar</button>
                                    </div> 
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal modificar aprendizaje   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_modificar_aprendizaje" aria-hidden="true">
                        <div class="modal-dialog modal-md" >

                            <form method = "post" action = "/competencias" class="form-group" id = "editForm2">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Modificar aprendizaje</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Descripción de la competencia</label>
                                                <input class="form-control form-control-lg" name="desc_aprendizaje" id="desc_aprendizaje" style="width: 470px" type="text"  placeholder="Ingrese la descripción de la competencia"/>
                                                <span style="color: red">@error('desc_aprendizaje')  Debe ingresar una descripción para el aprendizaje  @enderror</span>
                                            </div>

                                            <div class="form-group" style="margin: auto">
                                                <label style="font-size: 20">Tipo de Competencia</label>
                                                <select class="form-select form-select-lg" name="refComp" id="refComp" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18" placeholder="Seleccione una competencia">
                                                    @foreach ($competencia as $comp)   
                                                        <option selected value="{{$comp['id']}}">{{$comp['Descripcion']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"> Cancelar</button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal eliminar aprendizaje   -->
        <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_eliminar_aprendizaje" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form method = "post" action = "/competencias" class="form-group" id = "deleteForm2">

                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Eliminar aprendizaje</h1>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="method" value="DELETE"> 
                                        <p style="font-size: 18">¿Está seguro de que desea eliminar ésta competencia?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"> Cancelar</button>
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

            var table2 = $('#lista2').DataTable({

                "sDom": '<"top"f>        rt      <"bottom"ip>      <"clear">'
            });



            //TABLA DE COMPETENCIAS

            //modificar
            table.on('click', '.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }


                var data = table.row($tr).data();
                console.log(data);

                $('#desc_competencia').val(data[1]);
                $('#tipo').val(data[2]);

                $('#editForm').attr('action', '/carreras/{{$c['id']}}/{{$p['id']}}/competencias/'+data[0]);
                $('#modal_modificar_competencia').modal('show');

            });


            //eliminar
            table.on('click', '.delete', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);


                $('#deleteForm').attr('action', '/carreras/{{$c['id']}}/{{$p['id']}}/competencias/'+data[0]);
                $('#modal_eliminar_competencia').modal('show');

            }  );


            //TABLA DE APRENDIZAJES
            

            //modificar
            table2.on('click', '.edit2', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }


                var data = table2.row($tr).data();
                console.log(data);

                $('#desc_aprendizaje').val(data[1]);
                //$('#refComp').val(data[2]);

                $('#editForm2').attr('action', '/carreras/{{$c['id']}}/{{$p['id']}}/competencias/aprendizajes/'+data[0]);
                $('#modal_modificar_aprendizaje').modal('show');

            });


            //eliminar
            table2.on('click', '.delete2', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table2.row($tr).data();
                console.log(data);


                $('#deleteForm2').attr('action', '/carreras/{{$c['id']}}/{{$p['id']}}/competencias/aprendizajes/'+data[0]);
                $('#modal_eliminar_aprendizaje').modal('show');

            }  );
        });

    </script>
</body>
@endsection

</html>
