<div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_modificar_carrera">
                        <div class="modal-dialog modal-md" >

                            <form method = "post" action = "" class="form-group" id = "editForm">
                            @csrf

                            {{ method_field('PUT')}}

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 60; text-align: center"> Modificar carrera</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Nombre de la carrera</label>
                                            <input class="form-control form-control-lg" name="nombre_carrera" id ="c_nombre" style="width: 470px; margin-bottom: 20px" value="" placeholder="Ingrese el nombre de la carrera"/>
                                        </div>

                                        <div class="form-group" style="margin: auto">
                                            <label style="font-size: 20">Área profesional</label>
                                            <select class="form-select form-select-lg" name="area" id = "c_id" aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
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
                                        <button class="button-accept" data-dismiss="modal">Guardar</button>
                                        <button class="button-cancel" data-dismiss="modal">Cancelar</button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('')


    });
</script>