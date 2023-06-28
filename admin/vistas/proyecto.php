<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombre"])){
    header("Location: index.php");
  }else{ ?>

    <!DOCTYPE html>
    <html lang="es">
      <!-- Mirrored from htmlstream.com/front/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:15:43 GMT -->
      <head>
        <!-- Title -->
        <title>Proyectos | Seven's Ingenieros</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <?php $title = "Proyectos"; require 'head.php'; ?>
      </head>

      <body>
        <!-- ========== MAIN ========== -->
        <main id="content" role="main" class="bg-light">
        <?php
          if ($_SESSION['sistema_informativo']==1){
            //require 'enmantenimiento.php';
            ?>
            <!-- header -->
            <?php require 'header.php'; ?>
            <!-- fin  header -->
            <!-- Content Section -->
            <div class="container container_mod space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
              <div class="row">
                <div class="col-lg-3"><?php require 'aside.php'; ?></div>
                <div class="col-lg-9">
                  <!-- Card -->
                  <div class="card mb-3 mb-lg-5 card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title botones_galeria">
                        <button type="button" class="btn btn-warning btn-xs" onclick="limpiar_galeria(); mostrar_section(1);"><i class="fas fa-arrow-left"></i> Regresar</button>
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-agregar-imagen" onclick="limpiar_galeria(); "><i class="fas fa-plus-circle"></i> Agregar</button>
                      </h3>
                      <h3 class="card-title btn_add_proyect">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-agregar-proyecto" onclick="limpiar(); mostrar_select(1);"><i class="fas fa-plus-circle"></i> Agregar</button>
                        Proyectos
                      </h3>
                      <h3 class="card-title botones_fases">
                        <button type="button" class="btn btn-warning btn-xs" onclick="limpiar_fase(); mostrar_section(1);"><i class="fas fa-arrow-left"></i> Regresar</button>
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-agregar-fase" onclick="limpiar_fase();"><i class="fas fa-plus-circle"></i> Agregar </button>
                      </h3>
                    </div>

                    <!-- Body -->
                    <div class="card-body">
                      <div class="row">                  

                        <div class="col-lg-12 tabla">
                          <!-- tabla -->
                          <table id="tabla-proyecto" class="table table-bordered table-striped display" style="width: 100% !important;">
                            <thead>
                              <tr>
                                <th class="">Acc.</th>
                                <th data-toggle="tooltip" data-original-title="Nombres">Nombre</th>
                                <th data-toggle="tooltip" data-original-title="Descripción">Descrip</th>
                                <th data-toggle="tooltip" ata-original-title="Opciones">Op.</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                              <tr>
                                <th class="">Acc.</th>
                                <th data-toggle="tooltip" data-original-title="Nombres">Nombre</th>
                                <th data-toggle="tooltip" data-original-title="Descripción">Descrip</th>
                                <th data-toggle="tooltip" data-original-title="Opciones">Op.</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- GALERIA -->
                        <div class="col-lg-12 text-center galeria" style="display: none;">                    
                          <div class="row" id="l_galeria"> </div>
                        </div>
                        <!-- FIN GALERIA -->

                        <!-- FASES PROYECTO -->
                        <div class="col-lg-12 text-center fases_proyecto" style="display: none;">
                          <div id="f_cargando"></div>
                          <div>
                            <!-- tabla -->
                            <table id="tabla-fases" class="table table-bordered table-striped display" style="width: 100% !important;">
                              <thead>
                                <tr>
                                <th class="">Acc.</th>
                                  <th data-toggle="tooltip" data-original-title="Número de fase">N° de fase</th>
                                  <th data-toggle="tooltip" data-original-title="Nombre">Nombre</th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot>
                                <tr>
                                  <th class="">Acc.</th>
                                  <th data-toggle="tooltip" data-original-title="Número de fase">N° de fase</th>
                                  <th data-toggle="tooltip" data-original-title="Nombre">Nombre</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                        <!-- FIN FASES PROYECTO -->

                      </div>
                    </div>
                    <!-- End Body -->
                  </div>
                  <!-- End Card -->
                </div>
              </div>
              <!-- End Row -->
            </div>
            <!-- End Content Section -->

            <!-- Modal agregar proyecto -->
            <div class="modal fade" id="modal-agregar-proyecto">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><b>Agregar:</b> Proyecto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <!-- form start -->
                    <form id="form-proyecto" name="form-proyecto" method="POST">
                      <div class="card-body">
                        <div class="row" id="cargando-1-fomulario">
                          <!--  idproyecto -->
                          <input type="hidden" name="idproyecto" id="idproyecto" />

                          <!-- proyecto -->
                          <div class="col-lg-12">
                            <div class="form-group selectt">
                              <label for="id_pryecto_adm" class="cargando_">Proyecto <i class="fas fa-spinner fa-pulse fa-lg text-danger"></i></label>                               
                              <select name="id_pryecto_adm" id="id_pryecto_adm"
                              class="js-custom-select custom-select" size="1" style="opacity: 0;"
                              data-hs-select2-options='{ "minimumResultsForSearch": "Infinity", "placeholder": "Seleccionar un proyecto" }' style="width: 100%;">                                    
                              </select>
                            </div>  
                            <div class="form-group edith">
                              <label for="proyecto">Proyecto</label>
                              <input type="text" class="form-control selec_proyecto_adm " placeholder="Proyecto" readonly />
                              <input type="hidden" class="form-control id_pryecto_adm_edith" id="id_pryecto_adm_edith" name="id_pryecto_adm_edith" />
                            </div>

                          </div>
                          <!--Descripcion-->
                          <div class="col-lg-12 class_pading">
                            <div class="form-group">
                              <label for="descripcion_pago">Descripción <sup class="text-danger">*</sup> </label> <br />
                              <textarea name="descripcion" id="descripcion" class="form-control" rows="2"></textarea>
                            </div>
                          </div>
                          <!-- Factura -->
                          <div class="col-md-6">
                            <div class="row text-center">
                              <div class="col-md-12" style="padding-top: 15px; padding-bottom: 5px;">
                                <label for="cip" class="control-label"> Imagen </label>
                              </div>
                              <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-success btn-block btn-xs clase_margin" id="doc1_i"><i class="fas fa-upload"></i> Subir.</button>
                                <input type="hidden" id="doc_old_1" name="doc_old_1" />
                                <input style="display: none;" id="doc1" type="file" name="doc1" accept="application/pdf, image/*" class="docpdf" />
                              </div>
                              <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion(1, 'proyecto', 'imagen_perfil');"><i class="fas fa-redo"></i> Recargar.</button>
                              </div>
                            </div>
                            <div id="doc1_ver" class="text-center mt-4">
                              <img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" />
                            </div>
                            <div class="text-center" id="doc1_nombre"><!-- aqui va el nombre del pdf --></div>
                          </div>
                          <!--indicaciones-->
                          <div class="col-lg-6 class_pading">
                              <div class="alert alert-warning media" role="alert">
                                <i class="fas fa-info-circle mt-1 fa-2x"></i>
                                
                                <div class="media-body" role="alert"> 
                                <div class="text-center"><b> Indicaciones para la imegen</b> </div>                           
                                  <hr style="border-top-color: azure;"/>
                                  <ul>
                                    <li> <b>Tamaño:</b>  480x320 </li>
                                    <li> <b>Formatos:</b> <span> .png .jpeg .jpg </span>  </li>
                                    <li>  <b>Peso:</b> Max. 2 mb </li>
                                  </ul>
                                </div>
                            </div>
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
                            <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                            <br />
                            <h4>Cargando...</h4>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <button type="submit" style="display: none;" id="submit-form-proyecto">Submit</button>
                    </form>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" onclick="limpiar();">Close</button>
                    <button type="submit" class="btn btn-success btn-xs" id="guardar_registro">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal ver imagen  proyecto -->
            <div class="modal fade " id="modal-ver-imagen" tabindex="-1" role="dialog" aria-hidden="true" style="background-color: #00000063;">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"><b>Proyecto:</b> <span class="text-warning" id="nombre_proyecto"></span>  </h4>
                    <div class="modal-close">
                      <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close" style="background-color: rgb(0 0 0 / 61%);">
                        <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                          <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                        </svg>
                      </button>
                    </div>
                  </div>
                  <!-- End Header -->

                  <!-- Body -->
                  <div class="modal-body p-sm-2 text-center">
                    <div id="signinModalForm">
                      <div class="img_modal_xl_">
                        <p><i class="fas fa-spinner fa-pulse fa-sm fa-1x"></i> Cargando ...</p> 
                      </div>
                    </div>
                  </div>
                  <!-- End Body -->
                </div>
              </div>
            </div>

            <!-- Modal agregar imagen -->
            <div class="modal fade" id="modal-agregar-imagen">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><b>Agregar:</b> Imagen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <!-- form start -->
                    <form id="form-imagen-proyect" name="form-imagen-proyect" method="POST">
                      <div class="card-body">
                        <div class="row" id="cargando-3-fomulario">
                          <!--  idproyecto -->
                          <input type="hidden" name="idgaleria_proyecto" id="idgaleria_proyecto" />
                          <!-- <input type="text" name="idproyecto_img" id="idproyecto_img" /> -->

                          <!-- select2 -->
                          <div class="col-lg-6">
                            <div class="form-group selectt">
                              <label for="fase_select" class="cargando_select">Fase <i class="fas fa-spinner fa-pulse fa-lg text-danger"></i></label>                               
                              <select name="id_fase_select" id="id_fase_select"
                              class="js-custom-select custom-select" size="1" style="opacity: 0;"
                              data-hs-select2-options='{
                                "minimumResultsForSearch": "Infinity",
                                "placeholder": "Seleccionar un proyecto"
                              }' style="width: 100%;">                                    
                              </select>
                            </div> 
                          </div>

                          <!-- nombre foto -->
                          <div class="col-lg-6"> 
                            <div class="form-group">
                              <label for="nombre_img">Nombre imagen</label>
                              <input type="text" class="form-control" id="nombre_img" name="nombre_img" placeholder="Nombre imagen"/>
                            </div>

                          </div>

                          <!-- imagen -->
                          <div class="col-md-6 col-lg-6">
                            <label for="doc2_i" ><small><b class="text-danger">(Imagen)</b></small>  </label>  
                            <div class="row text-center">                               
                              <!-- Subir img -->
                              <div class="col-6 col-md-6 text-center">
                                <button type="button" class="btn btn-success btn-block btn-xs" id="doc2_i">
                                  <i class="fas fa-upload"></i> Subir.
                                </button>
                                <input type="hidden" id="doc_old_2" name="doc_old_2" />
                                <input style="display: none;" id="doc2" type="file" name="doc2" accept="image/*" class="docpdf" /> 
                              </div>
                              <!-- Recargar -->
                              <div class="col-6 col-md-6 text-center comprobante">
                                <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion(2, 'proyecto','img_galeria');">
                                <i class="fas fa-redo"></i> Recargar.
                              </button>
                              </div>                                  
                            </div>
                            <div id="doc2_ver" class="text-center mt-4">
                              <img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >
                            </div>
                            <div class="text-center" id="doc2_nombre"><!-- aqui va el nombre del pdf --></div>
                          </div>
                          
                          <!--indicaciones-->
                          <div class="col-lg-6 class_pading">
                            <div class="alert alert-warning media" role="alert">
                              <i class="fas fa-info-circle mt-1 fa-2x"></i>
                              
                              <div class="media-body" role="alert"> 
                              <div class="text-center"><b> Indicaciones para la imegen</b> </div>                           
                                <hr style="border-top-color: azure;"/>
                                <ul>
                                  <li> <b>Tamaño:</b>  400x500 </li>
                                  <li> <b>Formatos:</b> <span> .png .jpeg .jpg </span>  </li>
                                  <li>  <b>Peso:</b> Max. 2 mb </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <!-- barprogress -->
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                            <div class="progress" id="barra_progress_galeria_div">
                              <div id="barra_progress_galeria" class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                                0%
                              </div>
                            </div>
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
                      <button type="submit" id="submit-form-imagen-proyect" style="display: none;">Submit</button>                      
                    </form>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" onclick="limpiar_galeria();">Close</button>
                    <button type="submit" class="btn btn-success btn-xs" id="guardar_registro_galeria">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Modal agregar fases proyecto -->
            <div class="modal fade" id="modal-agregar-fase">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><b>Agregar:</b> FASE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <!-- form start -->
                    <form id="form-fase" name="form-fase" method="POST">
                      <div class="card-body">
                        <div class="row" id="cargando-5-fomulario">
                          <!--  idproyecto -->
                          <input type="hidden" name="idfase" id="idfase" />
                          <input type="hidden" name="idproyecto_fase" id="idproyecto_fase" />

                          <!-- # -->
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="precio">N° de fase <sup class="text-danger">*</sup></label>
                              <input class="form-control" type="number" id="n_fase" name="n_fase" min='1' placeholder="N° de fase"/>
                            </div>
                          </div>
                          
                          <!-- Nombre -->
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="Nombre">Nombre  <sup class="text-danger">*</sup></label>
                              <input class="form-control" type="text" id="nombre_f" name="nombre_f" placeholder="Nombre fase"/>
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
                      </div>
                      <!-- /.card-body -->
                      <button type="submit" style="display: none;" id="submit-form-proyecto-fase">Submit</button>
                    </form>
                  </div>

                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" onclick="limpiar_fase();">Close</button>
                    <button type="submit" class="btn btn-success btn-xs" id="guardar_registro_fase">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal ver imagen secc imagenes  -->
            <div class="modal fade " id="modal_xl" tabindex="-1" role="dialog" aria-hidden="true" style="background-color: #00000063;">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <!-- Header -->
                  <div class="modal-close">
                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close" style="background-color: rgb(0 0 0 / 61%);">
                      <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                      </svg>
                    </button>
                  </div>
                  <!-- End Header -->

                  <!-- Body -->
                  <div class="modal-body p-sm-2 text-center">
                    <div id="signinModalForm">
                      <div class="img_modal_xl">
                        <p><i class="fas fa-spinner fa-pulse fa-sm fa-1x"></i> Cargando ...</p> 
                      </div>
                    </div>
                  </div>
                  <!-- End Body -->
                </div>
              </div>
            </div>

            <?php
          }else{
            require 'noacceso.php';
          }
          require 'footer.php';
          ?>
        </main>
        <!-- ========== END MAIN ========== -->

        <!-- Go to Top -->
        <a class="js-go-to go-to position-fixed"  href="javascript:;"  style="visibility: hidden;"
          data-hs-go-to-options='{
          "offsetTop": 700,
          "position": {
            "init": { "right": 15 },
            "show": { "bottom": 15 },
            "hide": { "bottom": -15 }
          }
        }' >
          <i class="fas fa-angle-up"></i>
        </a>
        <!-- End Go to Top -->

        <!-- ========== SCRIPT ========== -->
        <?php require 'script.php'; ?>

        <!-- JS Plugins Init. -->
        <script>
          $(document).on("ready", function () {
            // INITIALIZATION OF HEADER
            // =======================================================
            var header = new HSHeader($("#header")).init();

            // INITIALIZATION OF MEGA MENU
            // =======================================================
            var megaMenu = new HSMegaMenu($(".js-mega-menu"), {
              desktop: {
                position: "left",
              },
            }).init();

            // INITIALIZATION OF UNFOLD
            // =======================================================
            var unfold = new HSUnfold(".js-hs-unfold-invoker").init();

            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $(".js-validate").each(function () {
              $.HSCore.components.HSValidation.init($(this), {
                rules: {
                  confirmPassword: {
                    equalTo: "#signupPassword",
                  },
                },
              });
            });

            // INITIALIZATION OF SHOW ANIMATIONS
            // =======================================================
            $(".js-animation-link").each(function () {
              var showAnimation = new HSShowAnimation($(this)).init();
            });

            // INITIALIZATION OF MASKED INPUT
            // =======================================================
            $(".js-masked-input").each(function () {
              var mask = $.HSCore.components.HSMask.init($(this));
            });

            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            $(".js-file-attach").each(function () {
              var customFile = new HSFileAttach($(this)).init();
            });

            // INITIALIZATION OF ADD INPUT FILED
            // =======================================================
            $(".js-add-field").each(function () {
              new HSAddField($(this), {
                addedField: () => {
                  $(".js-add-field .js-custom-select-dynamic").each(function () {
                    var select2dynamic = $.HSCore.components.HSSelect2.init($(this));
                  });
                },
              }).init();
            });

            // INITIALIZATION OF SELECT2
            // =======================================================
            $(".js-custom-select").each(function () {
              var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            // INITIALIZATION OF CUBEPORTFOLIO
            // =======================================================
            $('.cbp').each(function () {
              var cbp = $.HSCore.components.HSCubeportfolio.init($(this), {
                layoutMode: 'grid',
                filters: '#filterControls',
                displayTypeSpeed: 0
              });
            });

            // INITIALIZATION OF QUILLJS EDITOR
            // =======================================================
            var quill = $.HSCore.components.HSQuill.init(".js-quill");

            // INITIALIZATION OF GO TO
            // =======================================================
            $(".js-go-to").each(function () {
              var goTo = new HSGoTo($(this)).init();
            });

          });
        </script>
        <style>
          /* .textarea_datatable {
            width: 100%;
            background: rgb(215 224 225 / 22%);
            border-block-color: inherit;
            border-bottom: aliceblue;
            border-left: aliceblue;
            border-right: aliceblue;
            border-top: hidden;
          }
          .avatar-img-modif { max-width: 50%; height: 50%; object-fit: cover; }

          .geeks { overflow: hidden;  margin: 0 auto; }
          
          .geeks img { width: 90%; transition: 0.5s all ease-in-out; }
          
          .geeks:hover img { transform: scale(1.5); } */
        </style>
        <!-- IE Support -->
        <script>
          if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
        </script>
        <!-- JS script -->
        <script src="scripts/proyecto.js"></script>
      </body>

      <!-- Mirrored from htmlstream.com/front/account-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:19:48 GMT -->
    </html>
    <?php    
  }
  ob_end_flush();
?>
