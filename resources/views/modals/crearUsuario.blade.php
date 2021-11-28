<div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div class="modal fade" id="modal_user">
                        <div class="modal-dialog modal-md" >
                            <form action="register" method="POST" class="form-group">
                                @csrf
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="font-size: 65; text-align: center"> Agregar usuario</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Nombre Completo</label>
                                            <input type="name" class="form-control form-control-lg" name="nombre" style="width: 470px; margin-bottom: 20px" placeholder="Ingrese el nombre del usuario" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Debe ingresar un nombre para el usuario</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20" >Correo Electrónico</label>
                                            <input type="email" class="form-control form-control-lg" name="email" style="width: 470px; margin-bottom: 20px" placeholder="Ingrese el correo del usuario" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Debe ingresar el correo del usuario</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Contraseña</label>
                                            <input type="password" class="form-control form-control-lg" name="password" style="width: 470px; margin-bottom: 20px" placeholder="Ingrese la contraseña del usuario"/>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Una contraseña válida (al menos 6 caracteres)</strong>
                                            </span>
                                            @enderror
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