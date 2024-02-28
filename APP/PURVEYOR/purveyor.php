<?php
date_default_timezone_set('America/Caracas');
require_once("../../config/const.php");
require_once('../header.php');
?>
<div class="container-fluid">
  <div class="">
    <div class="card" style="--bs-card-bg:#ffffff73">
        <form id="formpurv" action="">
            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <h3><strong>Modulo de Proveedores</strong></h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <!--BEGIN CONTENT TABLE PRODUCT-->
                    <div class="col-5">
                        <table id="purtable" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Descripcion</th>
                                    <th>Codigo</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!--END CONTENT TABLE PRODUCT-->

                    <!--BEGIN CONTENT OPTIONS PRODUCT-->
                    <div class="col-7">
                        <div class="accordion accordion-flush" id="accordionFlushExample" style="--bs-accordion-bg:#ffffff63">
                            <div class="accordion-item">

                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <button id="btnopt1" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#opt1" aria-expanded="true" aria-controls="flush-collapseOne">
                                            Informacion Principal
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#opt2" aria-expanded="true" aria-controls="flush-collapseOne">
                                            Historicos de Compra
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#opt3" aria-expanded="true" aria-controls="flush-collapseOne">
                                            Estado de Cuenta
                                        </button>
                                    </li>
                                </ul>

                                <div id="opt1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                            
                                        <div class="row justify-content-center align-items-center g-2 text-center">

                                            <div class="col-lg-12">
                                                <div class="row justify-content-md-end">
                                                    <div class="col-lg-6">
                                                        <b><span id="datecreate"><?php echo date('d-m-Y H:i:s') ?></span></b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="codpurv" class="form-label">ID</label>
                                                <input type="text" class="form-control" id="codpurv" disabled required>  
                                            </div>
                                            <div class="col-2">
                                                <label for="statpurv" class="form-label">Estatus</label>
                                                <select id="statpurv"  class="form-select" aria-label="Default select example" disabled required>
                                                    <option value="-">Opciones</option>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <label for="typpurv" class="form-label">Tipo de Prov.</label>
                                                <select id="typpurv"  class="form-select" aria-label="Default select example" disabled required>
                                                    <option value="-">Seleccione Opcion</option>
                                                    <option value="J">Persona Jurídica</option>
                                                    <option value="V">Persona Natural (Nacional)</option>
                                                    <option value="E">Persona Natural (Extrangero)</option>
                                                    <option value="G">Gubernamental</option>
                                                    <option value="R">Residente</option>
                                                    <option value="NR">No Residente</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="typcpurv" class="form-label">Tipo de Prov.</label>
                                                <select id="typcpurv"  class="form-select" aria-label="Default select example" disabled required>
                                                    <option value="-">Opciones</option>
                                                    <option value="F">Formal</option>
                                                    <option value="O">Ordinario</option>
                                                    <option value="E">Especial</option>
                                                    <option value="EX">exento</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="descripurv" class="form-label">Rezon Social - Nombre</label>
                                                <input type="text" class="form-control" id="descripurv" disabled required>  
                                            </div>
                                            <div class="col-3">
                                                <label for="codpurv1" class="form-label">Codigo (DNI - RIF)</label>
                                                <input type="text" class="form-control" id="codpurv1" disabled required>  
                                            </div>
                                            <div class="col-3">
                                                <label for="codlaepurv" class="form-label">Licencia A. E.</label>
                                                <input type="text" class="form-control" id="codlaepurv" disabled required>  
                                            </div>
                                            <div class="col-9">
                                                <div class="input-group">
                                                    <span class="input-group-text">Direccion de <br>Proveedor</span>
                                                    <textarea  id="addrespurv" cols="10" rows="5" class="form-control" aria-label="With textarea" disabled required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="phonepurv" class="form-label">Telefono</label>
                                                        <input type="text" class="form-control" id="phonepurv" disabled required>  
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="emailpurv" class="form-label">Correo</label>
                                                        <input type="text" class="form-control" id="emailpurv" disabled required>  
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                                <div id="opt2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Historicos de Compra
                                    </div>
                                </div>
                                <div id="opt3" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Estado de Cuenta
                                    </div>
                                </div>
                                
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <img id="demo" src="../../ASSETS/IMG/demo.png" width="750px">
                                </div>

                            </div>
                        </div>                    
                    </div>
                    <!--END CONTENT OPTIONS PRODUCT-->
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button id="new" class="btn btn-outline-success" type="button"><i class="bi bi-plus-square"></i>Nuevo</button>
                    <button id="edit" class="btn btn-outline-dark" type="button"><i class="bi bi-pencil-fill"></i>Editar</button>
                    <button id="save" class="btn btn-outline-primary" type="submit"><i class="bi bi-hdd"></i>Guardar</button>
                    <button id="trash" class="btn btn-outline-danger" type="button"><i class="bi bi-trash2"></i>Eliminar</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>


<script src="purveyor.js"></script>


<?php
require_once('../footer.php');
?>