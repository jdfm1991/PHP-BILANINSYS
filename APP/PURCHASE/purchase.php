<?php
date_default_timezone_set('America/Caracas');
require_once("../../config/const.php");
require_once('../header.php');
?>
<div class="container-fluid">
  <div class="">
    <div class="card" style="--bs-card-bg:#ffffff73">

            <div class="card-header">
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <h3><strong>Modulo de Compras</strong></h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <!--BEGIN OPTIONS MENU-->
                    <div class="col-3">
                        <div id="mainpurchase" class="row justify-content-center align-items-center g-2">
                            <div class="col-6">
                                <button id="buys" type="button" class="btn btn-outline-success btnpurchase">Compras</button>
                            </div>
                            <div class="col-6">
                                <button id="quotes" type="button" class="btn btn-outline-dark btnpurchase">Cotizaciones</button>
                            </div>
                            <div class="col-6">
                                <button id="purchorder" type="button" class="btn btn-outline-primary btnpurchase">Ordenes de Compras</button>
                            </div>
                            <div class="col-6">
                                <button id="delivnote" type="button" class="btn btn-outline-secondary btnpurchase">Notas de Entrega</button>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div id="mainbuy" class="row flex-nowrap">
                                <div class="col-auto">
                                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                                        <strong><span class="fs-2 d-none d-sm-inline text-black"><i class="bi bi-bag-fill"></i>Compras</span></strong>
                                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                                            <li class="nav-item">
                                                <a id="optbuy1" class="btn">
                                                    <span class="fs-4"><i class="bi bi-bag"></i>Compras</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="optbuy2" class="btn">
                                                    <span class="fs-5"><i class="bi bi-printer"></i>Imprimir Compras</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="optbuy3" class="btn">
                                                    <span class="fs-4"><i class="bi bi-bag"></i>Devoluciones</span>
                                                </a>
                                            </li>
                                            <li  class="nav-item">
                                                <a id="optbuy4" class="btn">
                                                    <span class="fs-5"><i class="bi bi-printer"></i>Imprimir Devol.</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="back" class="btn">
                                                    <span class="fs-2"><i class="bi bi-backspace"></i></span>
                                                </a>
                                            </li>
                                           
                                        </ul>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END OPTIONS MENU-->

                    <!--BEGIN CONTENT FORM PURCHASE-->
                    <div class="col-9">
                        <div class="card" style="--bs-card-bg:#bbb9b978">

                            <div id="content1">
                                <form id="formpurch">
                                    <div class="card-header">
                                        <div class="row"><!--
                                            <div class="col-lg-12">
                                                <div class="row justify-content-md-end">
                                                    <div class="col-lg-3">
                                                        <b><span id="datecreate"><?php  date('d-m-Y H:i:s') ?></span></b>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="col-8">

                                                <div class="row justify-content-start align-items-center g-2">
                                                    <div class="col-2">
                                                        <label for="codpurv2" class="col-form-label">Proveedor</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="number" id="codpurv2" class="form-control" aria-describedby="passwordHelpInline" placeholder="R.I.F ó D.N.I">
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="d-grid gap-2 d-md-block btn-group-sm">
                                                            <button id="newpurv" class="btn btn-primary" type="button"><i class="bi bi-bookmark-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <b><span id="descripurv2" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="codstore" class="col-form-label">Deposito</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="number" id="codstore" class="form-control" aria-describedby="passwordHelpInline" placeholder="Deposito">
                                                    </div>
                                                    <div class="col-1">
                                                        
                                                    </div>
                                                    <div class="col-6">
                                                        <b><span id="descripstore" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="codpurch" class="col-form-label">N# Documento</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="text" id="codpurch" class="form-control" aria-describedby="passwordHelpInline" placeholder="N# Documento">
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="datepurch" class="col-form-label">Fecha de Compra</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="date" id="datepurch" class="form-control" aria-describedby="passwordHelpInline" placeholder="N# Documento">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-4">
                                                
                                                <div class="row justify-content-start align-items-center g-2">
                                                    <label class="col-6"><b>N# Compra</b></label>
                                                    <div class="col-6">
                                                        <b><span id="npurchase" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    <label class="col-6"><b>Total Cantidades</b></label>
                                                    <div class="col-6">
                                                        <input type="hidden" id="tcount">
                                                        <b><span id="tcountt" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    <label class="col-6"><b>Sub-Total</b></label>
                                                    <div class="col-6">
                                                        <input type="hidden" id="stotal">
                                                        <b><span id="subtotal" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    <label class="col-6"><b>Impuestos</b></label>
                                                    <div class="col-6">
                                                        <input type="hidden" id="tax">
                                                        <b><span id="iva" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    <label class="col-6"><b>Total</b></label>
                                                    <div class="col-6">
                                                        <input type="hidden" id="total">
                                                        <b><span id="tota" class="fs-6 form-text"></span></b>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button id="pluspurv" class="btn btn-light me-md-2" type="button"><i class="bi bi-node-plus"></i></button>
                                        </div>
                                        <div class="table-wrapper">
                                            <table id="tablepurch" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Cod. Producto</th>
                                                        <th>Desc. Producto</th>
                                                        <th>Cant.</th>
                                                        <th>Unidad</th>
                                                        <th>Costo</th>
                                                        <th>Total Costo</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button id="save" class="btn btn-outline-primary" type="submit"><i class="bi bi-hdd"></i>Guardar</button>
                                            <button id="clean" class="btn btn-outline-danger" type="button"><i class="bi bi-trash2"></i>Limpiar Campos</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <img id="demo" src="../../ASSETS/IMG/demo.png" width="750px">
                        </div>                 
                    </div>
                    <!--END CONTENT FORM PURCHASE-->
                </div>
            </div>
            
        
    </div>
  </div>
