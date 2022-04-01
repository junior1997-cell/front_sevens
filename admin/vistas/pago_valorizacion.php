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
        <title>Admin Sevens | Pago Valorización</title>

        <?php $title = "Pago Valorización"; require 'head.php'; ?>
        
      </head>
      <body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed ">
        
        <div class="wrapper">
          <!-- Preloader -->
          <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/svg/logo-principal.svg" alt="AdminLTELogo" width="360" />
          </div> -->
        
          <?php
          require 'nav.php';
          require 'aside.php';
          if ($_SESSION['pago_trabajador']==1){
            require 'endesarrollo.php';
            ?>           
            <!--Contenido-->
            <div class="d-none content-wrapper" >
              <!-- Content Header (Page header) -->
              <div class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="m-0 nombre-trabajador">Estado Financiero</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="estado_financiero.php">Home</a></li>
                        <li class="breadcrumb-item active">Estado Financiero</li>
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
                        <div class="card-header"> 

                          <!-- agregar pago  -->
                          <h3 class="card-title " id="btn-agregar" >
                            <button type="button" class="btn bg-gradient-success btn-sm" data-toggle="modal" data-target="#modal-agregar-pago-trabajdor" onclick="limpiar_pago_x_mes();">
                            <i class="fas fa-plus-circle"></i> Agregar Estado Financiero
                            </button>                     
                          </h3> 

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                          <!-- tabla principal -->
                          <div class=" pb-3" id="tbl-principal">
                            <table id="tabla-principal" class="table table-bordered  table-striped display" style="width: 100% !important;">
                              <thead>
                                <tr> 
                                  <th>Trabajdor</th> 
                                  <th>Fecha inicio</th>
                                  <th>Hoy</th>
                                  <th class="text-center">Fecha <br> culminacion</th>
                                  <th class="text-center">Tiempo <br> trabajado (dias)</th>                                
                                  <th>Sueldo Mensual</th>
                                  <th class="text-center" data-toggle="tooltip" data-original-title="Pago total desde el dia inicial a final">Pago total</th>
                                  <th class="text-center" data-toggle="tooltip" data-original-title="Pago acumulado hasta hoy" >Pago <br> acumulado</th>
                                  <th class="text-center" data-toggle="tooltip" data-original-title="Depositos realizados" >Pago <br> realizado</th>                                
                                  <th data-toggle="tooltip" data-original-title="Saldo hasta hoy">Saldo</th>
                                  <th class="text-center" data-toggle="tooltip" data-original-title="Fecha pagada con anterioridad">Último <br> pago</th>
                                  <th class="text-center" data-toggle="tooltip" data-original-title="Fecha siguiente de pago">Pago <br> Siguiente</th>
                                  <th>Cel:</th>                         
                                </tr>
                              </thead>
                              <tbody>                         
                                
                              </tbody>
                              <tfoot>
                                <tr> 
                                  <th class="text-gray">Trabajdor</th> 
                                  <th class="text-gray">Fecha inicio</th>
                                  <th class="text-center text-gray">Hoy</th>
                                  <th class="text-center text-gray">Fecha <br> culminacion</th>
                                  <th class="text-center text-gray">Tiempo <br> trabajado (dias)</th>                                                                
                                  <th class="text-right text-dark-0 "> <h5 class="sueldo_total_tbla_principal"> S/ <i class="fas fa-spinner fa-pulse fa-sm"></i> </h5></th>
                                  <th class="text-right text-dark-0"><h5 class="pago_total_tbla_principal"> S/ <i class="fas fa-spinner fa-pulse fa-sm"></i> </h5></th>                                
                                  <th class="text-right text-dark-0"><h5 class="pago_hoy_total_tbla_principal"> S/ <i class="fas fa-spinner fa-pulse fa-sm"></i> </h5></th>
                                  <th class="text-right text-dark-0 "><h5 class="deposito_total_tbla_principal"> S/<i class="fas fa-spinner fa-pulse fa-sm"></i> </h5></th>                                
                                  <th class="text-right text-dark-0 "><h5 class="saldo_total_tbla_principal"> S/<i class="fas fa-spinner fa-pulse fa-sm"></i> </h5></th>  
                                  <th class="text-center text-gray">Último <br> pago</th>
                                  <th class="text-center text-gray">Siguiente <br> pago</th>
                                  <th>Cel:</th>                            
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

                <!-- Modal agregar PAGOS POR MES -->
                <div class="modal fade" id="modal-agregar-pago-trabajdor">
                  <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Agregar pago: <b class="nombre_de_trabajador_modal"> <!-- NOMBRE DEL TRABAJDOR--> </b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span class="text-danger" aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                        <!-- form start -->
                        <form id="form-pagos-x-mes" name="form-pagos-x-mes"  method="POST" >                      
                          <div class="card-body">
                            <div class="row" id="cargando-1-fomulario">

                              <!-- id idpagos_x_mes_administrador -->
                              <input type="hidden" name="idpagos_x_mes_administrador" id="idpagos_x_mes_administrador" />

                              <!-- id idfechas_mes_pagos_administrador -->
                              <input type="hidden" name="idfechas_mes_pagos_administrador_pxm" id="idfechas_mes_pagos_administrador_pxm" />
                              <!-- id_tabajador_x_proyecto -->
                              <input type="hidden" name="id_tabajador_x_proyecto_pxm" id="id_tabajador_x_proyecto_pxm" />
                              <!-- fecha inicial -->
                              <input type="hidden" name="fecha_inicial_pxm" id="fecha_inicial_pxm" />
                              <!-- fecha final -->
                              <input type="hidden" name="fecha_final_pxm" id="fecha_final_pxm" />
                              <!-- nombre del mes -->
                              <input type="hidden" name="mes_nombre_pxm" id="mes_nombre_pxm" />
                              <!-- dias del mes -->
                              <input type="hidden" name="dias_mes_pxm" id="dias_mes_pxm" />
                              <!-- dias_regular -->
                              <input type="hidden" name="dias_regular_pxm" id="dias_regular_pxm" />
                              <!-- sueldo_mensual -->
                              <input type="hidden" name="sueldo_mensual_pxm" id="sueldo_mensual_pxm" />
                              <!-- monto_x_mes -->
                              <input type="hidden" name="monto_x_mes_pxm" id="monto_x_mes_pxm" />                            

                              <!-- Forma de pago hacia el trabajdor -->
                              <div class="col-lg-6">
                                <div class="form-group">
                                <label for="forma_pago">Forma Pago</label>
                                <select name="forma_pago" id="forma_pago" class="form-control select2" style="width: 100%;">
                                  <option value="Transferencia">Transferencia</option>
                                  <option value="Efectivo">Efectivo</option>
                                </select>
                                </div>
                              </div>

                              <!-- Cuenta deposito enviada -->
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="cuenta_deposito">Cuenta deposito <small>(del trabajdor)</small> </label>                               
                                  <input type="text" name="cuenta_deposito" id="cuenta_deposito" class="form-control"  placeholder="Cuenta deposito">  
                                </div>                                                        
                              </div>

                              <!-- Monto (de cantidad a depositado) -->
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="monto">Monto <small> (Monto a pagar) </small> </label>                               
                                  <input type="text" name="monto" id="monto" class="form-control"  placeholder="Monto a pagar"> 
                                </div>                                                        
                              </div>
                              
                              <!-- Mes del pago -->
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="nombre_mes" class="text-gray">Mes </label>
                                  <span class="nombre_mes_modal text-gray form-control"> <sup>S/</sup> 0.00</span>
                                </div>
                              </div>

                              <!-- Monto faltante -->
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="nombre_mes" class="text-gray">Faltante </label>
                                  <span class="faltante_mes_modal text-gray form-control"> <sup>S/</sup> 0.00</span>
                                </div>
                              </div>
                              
                              <!-- Descripcion-->
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="descripcion">Descripción </label> <br>
                                  <textarea name="descripcion" id="descripcion" class="form-control" rows="2"></textarea>
                                </div>                                                        
                              </div>
                              
                              <!-- Pdf 1 -->
                              <div class="col-md-12" >                               
                                <div class="row text-center">
                                  <div class="col-md-12" style="padding-top: 15px; padding-bottom: 5px;">
                                    <label for="cip" class="control-label" > Baucher de deposito </label>
                                  </div>
                                  <div class="col-md-6 text-center">
                                    <button type="button" class="btn btn-success btn-block btn-xs" id="doc1_i">
                                      <i class="fas fa-upload"></i> Subir.
                                    </button>
                                    <input type="hidden" id="doc_old_1" name="doc_old_1" />
                                    <input style="display: none;" id="doc1" type="file" name="doc1" accept="application/pdf, image/*" class="docpdf" /> 
                                  </div>
                                  <div class="col-md-6 text-center">
                                    <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion(1, 'baucher_deposito');">
                                    <i class="fas fa-redo"></i> Recargar.
                                    </button>
                                  </div>
                                </div>                              
                                <div id="doc1_ver" class="text-center mt-4">
                                  <img src="../dist/svg/doc_uploads.svg" alt="" width="50%" >
                                </div>
                                <div class="text-center" id="doc1_nombre"><!-- aqui va el nombre del pdf --></div>
                              </div>

                              <!-- barprogress -->
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                <div class="progress" id="div_barra_progress">
                                  <div id="barra_progress" class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                                    0%
                                  </div>
                                </div>
                              </div>                                          

                            </div>  

                            <div class="row" id="cargando-2-fomulario" style="display: none;">
                              <div class="col-lg-12 text-center">
                                <i class="fas fa-spinner fa-pulse fa-6x"></i><br><br>
                                <h4>Cargando...</h4>
                              </div>
                            </div>
                            
                          </div>
                          <!-- /.card-body -->                      
                          <button type="submit" style="display: none;" id="submit-form-pagos-x-mes">Submit</button>                      
                        </form>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="guardar_registro">Guardar Cambios</button>
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

        <?php  require 'script.php'; ?>         

        <script type="text/javascript" src="scripts/estado_financiero.js"></script>
         
        <script>
          $(function () {
            $('[data-toggle="tooltip"]').tooltip();
          })
        </script>

        <?php require 'extra_script.php'; ?>
        
      </body>
    </html>
    <?php    
  }
  ob_end_flush();
?>
