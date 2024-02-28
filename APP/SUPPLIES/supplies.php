<?php
date_default_timezone_set('America/Caracas');
require_once("../../config/const.php");
require_once('../header.php');
?>
<div class="container-fluid">
  <div class="">
    <div class="card" style="--bs-card-bg:#ffffff73">
        <form id="formactv" action="">
            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <h3><strong>Modulo de Articulos</strong></h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <!--BEGIN CONTENT TABLE PRODUCT-->
                    <div class="col-5">
                        <table id="acttable">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Descripcion</th>
                                    <th>Referencia</th>
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
                                    <button id="btnopt2" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#opt2" aria-expanded="true" aria-controls="flush-collapseOne">
                                        Costos y Precios
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button id="btnopt3" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#opt3" aria-expanded="true" aria-controls="flush-collapseOne">
                                        Historico de Movimiento de Producto
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
                                            <label for="codact" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="codact" disabled required>  
                                        </div>
                                        <div class="col-5">
                                            <label for="descripact" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="descripact" disabled required>  
                                        </div>
                                        <div class="col-3">
                                            <label for="refeact" class="form-label">Referencia</label>
                                            <input type="text" class="form-control" id="refeact" disabled required>  
                                        </div>
                                        <div class="col-2">
                                                <input class="form-check-input" type="checkbox" value="" id="actact" disabled required>
                                                <label class="form-check-label" for="actact">Activo</label>
                                        </div>
                                        <div class="col-4">
                                            <label for="brandact" class="form-label">Marca</label>
                                            <input type="text" class="form-control" id="brandact" disabled required>  
                                        </div>
                                        <div class="col-4">
                                            <label for="taxtype" class="form-label">Tipo de Impuesto</label>
                                            <select id="taxtype"  class="form-select" aria-label="Default select example" disabled required>
                                                <option value="-">Seleccione Impuesto</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="codcact" class="form-label">Categoria</label>
                                            <select id="codcact"  class="form-select" aria-label="Default select example" disabled required>
                                                <option value="-">Seleccione Categoria</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="codtact" class="form-label">Tipo</label>
                                            <select id="codtact"  class="form-select" aria-label="Default select example" disabled required>
                                                <option value="-">Seleccione Tipo</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="codtund" class="form-label">Unidad</label>
                                            <select id="codtund"  class="form-select" aria-label="Default select example" disabled required>
                                                <option value="-">Seleccione Unidad</option>
                                            </select>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                            <div id="opt2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="alert alert-primary" role="alert">Control de costos</div>
                                            <div class="row g-3 align-items-center">

                                                <div class="col-6">
                                                    <label for="curcost" class="col-form-label">Costo Actual</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" id="curcost" class="form-control" aria-describedby="curcost" disabled required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="precost" class="col-form-label">Costo Anterior</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" id="precost" class="form-control" aria-describedby="precost" disabled required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="avecost" class="col-form-label">Costo Promedio</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" id="avecost" class="form-control" aria-describedby="avecost" disabled required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="exempt" class="col-form-label">Excento</label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="checkbox" id="exempt" class="form-check-input" aria-describedby="exempt" disabled required>
                                                </div>
  
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="alert alert-info" role="alert">Control de Precios</div>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-auto">
                                                    <label for="inputPassword6" class="col-form-label">Precio 1</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                                </div>
                                                <div class="col-1">
                                                    <button id="plus" class="btn btn-light me-md-2" type="button"><i class="bi bi-node-plus"></i></button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                            <div id="opt3" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <table class="table table-success table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Codigo de Movimiento</th>
                                                <th>Descripcion De Movimiento</th>
                                                <th>Cantidad</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                            <tr>
                                                <td>ewewq</td>
                                                <td>fef</td>
                                                <td>grgd</td>
                                                <td>kd</td>
                                                <td>kmf</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Codigo de Movimiento</th>
                                                <th>Descripcion De Movimiento</th>
                                                <th>Cantidad</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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


<script src="supplies.js"></script>


<?php
require_once('../footer.php');
?>