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
    <title>Servicios | Seven's Ingenieros</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php $title = "Datos generales"; require 'head.php'; ?>
  </head>
  <style> .class_table{ padding-right: 3px!important; padding-left: 5px!important; } </style>
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
                <h3 class="card-title">
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-agregar-servicios" onclick="limpiar();"><i class="fas fa-plus-circle"></i> Agregar</button>
                  Servicio
                </h3>
              </div>

              <!-- Body -->
              <div class="card-body">
                <!-- form start -->
                <div class="row">
                  <div class="col-lg-12 text-center cargando">
                    <i class="fas fa-spinner fa-pulse fa-3x"></i><br />
                    <br />
                    <h4>Cargando...</h4>
                  </div>
                  <div class="col-lg-12 tabla" style="display: none;">
                    <table id="tabla-servicios" class="table table-bordered table-striped" style="width: 100% !important;">
                      <thead>
                        <tr>
                          <th class="">Acc.</th>
                          <th data-toggle="tooltip" data-original-title="Nombres">Nombre</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Descrip.</th>
                          <th data-toggle="tooltip" data-original-title="Caracteristicas">Caract.</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <th class="">Acc.</th>
                          <th data-toggle="tooltip" data-original-title="Nombres">Nombre</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Descrip.</th>
                          <th data-toggle="tooltip" data-original-title="Caracteristicas">Caract.</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
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

      <!-- Modal agregar servicios -->
      <div class="modal fade" id="modal-agregar-servicios">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Agregar:</b> Servicio</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-danger" aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <!-- form start -->
              <form id="form-servicios" name="form-servicios" method="POST">
                <div class="card-body">
                  <div class="row" id="cargando-1-fomulario">
                    <!--  idservicio -->
                    <input type="hidden" name="idservicio" id="idservicio" />

                   <!-- Sub total -->
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label for="Nombre">Nombre  <sup class="text-danger">*</sup></label>
                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre"/>
                      </div>
                    </div>
                    <!-- Sub total -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="precio">Precio  <sup class="text-danger">*</sup></label>
                        <input class="form-control" type="number" id="precio" name="precio" placeholder="Precio"/>
                      </div>
                    </div>
                    <!--Descripcion-->
                    <div class="col-lg-12 class_pading">
                      <div class="form-group">
                        <label for="descripcion_pago">Descripción <sup class="text-danger">*</sup></label> <br />
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="2"></textarea>
                      </div>
                    </div>
                    <!-- Form Group Características -->
                    <div class="col-lg-12 col-sm-12">
                      <label class="col-sm-3 col-form-label input-label">Características</label>
                      <div class="form-group">
                        <!-- Quill -->
                        <div class="quill-custom">
                          <div
                            class="js-quill"
                            style="min-height: 15rem;"
                            data-hs-quill-options='{
                              "placeholder": "Describa las Características...",
                                "modules": {
                                  "toolbar": [
                                    ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                  ]
                                }
                              }'
                          >
                          <i class="fas fa-spinner fa-pulse fa-1x"></i>
                          </div>
                        </div>
                        <!-- End Quill -->
                        <textarea class="d-none" name="caracteristicas" id="caracteristicas" cols="30" rows="10"></textarea>
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
                          <button type="button" class="btn btn-info btn-block btn-xs" onclick="re_visualizacion(1, 'servicios', 'imagen_perfil');"><i class="fas fa-redo"></i> Recargar.</button>
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
                              <li> <b>Tamaño:</b>  500x500 </li>
                              <li> <b>Formato:</b> <span> .png</span>  </li>
                              <li>  <b>Peso:</b> Max. 2 mb </li>
                            </ul>
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
                <button type="submit" style="display: none;" id="submit-form-servicios">Submit</button>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" onclick="limpiar();">Close</button>
              <button type="submit" class="btn btn-success btn-xs" id="guardar_registro">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal ver caracteristicas -->
      <div class="modal fade" id="modal-ver-caracteristicas">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Caracteristicas: 
                 <b class="nombre_s text-warning" ><i class="fas fa-spinner fa-pulse fa-1x" style="color: #768494;"></i></b>
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-danger" aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="listar_caracteristicas">
                <p><i class="fas fa-spinner fa-pulse fa-1x"></i> Cargando ...</p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Modal ver imagen -->
      <div class="modal fade" id="modal-ver-imagen" tabindex="-1" role="dialog" aria-hidden="true" style="background-color: #00000063;">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">

          <div class="modal-header">
              <h4 class="modal-title"><b>Servicio: </b> <span class="text-warning" id="nombre_servicio"></span>  </h4>
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

      <?php
            }else{
              require 'noacceso.php';
            }
            require 'footer.php';
          ?>
    </main>
    <!-- ========== END MAIN ========== -->

    <!-- Go to Top -->
    <a
      class="js-go-to go-to position-fixed"
      href="javascript:;"
      style="visibility: hidden;"
      data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": 15
         },
         "show": {
           "bottom": 15
         },
         "hide": {
           "bottom": -15
         }
       }
     }'
    >
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

        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        var quill = $.HSCore.components.HSQuill.init(".js-quill");
        $(".js-quill .ql-editor").addClass('clss_caracteristicas'); 
        // INITIALIZATION OF GO TO
        // =======================================================
        $(".js-go-to").each(function () {
          var goTo = new HSGoTo($(this)).init();
        });
      });
    </script>
<style>
  .textarea_datatable {
    width: 100%;
    background: rgb(215 224 225 / 22%);
    border-block-color: inherit;
    border-bottom: aliceblue;
    border-left: aliceblue;
    border-right: aliceblue;
    border-top: hidden;
  }
  .avatar-img-modif {
    max-width: 70%;
    height: 70%;
    object-fit: cover;
  }
</style>
    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
    </script>
    <!-- JS script -->
    <script src="scripts/servicio.js"></script>
  </body>

  <!-- Mirrored from htmlstream.com/front/account-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:19:48 GMT -->
</html>
<?php    
  }
  ob_end_flush();
?>
