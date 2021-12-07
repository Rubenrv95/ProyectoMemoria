<div class="container">
    <div class="row">
        <div class ="col-md-12">
            <div class="modal fade" id="modal_crear_plan">
                <div class="modal-dialog modal-md">
                    <form action="" method="POST" class="form-group">
                    @csrf
                        <div class="modal-content" style="width: 600px">

                            <div class="modal-header">
                                <h1 class="justify-content-center" style="font-size: 65; text-align: center"> Crear nuevo plan de estudio</h1>
                            </div>
                            <div class="modal-body">

                                    <div class="form-group" style="margin: auto; margin-bottom: 20px">
                                        <label style="font-size: 20">Nombre del plan</label>
                                        <input class="form-control form-control-lg" name="nombre_plan" style="width: 550px"  placeholder="Ingrese el nombre de la carrera"/>
                                        <span style="color: red">@error('nombre_carrera')  Debe ingresar un nombre para el plan  @enderror</span>                 
                                    </div>
                                    <div class="form-group" style="margin:auto">
                                        <div class="input_fields_wrap"> 
                                            <label style="font-size: 20">Competencia</label>
                                            <div>
                                                <button type="button" class="agregar_competencia" style="margin-bottom: 15px">
                                                        Añadir Competencia                 
                                                </button>
                                            </div>
                                            
                                        </div>

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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>

    $(document).ready(function() {
        var fields_maximos = 20;
        var wrapper = $(".input_fields_wrap");
        var añadir = $(".agregar_competencia");

        var x=1;
        $(añadir).click(function(e) {
            e.preventDefault();
            if(x <= fields_maximos) {
                x++;
                $(wrapper).append('<div> <input name="competencia" style="width: 500px; margin-bottom: 10px"  placeholder="Ingrese una competencia"/> <button type="button" id="del" class="remove_field"> </div>')
            }

        });

        $(wrapper).on("click", ".remove_field", function(e) {

            e.preventDefault();
            $(this).parent('div').remove();
            x--;

        })
    });
</script>