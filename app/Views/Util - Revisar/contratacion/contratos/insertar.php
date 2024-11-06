<?= $this->extend('contratacion/contratos') ?>

<?= $this->section('main') ?>
    
    <div class="d-flex align-items-center">
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>        
        <div class="rounded-2 mx-auto align-items-center shadow col-6">
            
            <div class="p-3 border-bottom-1 bg-custom rounded-top-2 rouded-end-2">
                <h1 class="h5 m-0">Nuevo Contrato</h1>                
            </div>
            <div class="p-3">

                <form class="row gx-3 gy-2 align-items-center" action="expedientes/new" method="post"> 
                    
                    <div class="col-5_5">
                        <label for="colaborador" class="form-label">Colaborador:</label>
                        <select name="colaborador" id="colaborador" class="form-control form-select">                       
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-3_5">
                        <label for="fechacontrato" class="form-label">Fecha contrato:</label>
                        <input type="date" name="fechacontrato" id="fechacontrato" class="form-control">
                    </div>

                    <div class="col-3">
                        <label for="numerocontrato" class="form-label">No. Contrato:</label>
                        <input type="text" name="numerocontrato" id="numerocontrato" class="form-control">
                    </div>

                    <div class="col-3_5">
                        <label for="idpais" class="form-label"> País: </label>
                        <select name="idpais" id="idpais" class="form-select">
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-4_5">
                        <label for="estadoprovinciadpto" class="form-label">Estado/Provincia/Dpto:</label>
                        <input type="text" name="estadoprovinciadpto" id="estadoprovinciadpto" class="form-control">
                    </div>

                    <div class="col-4">
                        <label for="institucion" class="form-label">Institución:</label>
                        <input type="text" name= "institucion" id = "institucion" class="form-control">
                    </div>

                    <div class="col-4_5">
                        <label for="localizacion" class="form-label">Localización:</label>
                        <input type="text" name="localizacion" id="localizacion" class="form-control">
                    </div>  
                
                    <div class="col-4">
                        <label for="funcionrealizar" class="form-label">Función que Relizará: </label>
                        <input type="text" name="funcionrealizar" id = "funcionrealizar" class="form-control">
                    </div>

                    <div class="col-3_5">
                        <label for="fechasalida" class="form-label">Fecha Salida:</label>
                        <input type="date" name="fechasalida" id="fechasalida" class="form-control">
                    </div>

                    <div class="col-3_5">
                        <label for="fecharegreso" class="form-label">Fecha Regreso:</label>
                        <input type="date" name="fecharegreso" id="fecharegreso" class="form-control">
                    </div>
                
                    <div class="col-3">
                        <label for="idformapago" class="form-label"> Forma de Pago:</label>
                        <select name="idformapago" id="idformapago" class="form-select">
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                
                    <div class="col-3">
                        <label for="idtiposalida" class="form-label" >Tipo Salida:</label>
                        <select name="idtiposalida" id="idtiposalida" class="form-select">
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                
                    <div class="col-2_5">
                        <label for="viatico" class="form-label">Viático:</label>
                        <input type="text" name="viatico" id="viatico" class="form-control">
                    </div>

                    <div class="col-2_5">
                        <label for="ingresospt" class="form-label">Ingreso SPT:</label>
                        <input type="text" name="ingresospt" id="ingresospt" class="form-control">
                    </div>

                    <div class="col-3">
                        <label for="ingresoaporte" class="form-label"> Ingreso x Aporte:</label>
                        <input type="text" name="ingresoaporte" id="ingresoaporte" class="form-control">
                    </div>
                
                    <div class="col-3">
                        <label for="totalingreso" class="form-label">Total Ingreso:</label>
                        <input type="text" name= "totalingreso" id="totalingreso" class="form-control" >
                    </div>

                    <div class="col-3_5">
                        <label for="iddeposito" class="form-label">Deposito:</label>
                        <select name="iddeposito" id="iddeposito" class="form-select" >
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="idactividad" class="form-label">Actividad Específica:</label>
                        <select name="idactividad" id="idactividad" class="form-select" >
                            <option disabled selected hidden></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>                    

                    <div class="col-3">
                        <label for="idsalidapor" class="form-label">Salida por:</label>
                        <select name="idsalidapor" id="idsalidapor" class="form-select" >
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