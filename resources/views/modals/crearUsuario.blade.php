<div class="container">
            <div class="row">
                <div class ="col-md-12">
                    <div tabIndex="-1" class="modal fade" id="modal_user" aria-hidden="true">
                        <div class="modal-dialog modal-md" >
                            <form action="register" method="POST" class="form-group">
                                @csrf
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h1 class="justify-content-center" style="margin: auto"> Agregar usuario</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Nombre Completo</label>
                                            <input type="name" class="form-control form-control-lg" name="nombre"  style="width: 470px; margin-bottom: 20px" placeholder="Ingrese el nombre del usuario" />
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

                                        <div class="form-group" style="margin: auto">
                                            <label style="font-size: 20">Facultad</label>
                                            <select class="form-select form-select-lg" name="facultad"  aria-label=".form-select-lg example" style="width:470px; margin-bottom: 20px; font-size: 18">
                                                    <option value="Talca">Talca</option>
                                                    <option value="Los Niches">Los Niches</option>
                                                    <option value="Linares">Linares</option>
                                                    <option value="Santiago">Santiago</option>
                                            </select>
                                        </div>

                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Contraseña</label>
                                            <input type="password" class="form-control form-control-lg" name="password" style="width: 470px; margin-bottom: 20px" required autocomplete="new-password" placeholder="Ingrese la contraseña del usuario"/>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Ingrese una contraseña válida (al menos 6 caracteres)</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group" style="margin: auto;">
                                            <label style="font-size: 20">Confirmar contraseña</label>
                                            <input type="password" class="form-control form-control-lg" name="password_confirmation" id = "password_confirmation" style="width: 470px; margin-bottom: 20px" required autocomplete="new-password" placeholder="Ingrese nuevamente la contraseña del usuario"/>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>La entrada no coincide con la contraseña ingresada</strong>
                                            </span>
                                            @enderror
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