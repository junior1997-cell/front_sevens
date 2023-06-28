<!DOCTYPE html>
<html lang="es">
  <!-- Mirrored from htmlstream.com/front/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:15:43 GMT -->
  <head>
    <!-- Title -->
    <title>Nuestras Obras | Seven's Ingenieros</title>
    

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php require 'head.php'; ?>
  </head>

  <body>
    <span class="name_page" style="display: none;" >Nuestras Obras</span>
    <!-- ========== HEADER ========== -->
    <?php require 'header1.php'; ?>
    <!-- ========== END HEADER ========== -->
    <br> <br> <br><br> <br>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">

      <!-- Hero Section -->
      <div class="position-relative border-bottom">
        <!-- Hero Carousel Main -->
        <div id="heroNav" class="js-slick-carousel slick slick-equal-height"
            data-hs-slick-carousel-options='{
              "prevArrow": "<span class=\"fas fa-arrow-left d-none d-md-inline-block slick-arrow slick-arrow-soft-white slick-arrow-left slick-arrow-centered-y rounded-circle ml-sm-2 ml-xl-4\"></span>",
              "nextArrow": "<span class=\"fas fa-arrow-right d-none d-md-inline-block slick-arrow slick-arrow-soft-white slick-arrow-right slick-arrow-centered-y rounded-circle mr-sm-2 mr-xl-4\"></span>",
              "infinite": true,
              "autoplay": true,
              "autoplaySpeed": 10000,
              "adaptiveHeight": true,
              "counterSelector": "#slickCounter",
              "counterDivider": "/",
              "rows": 0,
              "counterClassMap": {
                "current": "slick-counter-current",
                "total": "slick-counter-total",
                "divider": "slick-counter-divider"
              },
              "dots": true,
              "dotsClass": "slick-pagination slick-pagination-white d-md-none container position-absolute bottom-0 right-0 left-0 justify-content-start mb-6 pl-3 mx-auto",
              "asNavFor": "#heroNavThumb"
            }'>
          <div class="js-slide gradient-y-overlay-sm-gray-900 bg-img-hero" style="background-image: url(assets/img/nuestras_obras/img_slide1.jpg);">
            <!-- Slide #1 -->
            <div class="container d-md-flex align-items-md-center vh-md-70 space-top-4 space-bottom-3 space-md-0">
              <div class="w-80 w-lg-50">
                <span class="d-block h3 text-white mb-2"
                  data-hs-slick-carousel-animation="fadeInUp">
                  La empresa
                </span>
                <h1 class="text-white display-4 mb-0"
                    data-hs-slick-carousel-animation="fadeInUp"
                    data-hs-slick-carousel-animation-delay="200">
                  Sevens Ingenieros S.A.C 
                </h1>
              </div>
            </div>
            <!-- End Slide #1 -->
          </div>

          <div class="js-slide gradient-y-overlay-sm-gray-900 bg-img-hero" style="background-image: url(assets/img/nuestras_obras/img_slide4.jpg);">
            <!-- Slide #2 -->
            <div class="container d-md-flex align-items-md-center vh-md-70 space-top-4 space-bottom-3 space-md-0">
              <div class="w-80 w-lg-50">
                <span class="d-block h3 text-white mb-2"
                      data-hs-slick-carousel-animation="fadeInUp">
                  Se
                </span>
                <h2 class="text-white display-4 mb-0"
                    data-hs-slick-carousel-animation="fadeInUp"
                    data-hs-slick-carousel-animation-delay="200">
                    compromete a realizar 
                </h2>
              </div>
            </div>
            <!-- End Slide #2 -->
          </div>
          <div class="js-slide gradient-y-overlay-sm-gray-900 bg-img-hero" style="background-image: url(assets/img/nuestras_obras/img_slide21.jpg);">
            <!-- Slide #2 -->
            <div class="container d-md-flex align-items-md-center vh-md-70 space-top-4 space-bottom-3 space-md-0">
              <div class="w-80 w-lg-50">
                <span class="d-block h3 text-white mb-2"
                      data-hs-slick-carousel-animation="fadeInUp">
                    Tus
                </span>
                <h2 class="text-white display-4 mb-0"
                    data-hs-slick-carousel-animation="fadeInUp"
                    data-hs-slick-carousel-animation-delay="200">
                    sueños en construcción
                </h2>
              </div>
            </div>
            <!-- End Slide #2 -->
          </div>
        </div>
        <!-- End Hero Carousel Main -->

        <!-- Slick Paging -->
        <div class="container position-relative">
          <div id="slickCounter" class="slick-counter"></div>
        </div>
        <!-- End Slick Paging -->

        <!-- Hero Carousel Secondary -->
        <div id="heroNavThumb" class="js-slick-carousel slick" data-hs-slick-carousel-options='{
              "infinite": true,
              "autoplay": true,
              "autoplaySpeed": 10000,
              "isThumbs": true,
              "asNavFor": "#heroNav"
            }'>
        </div>
        <!-- End Hero Carousel Secondary -->
      </div>
      <!-- End Hero Section -->

      <!-- Listing Section -->
      <div class="container space-2 space-top-lg-4 space-bottom-lg-3" style="padding-top: 4rem !important;">
        <!-- Title -->
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-7">
          <h2>En la Empresa Sevens Ingenieros S.A.C </h2>
          <p>Son nuestros proyectos finalizados <a class="font-weight-bold" href="#">los que nos respaldan.</a></p>
        </div>
        <!-- End Title -->

        <!-- Listing -->
        <div class="text-center cargando_obras"> <p><i class="fas fa-spinner fa-pulse fa-sm fa-1x"></i> Cargando ...</p> </div>
        <div class="row mb-4" id="l_obras">
       <!-- listamos las obras -->
        </div>
        <!-- End Listing -->
      </div>
      <!-- End Listing Section -->

      <!-- Testimonials Section -->
      <div class="overflow-hidden gradient-x-three-sm-primary rounded-lg mx-md-10">
        <div class="container space-2 space-lg-3">
          <div class="row justify-content-center align-items-lg-center">
            <div class="col-10 col-sm-8 col-lg-5 mb-11 mb-lg-0">
              <div class="position-relative">
                <img class="img-fluid rounded-lg" src="assets/img/servicios/img55.jpg" alt="Image Description" />

                <!-- SVG Elements -->
                <figure class="max-w-15rem w-100 position-absolute top-0 left-0 z-index-n1">
                  <div class="mt-n6 ml-n5">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 335.2 335.2" width="100" height="100">
                      <circle fill="#FFC107" opacity=".7" cx="167.6" cy="167.6" r="130.1" />
                    </svg>
                  </div>
                </figure>

                <figure class="max-w-15rem w-100 position-absolute bottom-0 right-0 z-index-n1">
                  <div class="mb-n6 ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 335.2 335.2" width="120" height="120">
                      <circle fill="none" stroke="#377DFF" stroke-width="75" cx="167.6" cy="167.6" r="130.1" />
                    </svg>
                  </div>
                </figure>
                <!-- End SVG Elements -->
              </div>
            </div>

            <div class="col-lg-7">
              <div class="pl-lg-6">
                <img class="avatar mb-3" src="admin/assets/svg/brands/capsule.svg" alt="Image Description" />

                <blockquote class="h2 mb-5">Contamos el mejor equipo profesional y obrero, esto nos da la certeza de que todo lo que realicemos sea de calidad.</blockquote>

                <div class="mb-5">
                  <h5 class="mb-0">POOL STIWART BRIONES SÁNCHEZ</h5>
                  <small class="d-block">CEO - Director Ejecutivo</small>
                </div>
                <!-- End Row -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Testimonials Section -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <?php require 'footer.php'; ?>
    <!-- ========== END FOOTER ========== -->
    <!-- modal detalle obras -->
    <div class="modal fade" id="ver_detalles_secc_onbras" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <!-- Header -->
          <div class="modal-close">
            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
              <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
              </svg>
            </button>
          </div>
          <!-- End Header -->

          <!-- Body -->
          <div class="modal-body p-sm-5 text-center">
            <div id="signinModalForm">
              <div class="text-center mb-5"> <br> <h4 class="nombre_obras_secc_onbras"></h4> </div>
              
              <div class="detalles_obras_secc_onbras">
                <p><i class="fas fa-spinner fa-pulse fa-sm fa-1x"></i> Cargando ...</p> 
              </div>
            </div>
          </div>
          <!-- End Body -->

          <!-- Footer -->
          <div class="modal-footer d-block text-center py-sm-5"> </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
    <!-- modal detalle obras -->
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
        var megaMenu = new HSMegaMenu($('.js-mega-menu')).init();

        // INITIALIZATION OF SLICK CAROUSEL
        // =======================================================
        $(".js-slick-carousel").each(function () {
          var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
        });

        // INITIALIZATION OF UNFOLD
        // =======================================================
        var unfold = new HSUnfold(".js-hs-unfold-invoker").init();

        // INITIALIZATION OF TEXT ANIMATION (TYPING)
        // =======================================================
        var typed = $.HSCore.components.HSTyped.init(".js-text-animation");

        // INITIALIZATION OF GO TO
        // =======================================================
        $(".js-go-to").each(function () {
          var goTo = new HSGoTo($(this)).init();
        });
      });
    </script>

    <!-- IE Support -->
    <script src="scripts_web/obras.js"></script>
    <script src="scripts_web/footer.js"></script>
    <script src="admin/vistas/scripts/contador.js"></script> 
    
  </body>

  <!-- Mirrored from htmlstream.com/front/demo-jobs/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:21:54 GMT -->
</html>
