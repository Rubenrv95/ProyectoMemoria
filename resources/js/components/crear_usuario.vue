<template>
    <div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_user">
                        <div class="modal-dialog modal-md" >
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h1 class="justify-content-center" style="font-size: 65; text-align: center"> Agregar usuario</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group" style="margin: auto;">
                                        <label style="font-size: 20">Nombre Completo</label>
                                        <input type="name" class="form-control form-control-lg" name="email" style="width: 470px; margin-bottom: 20px" />
                                    </div>

                                    <div class="form-group" style="margin: auto;">
                                        <label style="font-size: 20" >Correo Electrónico</label>
                                        <input type="email" class="form-control form-control-lg" name="email" style="width: 470px; margin-bottom: 20px" />
                                    </div>

                                    <div class="form-group" style="margin: auto;">
                                        <label style="font-size: 20">Contraseña</label>
                                        <input type="password" class="form-control form-control-lg" name="password" style="width: 470px; margin-bottom: 20px" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="button-accept" data-dismiss="modal">Guardar</button>
                                    <button class="button-cancel" data-dismiss="modal">Cancelar</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>