</div>

<div class="modal fade" id="contentpurv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="contentstore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="storetable" style="width:100%;">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="contentact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="acttable" style="width:100%;">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Descripcion</th>
                    <th>Codigo</th>
                </tr>
            </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="createpurv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formpurv" action="">
      <div class="modal-body">
        <div class="row justify-content-center align-items-center g-2 text-center">
            <div class="col-2">
                <label for="codpurv" class="form-label">ID</label>
                <input type="text" class="form-control" id="codpurv" disabled required>  
            </div>
            <div class="col-2">
                <label for="statpurv" class="form-label">Estatus</label>
                <select id="statpurv"  class="form-select" aria-label="Default select example" required>
                    <option value="-">Opciones</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <div class="col-5">
                <label for="typpurv" class="form-label">Tipo de Prov.</label>
                <select id="typpurv"  class="form-select" aria-label="Default select example" required>
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
                <select id="typcpurv"  class="form-select" aria-label="Default select example" required>
                    <option value="-">Opciones</option>
                    <option value="F">Formal</option>
                    <option value="O">Ordinario</option>
                    <option value="E">Especial</option>
                    <option value="EX">exento</option>
                </select>
            </div>
            <div class="col-6">
                <label for="descripurv" class="form-label">Rezon Social - Nombre</label>
                <input type="text" class="form-control" id="descripurv" required>  
            </div>
            <div class="col-3">
                <label for="codpurv1" class="form-label">Codigo (DNI - RIF)</label>
                <input type="text" class="form-control" id="codpurv1" required>  
            </div>
            <div class="col-3">
                <label for="codlaepurv" class="form-label">Licencia A. E.</label>
                <input type="text" class="form-control" id="codlaepurv" required>  
            </div>
            <div class="col-9">
                <div class="input-group">
                    <span class="input-group-text">Direccion de <br>Proveedor</span>
                    <textarea  id="addrespurv" cols="10" rows="5" class="form-control" aria-label="With textarea" required></textarea>
                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <label for="phonepurv" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="phonepurv" required>  
                    </div>
                    <div class="col-12">
                        <label for="emailpurv" class="form-label">Correo</label>
                        <input type="text" class="form-control" id="emailpurv" required>  
                    </div>
                    
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="purchase.js"></script>


<?php
require_once('../footer.php');
?>