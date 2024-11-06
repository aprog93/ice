<?= $this->extend('tramitacion/expedientes') ?>

<?= $this->section('main') ?>
    
    <div class="d-flex align-items-center">
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>        
        <div class="rounded-2 mx-auto align-items-center shadow col-6">
            
            <div class="p-3 border-bottom-1 bg-custom rounded-top-2 rouded-end-2">
                <h1 class="h5 m-0">Nuevo Expediente</h1>                
            </div>
            <div class="p-3">

                <form class="row gx-3 gy-2 align-items-center" action="expedientes/new" method="post">                       
                 
                    <div class="col-3">
                        <label for="numeroexpediente" class="form-label">No. Expediente: </label>
                        <input type="text" name="numeroexpediente" id="numeroexpediente" class="form-control">
                    </div>

                    <div class="col-3_5">
                        <label for="fechanotaverbal" class="form-label">Fecha Nota verbal:</label>
                        <input type="date" name="fechanotaverbal " id="fechanotaverbal" class="form-control">
                    </div>
                
                    <div class="col-5_5">
                        <label for="solicitadopor" class="form-label">Solicitado por:</label>
                        <input type="text" name="solicitadopor " id="solicitadopor" class="form-control">
                    </div>

                    <div class="col-3">
                        <label for="fechasalida" class="form-label">Fecha Salida: </label>
                        <input type="date" name="fechasalida " id="fechasalida" class="form-control">
                    </div>

                    <div class="col-3">
                        <label for="fecharegreso" class="form-label">Fecha Regreso: </label>
                        <input type="date" name="fecharegreso " id="fecharegreso" class="form-control">
                    </div>                    

                    <div class="col-2_5">
                        <label for="estancia" class="form-label">Estancia: </label>
                        <input type="text" name="estancia " id="estancia" class="form-control">
                    </div>

                    <div class="col-3_5">
                        <label for="motivoviaje" class="form-label">Motivo de Viaje: </label>                        
                        <select class="form-select" name="motivoviaje " id="motivoviaje">                            
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>                                        

                    <div class="col-3">
                        <label for="fechacracion" class="form-label">Fecha Creación: </label>
                        <input type="date" name="fechacracion " id="fechacracion" class="form-control">
                    </div>

                    <div class="col-4">
                        <label for="pasaporterequerido" class="form-label">Pasaporte Requerido: </label>                        
                        <select class="form-control form-select" name="pasaporterequerido" id="pasaporterequerido">
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-3_5">
                        <label for="tipoactividad" class="form-label">Tipo Actividad: </label>
                        <select class="form-control form-select" name="tipoactividad " id="tipoactividad">
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>                    
                   
                    <div class="w-100 btn-center mt-3 my-auto text-center">
                        <button  class="btn btn-custom" id="aceptar">Aceptar</button>
                    </div>

                </form>
            </div>               
            
        </div>
    </div>            

<?= $this->endSection() ?>

<?= $this->section('script') ?> 
    
<?= $this->endSection() ?>