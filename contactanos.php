<!DOCTYPE html>
<html lang="es">

  <!-- Mirrored from htmlstream.com/front/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:15:43 GMT -->
  <head>
    <!-- Title -->
    <title>Contactos | Seven's Ingenieros</title>    

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php require 'head.php'; ?>
  </head>

  <body>
    <span class="name_page" style="display: none;" >Contactos</span>
    <!-- ========== HEADER ========== -->
    <?php require 'header.php'; ?>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
      <!-- Hero Section -->
      <div class="container position-relative z-index-4 space-top-2 space-top-md-4 space-top-lg-3">
        <div class="row justify-content-lg-between align-items-lg-center">
          <div class="col-md-10 col-lg-5 mb-9 mb-lg-0">
            <div class="mb-7">
              <h1 class="display-4 mb-4 padingtop">Contacto</h1>
              <p class="lead">¿Qué servicio necesita? Queremos ayudarle.</p>
            </div>

            <img class="img-fluid" src="assets/img/contacto/contactenos1.jpg" alt="Image Description" style="border-radius:15px;">
          </div>

          <div class="col-lg-6">
            <!-- Form -->
            <form class="js-validate card">
              <div class="card-header bg-light text-center py-4 px-5 px-md-6">
                <h2 class="h4 mb-0">Déjanos un mensaje <span class="text-body font-size-1 font-weight-bold">Nos pondremos en contacto contigo</span></h2>
              </div>

              <div class="card-body p-4 p-md-6">
                <div class="row">
                  <div class="col-sm-6 mb-3">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="nombre" class="input-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" aria-label="Nataly" required
                            data-msg="Ingresar nombre">
                    </div>
                    <!-- End Form Group -->
                  </div>

                  <div class="col-sm-6 mb-3">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="apellido" class="input-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" aria-label="Gaga" required
                            data-msg="Ingresar apellido">
                    </div>
                    <!-- End Form Group -->
                  </div>

                  <div class="col-sm-12 mb-3">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="emai" class="input-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@gmail.com" aria-label="alex@pixeel.com" required
                            data-msg="Ingresar Email">
                    </div>
                    <!-- End Form Group -->
                  </div>
                  <div class="col-sm-12 mb-3">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                      <label for="password" class="input-label">Descripción</label>
                      <textarea type="text" class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" 
                      required data-msg="Ingresar descripción"></textarea>
                      
                    </div>
                    <!-- End Form Group -->
                  </div>
                </div>

                <button type="submit" class="btn btn-block btn-primary transition-3d-hover">
                  Enviar
                  <i class="fas fa-angle-right fa-sm ml-1"></i>
                </button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
      <!-- End Hero Section -->

      <!-- Icon Blocks Section -->
      <div id="aboutSection" class="container space-2 space-lg-3" style="padding-bottom: 3rem !important;">

        <div class="row">
          <div class="col-md-4 mb-7">
            <!-- Icon Blocks -->
            <div class="text-center px-lg-3">
              <figure class="max-w-8rem mx-auto mb-4">
                <img class="img-fluid" src="assets/svg/logos/icon-01.png" alt="SVG">
              </figure>
              <h3>CALIDAD</h3>
              <p style="text-align: justify;">La empresa admin seven´s cuenta con un Departamento de Calidad, 
                  el que se ocupa de prevenir las fallas en los procesos constructivos.</p>
            </div>
            <!-- End Icon Blocks -->
          </div>

          <div class="col-md-4 mb-7">
            <!-- Icon Blocks -->
            <div class="text-center px-lg-3">
              <figure class="max-w-8rem mx-auto mb-4">
                <img class="img-fluid" src="assets/svg/logos/icon-02.png" alt="SVG">
              </figure>
              <h3>DISEÑO</h3>
              <p style="text-align: justify;">Implementamos mejoras en el diseño constructivo y en la búsqueda 
                        de nuevos materiales orientados a las necesidades del cliente.</p>
            </div>
            <!-- End Icon Blocks -->
          </div>

          <div class="col-md-4 mb-7">
            <!-- Icon Blocks -->
            <div class="text-center px-lg-3">
              <figure class="max-w-8rem mx-auto mb-4">
                <img class="img-fluid" src="assets/svg/logos/icon-03.png" alt="SVG">
              </figure>
              <h3>OBRAS</h3>
              <p style="text-align: justify;">En la empresa admin seven´s cada obra cuenta con profesionales 
                        calificados (Autocontrol) y sistemas de control calidad estandarizados.</p>
            </div>
            <!-- End Icon Blocks -->
          </div>
        </div>

        <img class="img-fluid d-none d-md-block w-75 mx-auto mb-7" src="assets/svg/components/three-pointers.svg" alt="SVG Arrow">

        <!-- Title -->
        <div class="w-md-60 w-lg-50 text-center mx-auto mb-7">
          <p class="text-dark"><span class="font-weight-bold">Nuestras</span>  obras se ven reflejadas en</p>
        </div>
        <!-- End Title -->
      </div>
      <!-- End Icon Blocks Section -->

      <!-- Map Section -->
      <div id="contactsSection" class="position-relative mx-3 mx-md-8 mapa">
        <div class="text-center"> <p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p> </div>
      </div>
      <!-- End Map Section -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- ========== FOOTER ========== -->
    <?php require 'footer.php'; ?>

    <!-- ========== END FOOTER ========== -->

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

    <!-- ========== SCRIPT ========== -->
    <?php require 'script.php'; ?>

    <!-- JS Plugins Init. -->
    <script>
      $(document).on('ready', function () {
        // INITIALIZATION OF HEADER
        // =======================================================
        var header = new HSHeader($('#header')).init();

        // INITIALIZATION OF MEGA MENU
        // =======================================================
        var megaMenu = new HSMegaMenu($('.js-mega-menu')).init();

        // INITIALIZATION OF UNFOLD
        // =======================================================
        var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


        // INITIALIZATION OF UNFOLD
        // =======================================================
        $('.js-hs-search-unfold-invoker').each(function() {
          var searchUnfold = new HSUnfold($(this), {
            afterOpen: function() {
              $('#searchSlideDownControl').focus();
            }
          }).init();
        });


        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
          var validation = $.HSCore.components.HSValidation.init($(this));
        });


        // INITIALIZATION OF SCROLL NAV
        // =======================================================
        var isClosed = false;

        $('.js-scroll-nav').each(function () {
          var scrollNav = new HSScrollNav($(this), {
            beforeShow: function () {
              if (window.innerWidth < 768) {
                $('#navBar').collapse('hide').on('hidden.bs.collapse', function () {
                  isClosed = true;
                });
              } else {
                isClosed = true;
              }

              return isClosed;
            },
            afterShow: function () {
              isClosed = false;
            }
          }).init();
        });


        // INITIALIZATION OF AOS
        // =======================================================
        AOS.init({
          duration: 650,
          once: true
        });


        // INITIALIZATION OF GO TO
        // =======================================================
        $('.js-go-to').each(function () {
          var goTo = new HSGoTo($(this)).init();
        });
      });
    </script>

    <!-- IE Support -->
  
    <script src="scripts_web/contactanos.js"></script>
    <script src="scripts_web/footer.js"></script>
    <script src="admin/vistas/scripts/contador.js"></script> 
    <script>
      if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
    </script>
  </body>

  <!-- Mirrored from htmlstream.com/front/landing-onepage-corporate.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:18:20 GMT -->
</html>