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

            <a href="/carreras/{{$c['id']}}/{{$p['id']}}/competencias"><button type="button" class="boton_gestionar">Competencias y Aprendizajes</button></a> 

            <div class="container-fluid kanban-container py-4 px-0">
                <div class="row d-flex flex-nowrap">
                    <div class="col-12 col-lg-6 col-xl-4 col-xxl-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fs-6 fw-bold mb-0">
                                Semestre 1
                            </h5>

                            <div class="dropdown">
                                <button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">

                                        </path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd">

                                            </path>
                                        </svg> 
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                               <div id="kanbanColumn1" class="list-group kanban-list"><div class="card border-0 shadow p-4"><div class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3"><h3 class="h5 mb-0">variables.scss problems</h3><div><div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg class="icon icon-xs text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></button><div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg> Edit Task </a><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path><path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"></path></svg> Copy Task </a><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> Add to favorites</a><div role="separator" class="dropdown-divider my-1"></div><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg> Remove</a></div><div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0" aria-labelledby="dropdownMenuLink"><a class="dropdown-item fw-normal rounded-top" href="#" data-bs-toggle="modal" data-bs-target="#editTaskModal"><span class="fas fa-edit"></span>Edit task</a> <a class="dropdown-item fw-normal" href="#"><span class="far fa-clone"></span>Copy Task</a> <a class="dropdown-item fw-normal" href="#"><span class="far fa-star"></span> Add to favorites</a><div role="separator" class="dropdown-divider my-0"></div><a class="dropdown-item fw-normal text-danger rounded-bottom" href="#"><span class="fas fa-trash-alt"></span>Remove</a></div></div></div></div><div class="card-body p-0"><p>On line 672 you define $table_variants. Each instance of "color-level" needs to be changed to "shift-color".</p><h5 class="fs-6 fw-normal mt-4">3 Assignees</h5><div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson" title=""><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green" data-bs-original-title="Bonnie Green" title=""><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"> </a><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Alexander Smith" data-bs-original-title="Alexander Smith" title="" aria-label="Alexander Smith"><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-2.jpg"></a></div></div></div><div class="card border-0 shadow p-4"><div class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-3"><h3 class="h5 mb-0">Redesign homepage</h3><div><div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg class="icon icon-xs text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></button><div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg> Edit Task </a><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path><path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"></path></svg> Copy Task </a><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> Add to favorites</a><div role="separator" class="dropdown-divider my-1"></div><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg> Remove</a></div><div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0" aria-labelledby="dropdownMenuLink"><a class="dropdown-item fw-normal rounded-top" href="#" data-bs-toggle="modal" data-bs-target="#editTaskModal"><span class="fas fa-edit"></span>Edit task</a> <a class="dropdown-item fw-normal" href="#"><span class="far fa-clone"></span>Copy Task</a> <a class="dropdown-item fw-normal" href="#"><span class="far fa-star"></span> Add to favorites</a><div role="separator" class="dropdown-divider my-0"></div><a class="dropdown-item fw-normal text-danger rounded-bottom" href="#"><span class="fas fa-trash-alt"></span>Remove</a></div></div></div></div><div class="card-body p-0"><img src="../assets/img/themesberg-mockup.jpg" class="card-img-top mb-2 mb-lg-3" alt="themesberg marketplace"><p>On line 672 you define $table_variants. Each instance of "color-level" needs to be changed to "shift-color".</p><h5 class="fs-6 fw-normal mt-4">2 Assignees</h5><div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson" title=""><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green" data-bs-original-title="Bonnie Green" title="" aria-label="Bonnie Green"><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"></a></div></div></div><div class="card border-0 shadow p-4"><div class="card-header d-flex align-items-center justify-content-between border-0 p-0 mb-2"><h3 class="h5 mb-0">variables.scss problems</h3><div><div class="dropdown"><button type="button" class="btn btn-sm fs-6 px-1 py-0 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><svg class="icon icon-xs text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></button><div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#editTaskModal"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg> Edit Task </a><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"></path><path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"></path></svg> Copy Task </a><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> Add to favorites</a><div role="separator" class="dropdown-divider my-1"></div><a class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg> Remove</a></div><div class="dropdown-menu dashboard-dropdown dropdown-menu-start py-0" aria-labelledby="dropdownMenuLink"><a class="dropdown-item fw-normal rounded-top" href="#" data-bs-toggle="modal" data-bs-target="#editTaskModal"><span class="fas fa-edit"></span>Edit task</a> <a class="dropdown-item fw-normal" href="#"><span class="far fa-clone"></span>Copy Task</a> <a class="dropdown-item fw-normal" href="#"><span class="far fa-star"></span> Add to favorites</a><div role="separator" class="dropdown-divider my-0"></div><a class="dropdown-item fw-normal text-danger rounded-bottom" href="#"><span class="fas fa-trash-alt"></span>Remove</a></div></div></div></div><div class="card-body p-0"><p>On line 672 you define $table_variants. Each instance of "color-level" needs to be changed to "shift-color".</p><h5 class="fs-6 fw-normal mt-4">3 Assignees</h5><div class="avatar-group"><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Ryan Tompson" data-bs-original-title="Ryan Tompson" title=""><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-1.jpg"> </a><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Bonnie Green" data-bs-original-title="Bonnie Green" title=""><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-3.jpg"> </a><a href="#" class="avatar" data-bs-toggle="tooltip" data-original-title="Alexander Smith" data-bs-original-title="Alexander Smith" title="" aria-label="Alexander Smith"><img class="rounded" alt="Image placeholder" src="../assets/img/team/profile-picture-2.jpg"></a></div></div></div> <button type="button" class="btn btn-outline-gray-500 d-inline-flex align-items-center justify-content-center dashed-outline new-card w-100" data-bs-toggle="modal" data-bs-target="#KanbanAddCard"><svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Add another card</button></div>             
                    </div>
                </div>
            </div>
                
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
                                                <button class="btn btn-success" type="submit">Guardar</button>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button>
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
                                                <hr class="sidebar-divider">
                                                <button class="agregar" style="margin-top: 10px; text-align: center;">Agregar</button>
                                            </div>
                                    </div>

                                    <div class="modal-footer">
                                                <button class="btn btn-success" type="submit">Guardar</button>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button>
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
                    <div tabIndex="-1" class="modal fade" id="modal_apren" aria-hidden="true"> 
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
                                                <label style="font-size: 20">Descripción</label>
                                                <input class="form-control form-control-lg" name="desc_apren" type="text" style="width: 550px;"  placeholder="Ingrese descripción del aprendizaje" value="" minlength="0" maxlength="200" size="200"/>
                                                <span style="color: red">@error('desc_apren')  Debe ingresar un nombre para el plan  @enderror</span>   
                                                <label style="font-size: 20; margin-top: 10px">Competencia asociada</label>  
                                                <select class="form-select form-select-lg" name="tipo" aria-label=".form-select-lg example" style="width:550px;">
                                                    <option selected value="Administración y Comercio">Competencia 1</option>
                                                    <option value="Arte y Arquitectura">Arte y Arquitectura</option>
                                                    <option value="Carreras Técnicas">Carreras Técnicas</option>
                                                </select>     
                                                <hr class="sidebar-divider">
                                                <button class="agregar" style="margin-top: 10px; text-align: center;">Agregar</button>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                                <button class="btn btn-success" type="submit">Guardar</button>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancelar</button>
                                    </div> 
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script src="@@path/vendor/sortablejs/Sortable.min.js"></script>
    <script>
        var kanbanColumn1 = document.getElementById('kanbanColumn1');
        if (kanbanColumn1) {
            new Sortable(kanbanColumn1, {
                group: "shared",
            });
        }
    </script>

</body>
@endsection
</html>