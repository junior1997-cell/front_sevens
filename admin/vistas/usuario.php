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
    <title>Usuarios | Seven's Ingenieros</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php $title = "Datos generales"; require 'head.php'; ?>
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
                <h3 class="card-title">Usuarios </h3>
              </div>

              <!-- Body -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12 text-center cargando">
                    <i class="fas fa-spinner fa-pulse fa-6x"></i><br />
                    <br />
                    <h4>Cargando...</h4>
                  </div>
                  <div class="col-lg-12 tabla" style="display: none;">
                    <!-- tabla -->
                    <table id="tabla-usuarios" class="table table-bordered table-striped display" style="width: 100% !important;">
                      <thead>
                        <tr>
                          <th data-toggle="tooltip" data-original-title="Nombres">Nombre</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Telef.</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Login</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Cargo</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <th data-toggle="tooltip" data-original-title="Nombres">Nombre</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Telef.</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Login</th>
                          <th data-toggle="tooltip" data-original-title="Descripción">Cargo</th>
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
      <!-- Modal ver imagen -->
      <div class="modal fade" id="modal-ver-imagen">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Usuario:</b> <span class="text-warning" id="nombre_usuario"></span>  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-danger" aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12 text-center" id="ver_imagen">

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
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
    max-width: 50%;
    height: 50%;
    object-fit: cover;
  }
</style>
    <!-- IE Support -->
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
    </script>
    <!-- JS script -->
    <script src="scripts/usuario.js"></script>
  </body>

  <!-- Mirrored from htmlstream.com/front/account-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:19:48 GMT -->
</html>
<?php    
  }
  ob_end_flush();
?>
