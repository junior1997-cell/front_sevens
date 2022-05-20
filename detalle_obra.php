<!DOCTYPE html>
<html lang="es">

  <!-- Mirrored from htmlstream.com/front/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:15:43 GMT -->
  <head>
    <!-- Title -->
    <title>Home | Seven's Ingenieros</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php require 'head.php'; ?>
  </head>

  <body>
    <!-- ========== HEADER ========== -->
    <?php require 'header.php'; ?>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Description Section -->
    <div class="container space-top-3 space-top-lg-4 space-bottom-2">
      <div class="row">
        <div class="col-lg-7 mb-7 mb-lg-0">
          <!-- Cubeportfolio -->
          <div class="cbp"
               data-hs-cbp-options='{
                 "gapHorizontal": 32,
                 "gapVertical": 32,
                 "mediaQueries": [
                   {"width": 480, "cols": 2},
                   {"width": 300, "cols": 1}
                 ]
               }' id="l_galeria">
            <!-- Item -->
            <!-- End Item -->

          </div>
          <!-- End Cubeportfolio -->
        </div>

        <div id="stickyBlockStartPoint" class=" cbp col-lg-5 detalles_x_obra">
          <!-- Sticky Block -->
          <!-- End Sticky Block -->
        </div>

      </div>
    </div>
    <!-- End Description Section -->
    <!-- CTA Section -->
    <div class="container space-top-2 space-top-lg-3">
      <div class="w-lg-85 mx-lg-auto">
        <div class="card bg-primary text-white overflow-hidden p-4">
          <div class="row justify-content-md-start align-items-md-center text-center text-md-left">
            <div class="col-md-6 offset-md-3 mb-3 mb-md-0">
              <h3 class="text-white mb-1">Deseas ver más fotos?</h3>
              <p class="text-white-70 mb-0">Si tu respuesta es si, click en el botón 
              <span class="badge ml-1" style="background-color: #f7faff; color: #000;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver más</font></font></span>
               </p> 

            </div>
            <div class="col-md-3 text-md-right">
              <a class="btn btn-light transition-3d-hover" onclick="all_images()" >Ver más <i class="fas fa-angle-double-down"></i> </a>
            </div>
          </div>

          <!-- SVG Component -->
          <figure class="w-25 d-none d-md-block content-centered-y ml-n4">
            <img class="img-fluid" src="assets/svg/illustrations/communication.svg" alt="Image Description">
          </figure>
          <!-- End SVG Component -->
        </div>
      </div>
    </div>
    <!-- End CTA Section -->

    <!-- Sticky Block End Point -->
    <div id="stickyBlockEndPoint"></div>

    <hr class="my-0 m-4">

    <!-- Portfolio Section -->
    <div class="container space-2 space-lg-3 all_content_mages" style="display: none;">

      <div class="cbp"
           data-hs-cbp-options='{
             "animationType": "fadeOut",
             "caption": "zoom",
             "gapHorizontal": 40,
             "gapVertical": 40,
             "mediaQueries": [
               {"width": 1500, "cols": 3},
               {"width": 1100, "cols": 3},
               {"width": 800, "cols": 3},
               {"width": 480, "cols": 2},
               {"width": 380, "cols": 1}
             ]
           }' id="all_mages">

            <!-- mostramos todas las imagenes -->

      </div>
    </div>
    <!-- End Portfolio Section -->

  </main>
  <!-- ========== END MAIN ========== -->

  <!-- ========== FOOTER ========== -->
  <?php require 'footer.php'; ?>

    <!-- modal detalle obras -->
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
    <!-- modal detalle obras -->

  <style>
    .wrapper-diamond-us .content-diamond-us:first-child .diamond-us {
        background-image: url(assets/img/imgs_slide/calidad.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        
    }
    .wrapper-diamond-us .content-diamond-us .diamond-us {
        width: 21em;
        height: 21em;
        -webkit-clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
    }
    @media (min-width: 1200px) and (max-width: 1400px){
      .wrapper-diamond-us .content-diamond-us .diamond-us {
          width: 33em;
          height: 33em;
      }
    }
    .p-internas {
        color: #8b8888;
        margin-bottom: 1.15rem;
        font-size: 0.95em;
        text-align: justify;
      }
      .titles-big {
          font-family: "Conv_Gotham-Black";
          text-transform: uppercase;
          color: #6c6c6c;
          font-size: 1.6em;
      }
      .title-orange-clear {
          color: #f39100;
      }
      .pt-pb{
        padding-top: 3rem !important;
        padding-bottom: 4rem !important;
      }
    .btn_bacg-warning{
        background-color: #f39100;
        color: white;
      }
    .btn_bacg-warning:hover {
      color: #000000;
      text-decoration: none;
    }
  
  </style>
    <!-- ========== SCRIPT ========== -->
    <?php require 'script.php'; ?>

  <!-- Go to Top -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
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
     }'>
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- End Go to Top -->

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF HEADER
      // =======================================================
      var header = new HSHeader($('#header')).init();

      // INITIALIZATION OF UNFOLD
      // =======================================================
      var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


      // INITIALIZATION OF SHOW ANIMATIONS
      // =======================================================
      $('.js-animation-link').each(function () {
        var showAnimation = new HSShowAnimation($(this)).init();
      });


      // INITIALIZATION OF FORM VALIDATION
      // =======================================================
      $('.js-validate').each(function() {
        $.HSCore.components.HSValidation.init($(this), {
          rules: {
            confirmPassword: {
              equalTo: '#signupPassword'
            }
          }
        });
      });

      // INITIALIZATION OF GO TO
      // =======================================================
      $('.js-go-to').each(function () {
        var goTo = new HSGoTo($(this)).init();
      });
    });
  </script>

  <!-- IE Support -->
    <script src="admin/vistas/scripts/funcion_crud.js"></script>    
    <script src="scripts_web/detalle_obra.js"></script>    
    <script src="scripts_web/footer.js"></script>
</body>

<!-- Mirrored from htmlstream.com/front/portfolio-single-page-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:20:40 GMT -->
</html>