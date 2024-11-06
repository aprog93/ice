  
<div class="d-flex align-items-center mt-5" tabindex="-1" role="dialog" id="modalForm">

    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <!-- bg-body-secondary indica color de cabecera del formulario -->  
            <div class="modal-header p-4 pt-3 pb-1 border-bottom-1 bg-primary rounded-top-3 rouded-end-3">
                <h5 class="color-white">Nuevo Usuario</h5>                
            </div>                    

            <div class="modal-body p-4 pt-3 pb-3">
                
                <?= validation_list_errors() ?>
                
                <form  action="add_user" method="post">
                                   
                    <div class="col-m-12 mb-2">                        
                        <input type="username" name="username" class="form-control rounded-3" id="username" value="<?= set_value('username') ?>" placeholder="Usuario" required disabled>                        
                        <div class="invalid-feedback">
                            Nombre de usuario requerido.
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">                        
                        <input type="mail"name="email" class="form-control rounded-3" id="email" value="<?= set_value('email') ?>" placeholder="E-Mail" required>                        
                        <div class="invalid-feedback">
                            E-mail requerido.
                        </div>
                    </div>                    

                    <div class="col-md-12 mb-2">                                                
                        <select class="form-select" name="rol" id="rol" required>
                            <option selected disabled value="">Seleccione el Rol</option>
                        <?php 
                        foreach($roles as $rol): 
                        ?>
                            <option value= <?= esc($rol['IdRol']); ?> > <?= esc($rol['Nombre']); ?></option>                        
                        <?php endforeach; ?> 
                        </select>                        
                    </div>  
                    
                    <div class="col-md-6 content-c mt-2">
                        <!-- bg-secondary indica color del botón del formulario -->
                        <button class="w-100 btn btn-primary" type="submit">Guardar</button>
                    </div>                      
                </form>
            </div>                       
        </div>  
    </div>      
</div>
