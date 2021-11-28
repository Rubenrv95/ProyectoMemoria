<div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_crear_carrera">
                        <div class="modal-dialog modal-md" >
                            <form action="create" method="POST" class="form-group">
                            @csrf
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 65; text-align: center"> Agregar carrera</h1>
                                    </div>
                                    <div class="modal-body">

                                            <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                                <label style="font-size: 20">Nombre de la carrera</label>
                                                <input class="form-control form-control-lg" name="nombre_carrera" style="width: 470px"  placeholder="Ingrese el nombre de la carrera"/>
                                                <span style="color: red">@error('nombre_carrera')  Debe ingresar un nombre para la carrera  @enderror</span>
                                            </div>

                                            <div class="form-group" style="margin: auto">
                                                <label style="font-size: 20">Área profesional</label>
                                                <select class="form-select form-select-lg" name="area" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
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
                                        <button class="button-accept" type="submit">Guardar</button>
                                        <button class="button-cancel" data-dismiss="modal">Cancelar</button>
                                    </div> 
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>