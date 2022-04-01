<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombre"])){
    header("Location: index.php");
  }else{ ?>
    <!DOCTYPE html>
    <html lang="es">
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin Sevens | Compras de Activos Fijos</title>
        
        <?php $title = "Compras de Activos Fijos"; require 'head.php'; ?>

        <!--CSS  switch_MATERIALES-->
        <link rel="stylesheet" href="../dist/css/switch_materiales.css" />
        <link rel="stylesheet" href="../dist/css/leyenda.css" />
          
      </head>
      <body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
        <div class="wrapper">
          <!-- Preloader -->
          <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/svg/logo-principal.svg" alt="AdminLTELogo" width="360" />
          </div> -->

          <?php
          require 'nav.php';
          require 'aside.php';
          if ($_SESSION['compra_activo_fijo']==1){
            //require 'enmantenimiento.php';
            ?>
            <!--Contenido-->
            <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="m-0"> <i class="fas fa-hand-holding-usd"></i> Compras de Activos Fijos</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compras de activos fijos</li>
                      </ol>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
              </div>
              <!-- /.content-header -->

              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="card card-primary card-outline">
                        <!-- Start Main Top -->
                        <div class="main-top">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="card-header">
                                  <h3 class="card-title">
                                    <!--data-toggle="modal" data-target="#modal-agregar-compra"  onclick="limpiar();"-->
                                    <button type="button" class="btn bg-gradient-success" id="btn_agregar" onclick="ver_form_add(); limpiar_form_compra();"><i class="fas fa-plus-circle"></i> Agregar</button>
                                    <button type="button" class="btn bg-gradient-warning" id="regresar" style="display: none;" onclick="regresar();"><i class="fas fa-arrow-left"></i> Regresar</button>
                                    <button type="button" id="btn-pagar" class="btn bg-gradient-success" data-toggle="modal" style="display: none;" data-target="#modal-agregar-pago" onclick="limpiar_c_pagos();">
                                      <i class="fas fa-dollar-sign"></i> Agregar Pago
                                    </button>
                                  </h3>
                                </div>
                              </div>
                              <!-- Leyecnda pagos -->
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hiddenn" style="background-color: aliceblue;">
                                <div class="text-slid-box">
                                  <div id="offer-box" class="contenedor">
                                    <div> <b>Leyenda-pago</b> </div>
                                    <ul class="offer-box cls-ul">
                                      <li>
                                        <span class="text-center badge badge-danger" >Pago sin iniciar </span> 
                                      </li>
                                      <li>
                                        <span class="text-center badge badge-warning" >Pago en proceso </span>
                                      </li>
                                      <li>
                                        <span class="text-center badge badge-success" >Pago completo</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>

                              <!-- Leyecnda saldos leyecnda_pagos,leyecnda_saldos-->
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hiddenn" style="background-color: #f0f8ff7d;">
                                <div class="text-slid-box">
                                  <div id="offer-box" class="contenedorr">
                                    <div> <b>Leyenda-saldos</b> </div>
                                    <ul class="offer-box clss-ul">
                                      <li>
                                        <span class="text-center badge badge-warning " >Pago nulo o pago en proceso </span> 
                                      </li>
                                      <li>
                                        <span class="text-center badge badge-success" >Pago Completo </span>
                                      </li>
                                      <li>
                                        <span class="text-center badge badge-danger" >Pago excedido</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Main Top -->

                        <!-- /.card-header -->
                        <div class="card-body">
                          <!-- TABLA - Lista de compras Por Facturas -->
                          <div id="div_tabla_compra">
                            <table id="tabla-compra" class="table table-bordered table-striped display" style="width: 100% !important;">
                              <thead>
                                <tr>
                                  <th class="">#</th>
                                  <th class="">Acciones</th>
                                  <th>Descripción</th>
                                  <th>Fecha</th>
                                  <th>Proveedor</th>
                                  <th data-toggle="tooltip" data-original-title="Tipo y Número Comprobante">Tipo</th>
                                  <th>Total</th>
                                  <th>Añadir pago</th>
                                  <th>Saldo</th>
                                  <th data-toggle="tooltip" data-original-title="Comprobantes">Comprob</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot>
                                <tr>
                                  <th class="">#</th>
                                  <th class="">Acciones</th>
                                  <th>Descripción</th>
                                  <th>Fecha</th>
                                  <th>Proveedor</th>
                                  <th data-toggle="tooltip" data-original-title="Tipo y Número Comprobante">Tipo</th>
                                  <th>Total</th>
                                  <th>Añadir pago</th>
                                  <th>Saldo</th>
                                  <th data-toggle="tooltip" data-original-title="Comprobantes">Comprob</th>
                                </tr>
                              </tfoot>
                            </table>
                            <br />
                            <h4><b>Lista de Compras Por Proveedor</b></h4>
                            <table id="tabla-compra-proveedor" class="table table-bordered table-striped display" style="width: 100% !important;">
                              <thead>
                                <tr>
                                <th class="">#</th>
                                  <th class="">Acciones</th>
                                  <th>Proveedor</th>
                                  <th>Cant.</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot>
                                <tr>
                                  <th class="">#</th>
                                  <th class="">Acciones</th>
                                  <th>Proveedor</th>
                                  <th>Cant.</th>
                                  <th>Total</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                          <!-- TABLA - Lista de Compras Por Proveedor -->
                          <div id="div_tabla_compra_proveedor" style="display: none;">
                            <h5><b>Lista de compras Por Facturas</b></h5>
                            <table id="detalles-tabla-compra-prov" class="table table-bordered table-striped display" style="width: 100% !important;">
                              <thead>
                                <tr>
                                  <th class="">Acciones</th>
                                  <th>Fecha</th>
                                  <th  data-toggle="tooltip" data-original-title="Registrado en ..."> Registro</th>
                                  <th data-toggle="tooltip" data-original-title="Número y serie comprobante">Comprobante</th>
                                  <th>Total</th>
                                  <th>Descripcion</th>
                                  <th>Estado</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot>
                                <tr>
                                  <th class="">Acciones</th>
                                  <th>Fecha</th>
                                  <th data-toggle="tooltip" data-original-title="Registrado en ...">Registro</th>
                                  <th data-toggle="tooltip" data-original-title="Número y serie comprobante">Num. Comprobante</th>
                                  <th>Total</th>
                                  <th>Descripcion</th>
                                  <th>Estado</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                          <!-- FORM COMPRAS -->
                          <div id="agregar_compras" style="display: none;">
                            <div class="modal-body">
                              <!-- form start -->
                              <form id="form-compra-activos-f" name="form-compra-activos-f" method="POST">
                                <div class="row" id="cargando-1-fomulario">
                                  <!-- id proyecto -->
                                  <input type="hidden" name="idproyecto" id="idproyecto" />
                                  <input type="hidden" name="idcompra_af_general" id="idcompra_af_general" />
                                  <input type="hidden" name="idcompra_proyecto" id="idcompra_proyecto" /> 

                                  <!-- Tipo de Empresa -->
                                  <div class="col-lg-5">
                                    <div class="form-group">
                                      <label for="idproveedor">Proveedor <sup class="text-danger">*</sup></label>
                                      <select id="idproveedor" name="idproveedor" class="form-control select2" data-live-search="true" required title="Seleccione cliente"> </select>
                                    </div>
                                  </div>

                                  <!-- adduser -->
                                  <div class="col-lg-1">
                                    <div class="form-group">
                                      <label for="Add" style="color: white;">.</label>
                                      <a data-toggle="modal" href="#modal-agregar-proveedor" >
                                        <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" data-original-title="Agregar Provedor" onclick="limpiar_form_proveedor();">
                                          <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </button>
                                      </a>
                                    </div>
                                  </div>

                                  <!-- fecha -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label for="fecha_compra">Fecha <sup class="text-danger">*</sup></label>
                                      <input type="date" name="fecha_compra" id="fecha_compra" class="form-control" placeholder="Fecha" />
                                    </div>
                                  </div>

                                  <!-- Glosa -->
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                      <label for="glosa">Glosa <sup class="text-danger">*</sup></label>
                                      <select id="glosa" name="glosa" class="form-control select2" data-live-search="true" required title="Seleccione glosa"> 
                                        <option value="MATERIAL">MATERIAL</option>
                                        <option value="CONBUSTIBLE">CONBUSTIBLE</option>
                                      </select>
                                    </div>
                                  </div>

                                  <!-- Tipo de comprobante -->
                                  <div class="col-lg-4" id="content-tipo-comprobante">
                                    <div class="form-group">
                                      <label for="tipo_comprobante">Tipo Comprobante <sup class="text-danger">*</sup></label>
                                      <select name="tipo_comprobante" id="tipo_comprobante" class="form-control select2"  onchange="default_val_igv(); modificarSubtotales(); ocultar_comprob();" placeholder="Seleccinar un tipo de comprobante">
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Boleta">Boleta</option>
                                        <option value="Factura">Factura</option>
                                        <option value="Nota de venta">Nota de venta</option>
                                      </select>
                                    </div>
                                  </div>

                                  <!-- serie_comprobante-->
                                  <div class="col-lg-2" id="content-serie-comprobante">
                                    <div class="form-group">
                                      <label for="serie_comprobante">N° de Comprobante</label>
                                      <input type="text" name="serie_comprobante" id="serie_comprobante" class="form-control" placeholder="N° de Comprobante" />
                                    </div>
                                  </div>

                                  <!-- IGV-->
                                  <div class="col-lg-1" id="content-igv">
                                    <div class="form-group">
                                      <label for="val_igv">IGV <sup class="text-danger">*</sup></label>
                                      <input type="text" name="val_igv" id="val_igv" class="form-control" value="0.18" onkeyup="modificarSubtotales();" />
                                    </div>
                                  </div>

                                  <!-- Descripcion-->
                                  <div class="col-lg-5" id="content-descripcion">
                                    <div class="form-group">
                                      <label for="descripcion">Descripción </label> <br />
                                      <textarea name="descripcion" id="descripcion" class="form-control" rows="1"></textarea>
                                    </div>
                                  </div>                                  

                                  <!--Boton agregar material-->
                                  <div class="row col-lg-12 justify-content-between">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" style="color: white;">.</label> <br />
                                            <a data-toggle="modal" data-target="#modal-elegir-activos">
                                              <button id="btnAgregarArt" type="button" class="btn btn-primary btn-block"><span class="fa fa-plus"></span> Agregar Productos</button>
                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                          <!-- <label for="" style="color: white;">.</label> <br />
                                          <a data-toggle="modal" data-target="#modal-agregar-material-activos-fijos">
                                            <button id="btnAgregarArt" type="button" class="btn btn-success btn-block" onclick="limpiar_materiales()"><span class="fa fa-plus"></span> Crear Productos</button>
                                          </a> -->
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Rounded switch -->
                                    <div class="col-lg-1 col-xs-3" style="display: none;">
                                      <div class="form-group">
                                        <div id="switch_detracc">
                                          <label for="" style="font-size: 13px;" >Detracción ?</label> <br />
                                          <div class="myestilo-switch2" >
                                            <div class="switch-toggle">
                                              <input type="checkbox" id="my-switch_detracc" />
                                              <label for="my-switch_detracc"></label>
                                            </div>
                                          </div>
                                        </div>
                                        <input type="hidden" name="estado_detraccion" id="estado_detraccion" value="0" />
                                      </div>
                                    </div>
                                  </div>

                                  <!--tabla detalles plantas-->
                                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive row-horizon disenio-scroll">
                                    <br />
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                      <thead style="background-color: #127ab6ba;">
                                        <th data-toggle="tooltip" data-original-title="Opciones">Op.</th>
                                        <th>Material</th>
                                        <th>Unidad</th>
                                        <th>Cantidad</th>
                                        <th class="hidden" data-toggle="tooltip" data-original-title="Valor Unitario" >V/U</th>
                                        <th class="hidden">IGV</th>
                                        <th data-toggle="tooltip" data-original-title="Precio Unitario">P/U</th>
                                        <th>Descuento</th>
                                        <th>Subtotal</th>
                                      </thead>
                                      <tfoot>
                                        <td colspan="5" id="colspan_subtotal"></td>
                                        <th class="text-right">
                                          <h6 class="tipo_gravada">GRAVADA</h6>
                                          <h6 class="val_igv">IGV (18%)</h6>
                                          <h5 class="font-weight-bold">TOTAL</h5>
                                        </th>
                                        <th class="text-right"> 
                                          <h6 class="font-weight-bold subtotal_compra">S/. 0.00</h6>
                                          <input type="hidden" name="subtotal_compra" id="subtotal_compra" />
                                          <input type="hidden" name="tipo_gravada" id="tipo_gravada" />

                                          <h6 class="font-weight-bold igv_compra">S/. 0.00</h6>
                                          <input type="hidden" name="igv_compra" id="igv_compra" />
                                          
                                          <h5 class="font-weight-bold total_venta">S/. 0.00</h5>
                                          <input type="hidden" name="total_venta" id="total_venta" />
                                          
                                        </th>
                                      </tfoot>
                                      <tbody></tbody>
                                    </table>
                                  </div>                                    
                                </div>

                                <div class="row" id="cargando-2-fomulario" style="display: none;">
                                  <div class="col-lg-12 text-center">
                                    <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                    <br />
                                    <h4>Cargando...</h4>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                                <button type="submit" style="display: none;" id="submit-form-compra-activos-f">Submit</button>
                              </form>
                            </div>

                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" onclick="regresar();" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" style="display: none;" id="guardar_registro_compras">Guardar Cambios</button>
                            </div>
                          </div>

                          <!-- TABLA - PAGOS ALL ACTIVOS FIJOS-->
                          <div id="pago_compras" style="display: none;">
                            <div style="text-align: center;">
                              <div>
                                <h4>Total a pagar: <b id="total_compra"></b></h4>
                              </div>
                              <table id="tabla-pagos-proveedor" class="table table-bordered table-striped display" style="width: 100% !important;">
                                <thead>
                                  <tr>
                                    <th class=" text-center">#</th>
                                    <th>Acciones</th>
                                    <th>Forma pago</th>
                                    <th>Beneficiario</th>
                                    <th data-toggle="tooltip" data-original-title="Cuenta Destino">C. Destino</th>
                                    <th data-toggle="tooltip" data-original-title="Fecha Pago">Fecha P.</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Vaucher</th>
                                    <th>Estado</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                  <tr  class="tfoot_pago_general" >
                                  <th class=" text-center">#</th>
                                    <th>Aciones</th>
                                    <th>Forma pago</th>
                                    <th>Beneficiario</th>
                                    <th data-toggle="tooltip" data-original-title="Cuenta Destino">C. Destino</th>
                                    <th data-toggle="tooltip" data-original-title="Fecha Pago">Fecha P.</th>
                                    <th>Descripción</th>
                                    <th style="color: #ff0000; background-color: #45c920;">
                                      <b class="text-nowrap" id="monto_total_general"></b>
                                    </th>
                                    <th>Vaucher</th>
                                    <th>Estado</th>
                                  </tr>
                                  <tr style="display: none;" class="tfoot_pago_proy"  >
                                    <th class=" text-center">#</th>
                                    <th>Aciones</th>
                                    <th>Forma pago</th>
                                    <th>Beneficiario</th>
                                    <th data-toggle="tooltip" data-original-title="Titular Cuenta">Titular C.</th>
                                    <th data-toggle="tooltip" data-original-title="Fecha Pago">Fecha P.</th>
                                    <th>Descripción</th>
                                    <th style="color: #ff0000; background-color: #45c920;">
                                      <b id="monto_total_proy"></b>
                                    </th>
                                    <th>Vaucher</th>
                                    <th>Estado</th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.container-fluid -->

                  <!--:::::::::AGREGAR PAGOS Y PROVEEDOR :::::::-->  

                  <!-- Modal agregar proveedores -->
                  <div class="modal fade" id="modal-agregar-proveedor">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Agregar proveedor</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <!-- form start -->
                          <form id="form-proveedor" name="form-proveedor" method="POST">
                            <div class="card-body row">                               
                              
                              <!-- id proveedores -->
                              <input type="hidden" name="idproveedor_prov" id="idproveedor_prov" />

                              <!-- Tipo de documento -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="tipo_documento_prov">Tipo de documento</label>
                                  <select name="tipo_documento_prov" id="tipo_documento_prov" class="form-control" placeholder="Tipo de documento">
                                    <option value="RUC">RUC</option>
                                    <option selected value="DNI">DNI</option>
                                  </select>
                                </div>
                              </div>

                              <!-- N° de documento -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="num_documento_prov">N° RUC / DNI</label>
                                  <div class="input-group">
                                    <input type="number" name="num_documento_prov" class="form-control" id="num_documento_prov" placeholder="N° de documento" />
                                    <div class="input-group-append" data-toggle="tooltip" data-original-title="Buscar Reniec/SUNAT" onclick="buscar_sunat_reniec();">
                                      <span class="input-group-text" style="cursor: pointer;">
                                        <i class="fas fa-search text-primary" id="search"></i>
                                        <i class="fa fa-spinner fa-pulse fa-fw fa-lg text-primary" id="charge" style="display: none;"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Nombre -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="nombre_prov">Razón Social / Nombre y Apellidos</label>
                                  <input type="text" name="nombre_prov" class="form-control" id="nombre_prov" placeholder="Razón Social o  Nombre" />
                                </div>
                              </div>

                              <!-- Direccion -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="direccion_prov">Dirección</label>
                                  <input type="text" name="direccion_prov" class="form-control" id="direccion_prov" placeholder="Dirección" />
                                </div>
                              </div>

                              <!-- Telefono -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="telefono_prov">Teléfono</label>
                                  <input type="text" name="telefono_prov" id="telefono_prov" class="form-control" data-inputmask="'mask': ['999-999-999', '+099 99 99 999']" data-mask />
                                </div>
                              </div>

                              <!-- Titular de la cuenta -->
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="titular_cuenta_prov">Titular de la cuenta</label>
                                  <input type="text" name="titular_cuenta_prov" class="form-control" id="titular_cuenta_prov" placeholder="Titular de la cuenta" />
                                </div>
                              </div>

                              <!-- banco -->
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="banco_prov">Banco</label>
                                  <select name="banco_prov" id="banco_prov" class="form-control select2" style="width: 100%;" onchange="formato_banco();">
                                    <!-- Aqui listamos los bancos -->
                                  </select>
                                  <!-- <small id="banco_validar" class="text-danger" style="display: none;">Por favor selecione un cargo</small> -->
                                </div>
                              </div>

                              <!-- Cuenta bancaria -->
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="c_bancaria_prov" class="chargue-format-1">Cuenta Bancaria</label>
                                  <input type="text" name="c_bancaria_prov" class="form-control" id="c_bancaria_prov" placeholder="Cuenta Bancaria" data-inputmask="" data-mask />
                                </div>
                              </div>

                              <!-- CCI -->
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="cci_prov" class="chargue-format-2">CCI</label>
                                  <input type="text" name="cci_prov" class="form-control" id="cci_prov" placeholder="CCI" data-inputmask="" data-mask />
                                </div>
                              </div>

                              <!-- Cuenta de detracciones -->
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="c_detracciones_prov" class="chargue-format-3">Cuenta Detracciones</label>
                                  <input type="text" name="c_detracciones_prov" class="form-control" id="c_detracciones_prov" placeholder="Cuenta Detracciones" data-inputmask="" data-mask />
                                </div>
                              </div>                  

                            </div>
                            <!-- /.card-body -->
                            <button type="submit" style="display: none;" id="submit-form-proveedor">Submit</button>
                          </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" id="guardar_registro_proveedor">Guardar Cambios</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Modal agregar Pagos-->
                  <div class="modal fade" id="modal-agregar-pago">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Agregar Pago</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <!-- form start -->
                          <form id="form-servicios-pago" name="form-servicios-pago" method="POST">
                            <div class="card-body">
                              <div class="row" id="cargando-3-fomulario">
                                <!-- id proveedor -->
                                <input type="hidden" name="idproveedor_pago" id="idproveedor_pago" />
                                <!-- idcompras_proyecto -->
                                <input type="hidden" name="idcompra_af_general_p" id="idcompra_af_general_p" />
                                <!-- id compras -->
                                <input type="hidden" name="idpago_af_general" id="idpago_af_general" />
                                <!-- Beneficiario -->
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="beneficiario_pago">Beneficiario</label>
                                    <input class="form-control" type="hidden" id="beneficiario_pago" name="beneficiario_pago" />
                                    <br />
                                    <b id="h4_mostrar_beneficiario" style="font-size: 16px; color: red;"></b>
                                  </div>
                                </div>
                                <!--Forma de pago -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="forma_pago">Forma Pago</label>
                                    <select name="forma_pago" id="forma_pago" class="form-control select2" style="width: 100%;">
                                      <option value="Transferencia">Transferencia</option>
                                      <option value="Efectivo">Efectivo</option>
                                      <option value="Crédito">Crédito</option>
                                    </select>
                                  </div>
                                </div>
                                <!--tipo de pago -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="tipo_pago">Tipo Pago</label>
                                    <select name="tipo_pago" id="tipo_pago" class="form-control select2" style="width: 100%;" onchange="captura_op();">
                                      <option value="Proveedor">Proveedor</option>
                                      <option value="Detraccion">Detracción</option>
                                    </select>
                                  </div>
                                </div>
                                <!-- Cuenta de destino-->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="cuenta_destino_pago">Cuenta destino </label>
                                    <input type="text" name="cuenta_destino_pago" id="cuenta_destino_pago" class="form-control" placeholder="Cuenta destino" />
                                  </div>
                                </div>
                                <!-- banco -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="banco_pago">Banco</label>
                                    <select name="banco_pago" id="banco_pago" class="form-control select2" style="width: 100%;">
                                    </select>
                                    <!-- <small id="banco_validar" class="text-danger" style="display: none;">Por favor selecione un cargo</small>-->
                                  </div>
                                </div>
                                <!-- Titular Cuenta-->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="titular_cuenta_pago">Titular Cuenta </label>
                                    <input type="text" name="titular_cuenta_pago" id="titular_cuenta_pago" class="form-control" placeholder="Titular Cuenta" />
                                  </div>
                                </div>

                                <!-- Fecha Inicio-->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="fecha_pago">Fecha Pago </label>
                                    <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" />
                                  </div>
                                </div>
                                <!-- Monto-->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="monto_pago">Monto </label>
                                    <input type="number" step="0.01" name="monto_pago" id="monto_pago" class="form-control" placeholder="Ingrese monto" onkeyup="validando_excedentes();" onchange="validando_excedentes();" />
                                  </div>
                                </div>
                                <!-- Número de Operación-->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="numero_op_pago">Número de operación </label>
                                    <input type="number" name="numero_op_pago" id="numero_op_pago" class="form-control" placeholder="Número de operación" />
                                  </div>
                                </div>
                                <!-- Descripcion-->
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="descripcion_pago">Descripción </label> <br />
                                    <textarea name="descripcion_pago" id="descripcion_pago" class="form-control" rows="2"></textarea>
                                  </div>
                                </div>
                                <!--vaucher-->
                                <div class="col-md-6 col-lg-4">
                                  <div class="col-lg-12 borde-arriba-naranja mt-2 mb-2"></div>
                                  <label for="foto1">Voucher</label> <br />
                                  <img onerror="this.src='../dist/img/default/img_defecto.png';" src="../dist/img/default/img_defecto.png" class="img-thumbnail" id="foto1_i" style="cursor: pointer !important;" width="auto" />
                                  <input style="display: none;" type="file" name="foto1" id="foto1" accept="image/*" />
                                  <input type="hidden" name="foto1_actual" id="foto1_actual" />
                                  <div class="text-center" id="foto1_nombre"><!-- aqui va el nombre de la FOTO --></div>
                                </div>
                              </div>

                              <div class="row" id="cargando-4-fomulario" style="display: none;">
                                <div class="col-lg-12 text-center">
                                  <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                  <br />
                                  <h4>Cargando...</h4>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <button type="submit" style="display: none;" id="submit-form-pago">Submit</button>
                          </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_c_pagos();">Close</button>
                          <button type="submit" class="btn btn-success" id="guardar_registro_pago">Guardar Cambios</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--:::::::::AGREGAR FACTURAS Y COMPROBANTES :::::::-->  

                  <!-- Modal agregar Comprobante-->
                  <div class="modal fade" id="modal-comprobantes-af-g">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Actualizar Comprobante</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <!-- form start -->
                          <form id="form-comprobante" name="form-comprobante" method="POST">
                            
                            <div class="row" id="cargando-5-fomulario">
                              <!-- id Comprobante -->
                              <input type="hidden" name="idcompra_af_g_o_p" id="idcompra_af_g_o_p" />

                              <!-- Doc  -->
                              <div class="col-md-12 col-lg-12">
                                <div class="row text-center">
                                  <div class="col-md-12" style="padding-top: 15px; padding-bottom: 5px;">
                                    <label for="cip" class="control-label">Documento </label>
                                  </div>
                                  <div class="col-md-6 text-center subir">
                                    <button type="button" class="btn btn-success btn-block btn-xs" id="doc1_i"><i class="fas fa-file-upload"></i> Subir.</button>
                                    <input type="hidden" id="doc_old_1" name="doc_old_1" />
                                    <input style="display: none;" id="doc1" type="file" name="doc1" class="docpdf" />
                                  </div>
                                  <div class="col-md-6 text-center comprobante">
                                    <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion();"><i class="fa fa-eye"></i> Comprobante.</button>
                                  </div>
                                  <div class="col-md-4 text-center descargar" style="display: none;">
                                    <a type="button" class="btn-xs btn btn-warning btn-block" id="descargar_comprob" style="padding: 0px 12px 0px 12px !important;" download="Comprobantes"> <i class="fas fa-download"></i> Descargar. </a>
                                  </div>
                                  <div class="col-md-4 text-center ver_completo" style="display: none;">
                                    <a type="button" class="btn btn-info btn-block btn-xs" target="_blank" id="ver_completo" style="padding: 0px 12px 0px 12px !important;"> <i class="fas fa-expand"></i> Completo. </a>
                                  </div>
                                </div>
                                <div id="doc1_ver" class="text-center mt-4">
                                  <img src="../dist/svg/doc_uploads.svg" alt="" width="50%" />
                                </div>
                                <div class="text-center" id="doc1_nombre"><!-- aqui va el nombre del pdf --></div>
                              </div>

                              <!-- ver_completo descargar comprobante subir -->
                              <!-- barprogress -->
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                <div class="progress" id="div_barra_progress2">
                                  <div id="barra_progress2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                                    0%
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row" id="cargando-6-fomulario" style="display: none;">
                              <div class="col-lg-12 text-center">
                                <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                <br />
                                <h4>Cargando...</h4>
                              </div>
                            </div>
                            
                            <!-- /.card-body -->
                            <button type="submit" style="display: none;" id="submit-form-planootro">Submit</button>
                          </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" id="guardar_registro_2">Guardar Cambios</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--ver comprobantes proyecto-->
                  <div class="modal fade" id="modal-comprobantes-af-p">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Actualizar Comprobante</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <!-- form start -->
                          <form id="form-comprobante_p" name="form-comprobante_p" method="POST">
                            <div class="card-body">
                              <div class="row" id="cargando-7-fomulario">
                                <!-- id Comprobante -->
                                <input type="hidden" name="comp_idcompra_af_proyecto" id="comp_idcompra_af_proyecto" />

                                <!-- Doc  -->
                                <div class="col-md-12 col-lg-12">
                                  <div class="row text-center">
                                    <div class="col-md-12" style="padding-top: 15px; padding-bottom: 5px;">
                                      <label for="cip" class="control-label">Documento </label>
                                    </div>
                                    <div class="col-md-6 text-center subir_c">
                                      <button type="button" class="btn btn-success btn-block btn-xs" id="doc2_i" disabled ><i class="fas fa-file-upload"></i> Subir.</button>
                                      <input type="hidden" id="doc_old_2" name="doc_old_2" />
                                      <input style="display: none;" id="doc2" type="file" name="doc2" class="docpdf" />
                                    </div>
                                    <div class="col-md-6 text-center comprobante_c">
                                      <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion2();"><i class="fa fa-eye"></i> Comprobante.</button>
                                    </div>
                                    <div class="col-md-4 text-center descargar_c" style="display: none;">
                                      <a type="button" class="btn-xs btn btn-warning btn-block" id="descargar_c_comprob" style="padding: 0px 12px 0px 12px !important;" download="Comprobantes"> <i class="fas fa-download"></i> Descargar. </a>
                                    </div>
                                    <div class="col-md-4 text-center ver_c_completo" style="display: none;">
                                      <a type="button" class="btn btn-info btn-block btn-xs" target="_blank" id="ver_c_completo" style="padding: 0px 12px 0px 12px !important;"> <i class="fas fa-expand"></i> Completo. </a>
                                    </div>
                                  </div>
                                  <div id="doc2_ver" class="text-center mt-4">
                                    <img src="../dist/svg/doc_uploads.svg" alt="" width="50%" />
                                  </div>
                                  <div class="text-center" id="doc2_nombre"><!-- aqui va el nombre del pdf --></div>
                                </div>

                                <!-- ver_completo descargar comprobante subir -->
                                <!-- barprogress -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                  <div class="progress" id="div_barra_progress2">
                                    <div id="barra_progress2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                                      0%
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row" id="cargando-8-fomulario" style="display: none;">
                                <div class="col-lg-12 text-center">
                                  <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                  <br />
                                  <h4>Cargando...</h4>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <button type="submit" style="display: none;" id="submit-form-comprobante-p">Submit</button>
                          </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" id="guardar_registro_3" disabled>Guardar Cambios</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!--Modal Ver compras-->
                  <div class="modal fade" id="modal-ver-compras-general">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detalle Compra</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body ">

                          <div class="row detalle_de_compra_general" id="cargando-9-fomulario">
                            <!--detalle de la compra-->
                          </div>

                          <div class="row" id="cargando-10-fomulario" style="display: none;">
                            <div class="col-lg-12 text-center">
                              <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                              <br />
                              <h4>Cargando...</h4>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--:::::::::::VER FACTURAS Y COMPROBANTES :::::::::::-->   

                  <!-- Modal ver los documentos subidos -->
                  <div class="modal fade" id="modal-ver-docs">
                    <div class="modal-dialog modal-dialog-scrollable modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Documentos subidos</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <div class="row">
                            <!-- Pdf 1 -->
                            <div class="col-md-12 col-lg-12 mb-4">
                              <div class="text-center mb-4" id="verdoc1_nombre">
                                <!-- aqui va el nombre del pdf -->
                              </div>

                              <div id="verdoc1" class="text-center">
                                <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                <br />
                                <h4>Cargando...</h4>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer justify-content-end">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Modal-ver-vaucher-pagos-->
                  <div class="modal fade" id="modal-ver-vaucher">
                    <div class="modal-dialog modal-dialog-scrollable modal-xm">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #ce834926;">
                          <h4 class="modal-title">voucher</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="datosservicios" class="class-style" style="text-align: center;">
                            <a class="btn btn-warning btn-block" href="#" id="descargar" download="Voucher" style="padding: 0px 12px 0px 12px !important;" type="button"><i class="fas fa-download"></i></a>
                            <br />
                            <img onerror="this.src='../dist/img/default/img_defecto.png';" src="../dist/img/default/img_defecto.png" class="img-thumbnail" id="img-vaucher" style="cursor: pointer !important;" width="auto" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--::::::::::: INSUMOS Y ACTIVOS FIJOS :::::::::::-->   

                  <!-- Modal elegir Activo -->
                  <div class="modal fade" id="modal-elegir-activos">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">
                            <a data-toggle="modal" data-target="#modal-agregar-material-activos-fijos">
                              <button id="btnAgregarArt" type="button" class="btn btn-success btn-sm" onclick="limpiar_materiales()"><span class="fa fa-plus"></span> Crear Productos</button>
                            </a>
                            Seleccionar Activo 
                          </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body table-responsive">
                          <table id="tblaactivos" class="table table-striped table-bordered table-condensed table-hover" style="width: 100% !important;">
                            <thead>
                              <th data-toggle="tooltip" data-original-title="Opciones">Op.</th>
                              <th>Nombre Activo</th>
                              <th>Clasificación</th>
                              <th data-toggle="tooltip" data-original-title="Precio Unitario">P/U.</th>
                              <th>Descripción</th>
                              <th data-toggle="tooltip" data-original-title="Ficha Técnica" >F.T.</th>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!--Agregar insumos o activos fijos-->            
                  <div class="modal fade" id="modal-agregar-material-activos-fijos">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Agregar Producto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <!-- form start -->
                          <form id="form-materiales" name="form-materiales" method="POST">
                            <div class="card-body">
                              <div class="row" id="cargando-11-fomulario">

                                <!-- idproducto -->
                                <input type="hidden" name="idproducto_p" id="idproducto_p" />                               
                              
                                <!-- cont registro -->
                                <input type="hidden" name="cont" id="cont" />      
                                
                                <!-- Nombre -->
                                <div class="col-lg-8">
                                  <div class="form-group">
                                    <label for="nombre_p">Nombre <sup class="text-danger">*</sup></label>
                                    <input type="text" name="nombre_p" class="form-control" id="nombre_p" placeholder="Nombre del producto." />
                                  </div>
                                </div>

                                <!-- Categoria -->
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label for="categoria_insumos_af_p">Clasificación</label>
                                    <select name="categoria_insumos_af_p" id="categoria_insumos_af_p" class="form-control select2" style="width: 100%;"> 
                                    </select>
                                  </div>
                                </div>

                                <!-- Modelo -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="modelo_p">Modelo <sup class="text-danger">*</sup> </label>
                                    <input class="form-control" type="text" id="modelo_p" name="modelo_p" placeholder="Modelo." />
                                  </div>
                                </div>

                                <!-- Serie -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="serie_p">Serie </label>
                                    <input class="form-control" type="text" id="serie_p" name="serie_p" placeholder="Serie." />
                                  </div>
                                </div>

                                <!-- Marca -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="marca_p">Marca </label>
                                    <input class="form-control" type="text" id="marca_p" name="marca_p" placeholder="Marca de activo." />
                                  </div>
                                </div>

                                <!-- Color -->
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="color_p">Color</label>
                                    <select name="color_p" id="color_p" class="form-control select2" style="width: 100%;"> </select>
                                  </div>
                                </div>
                                
                                <!-- Unnidad-->
                                <div class="col-lg-6" id="content-t-unidad">
                                  <div class="form-group">
                                    <label for="unidad_medida_p">Unidad-medida</label>
                                    <select name="unidad_medida_p" id="unidad_medida_p" class="form-control select2" style="width: 100%;"> </select>
                                  </div>
                                </div>

                                <!--Precio U-->
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label for="precio_unitario_p">Precio <sup class="text-danger">*</sup></label>
                                    <input type="number" name="precio_unitario_p" class="form-control miimput" id="precio_unitario_p" placeholder="Precio Unitario." onchange="precio_con_igv();" onkeyup="precio_con_igv();" />
                                  </div>
                                </div>

                                <!-- Rounded switch -->
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <label for="" class="labelswitch">Sin o Con (Igv)</label>
                                    <div id="switch_igv">
                                      <div class="switch-holder myestilo-switch">
                                        <div class="switch-toggle">
                                          <input type="checkbox" id="my-switch_igv" checked />
                                          <label for="my-switch_igv"></label>
                                        </div>
                                      </div>
                                    </div>
                                    <input type="hidden" name="estado_igv_p" id="estado_igv_p" />
                                  </div>
                                </div>

                                <!--Sub Total subtotal igv total-->
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label for="precio_sin_igv_p">Sub Total</label>
                                    <input type="number" class="form-control" name="precio_sin_igv_p" id="precio_sin_igv_p" placeholder="Precio real." onchange="precio_con_igv();" onkeyup="precio_con_igv();" readonly />
                                  </div>
                                </div>

                                <!--IGV-->
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label for="precio_igv_p">IGV</label>
                                    <input type="number" class="form-control" name="precio_igv_p" id="precio_igv_p" placeholder="Monto igv." onchange="precio_con_igv();" onkeyup="precio_con_igv();" readonly />
                                  </div>
                                </div>

                                <!--Total-->
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label for="precio_total_p">Total</label>
                                    <input type="number" class="form-control" name="precio_total_p" id="precio_total_p" placeholder="Precio real." readonly />
                                  </div>
                                </div>

                                <!--Descripcion-->
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="descripcion_p">Descripción </label> <br />
                                    <textarea name="descripcion_p" id="descripcion_p" class="form-control" rows="2"></textarea>
                                  </div>
                                </div>

                                <!--iamgen-material-->
                                <div class="col-md-6 col-lg-6">
                                  <label for="foto2">Imagen</label>
                                  <div style="text-align: center;">
                                    <img
                                      onerror="this.src='../dist/img/default/img_defecto_activo_fijo_material.png';"
                                      src="../dist/img/default/img_defecto_activo_fijo_material.png"
                                      class="img-thumbnail"
                                      id="fotop2_i"
                                      style="cursor: pointer !important; height: 100% !important;"
                                      width="auto"
                                    />
                                    <input style="display: none;" type="file" name="fotop2" id="fotop2" accept="image/*" />
                                    <input type="hidden" name="fotop2_actual" id="fotop2_actual" />
                                    <div class="text-center" id="fotop2_nombre"><!-- aqui va el nombre de la FOTO --></div>
                                  </div>
                                </div>

                                <!-- Ficha tecnica -->
                                <div class="col-md-6 col-lg-6">
                                  <label for="doc2_i" >Ficha técnica <b class="text-danger">(Imagen o PDF)</b> </label>  
                                  <div class="row text-center">                               
                                    <!-- Subir documento -->
                                    <div class="col-md-6 text-center">
                                      <button type="button" class="btn btn-success btn-block btn-xs" id="doct2_i">
                                        <i class="fas fa-upload"></i> Subir.
                                      </button>
                                      <input type="hidden" id="doc_oldt_2" name="doc_oldt_2" />
                                      <input style="display: none;" id="doct2" type="file" name="doct2" accept="application/pdf, image/*" class="docpdf" /> 
                                    </div>
                                    <!-- Recargar -->
                                    <div class="col-md-6 text-center comprobante">
                                      <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion3(2, 'ficha_tecnica');">
                                      <i class="fas fa-redo"></i> Recargar.
                                    </button>
                                    </div>                                  
                                  </div>
                                  <div id="doct2_ver" class="text-center mt-4">
                                    <img src="../dist/svg/pdf_trasnparent.svg" alt="" width="50%" >
                                  </div>
                                  <div class="text-center" id="doct2_nombre"><!-- aqui va el nombre del pdf --></div>
                                </div>

                              </div>

                              <div class="row" id="cargando-12-fomulario" style="display: none;">
                                <div class="col-lg-12 text-center">
                                  <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                                  <br />
                                  <h4>Cargando...</h4>
                                </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <button type="submit" style="display: none;" id="submit-form-materiales">Submit</button>
                          </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_materiales();">Close</button>
                          <button type="submit" class="btn btn-success" id="guardar_registro_material">Guardar Cambios</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Modal ver grande img producto -->
                  <div class="modal fade" id="modal-ver-img-material">
                    <div class="modal-dialog modal-dialog-scrollable modal-md">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #49a9ceb8;">
                          <h4 class="modal-title nombre-img-material">Img producto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-danger" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="class-style" style="text-align: center;">
                            
                            <img onerror="this.src='../dist/img/default/img_defecto_activo_fijo.png';" src="" class="img-thumbnail " id="ver_img_material" style="cursor: pointer !important;" width="auto" />
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </section>
              <!-- /.content -->
            </div>
            <!--Fin-Contenido-->

            <?php
          }else{
            require 'noacceso.php';
          }
          require 'footer.php';
          ?>
        </div>
        <?php          
          require 'script.php';
        ?>
        
        <script type="text/javascript" src="scripts/compra_activos_fijos.js"></script>
        
        <script>
          $(function () {
            $('[data-toggle="tooltip"]').tooltip();
          });
        </script>

        <?php require 'extra_script.php'; ?>
        
      </body>
    </html>
    <?php    
  }
  ob_end_flush();
?>
