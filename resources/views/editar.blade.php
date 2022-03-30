@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar
        @foreach ($plan as $p)
            {{$p['Nombre']}}
        @endforeach
        -
        @foreach ($carrera as $c)
            {{$c['nombre']}} 
        @endforeach
    </title>
</head>
@section('content')
<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="mb-0 text-gray-800">
                    @foreach ($carrera as $c)
                    {{$c['nombre']}} 
                    @endforeach
                    -
                    @foreach ($plan as $p)
                    {{$p['Nombre']}}
                    @endforeach
                    <button type="button" id="mod" data-bs-toggle="modal" data-bs-target="#modal_editar_plan" class="edit" > </button>
                
                </h1> 
            </div>

    <button type="button" class="boton_gestionar" data-bs-toggle="modal" data-bs-target="#modal_comp">Competencias</button>
    <button class="boton_gestionar">Aprendizajes</button>
    </div>


    <!--Modal modificar nombre plan de estudio -->
    <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1" class="modal fade" id="modal_editar_plan" aria-hidden="true"> 
                        <div class="modal-dialog modal-md">
                            <form action="/carreras/{{$c['id']}}" method="PUT" class="form-group">
                            @csrf
                            @method('PUT')
                                <div class="modal-content" style="width: 600px">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Modificar Plan de Estudio</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Nombre del plan</label>
                                                <input class="form-control form-control-lg" name="nombre_plan" style="width: 550px"  placeholder="Ingrese el nombre del plan" value="{{$p['Nombre']}}"/>
                                                <span style="color: red">@error('nombre_plan')  Debe ingresar un nombre para el plan  @enderror</span>          
                                            </div>

                                            <div class="form-group">
                                                <input name="nombre_carrera" type="hidden" value="">              
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

    <!--Modal competencias -->
    <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1" class="modal fade" id="modal_comp" aria-hidden="true"> 
                        <div class="modal-dialog modal-md">
                            <form action="/carreras/{{$c['id']}}" method="PUT" class="form-group">
                            @csrf
                            @method('PUT')
                                <div class="modal-content" style="width: 600px">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Competencias</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Descripción</label>
                                                <input class="form-control form-control-lg" name="desc_comp" type="text" style="width: 550px;"  placeholder="Ingrese descripción de la competencia" value="" minlength="0" maxlength="200" size="200"/>
                                                <span style="color: red">@error('desc_comp')  Debe ingresar un nombre para el plan  @enderror</span>   
                                                <label style="font-size: 20; margin-top: 10px">Tipo</label>  
                                                <select class="form-select form-select-lg" name="tipo" aria-label=".form-select-lg example" style="width:200px;">
                                                    <option selected value="Administración y Comercio">De Carrera</option>
                                                    <option value="Arte y Arquitectura">Arte y Arquitectura</option>
                                                    <option value="Carreras Técnicas">Carreras Técnicas</option>
                                                </select>     
                                                <button class="agregar" style="margin-top: 10px; text-align: center;">Agregar</button>
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

    <!--Modal aprendizajes -->
    <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1" class="modal fade" id="modal_editar_plan" aria-hidden="true"> 
                        <div class="modal-dialog modal-md">
                            <form action="/carreras/{{$c['id']}}" method="PUT" class="form-group">
                            @csrf
                            @method('PUT')
                                <div class="modal-content" style="width: 600px">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Aprendizajes</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Nombre del plan</label>
                                                <input class="form-control form-control-lg" name="nombre_plan" style="width: 550px"  placeholder="Ingrese el nombre del plan" value="{{$p['Nombre']}}"/>
                                                <span style="color: red">@error('nombre_plan')  Debe ingresar un nombre para el plan  @enderror</span>          
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

</body>
@endsection
</html>