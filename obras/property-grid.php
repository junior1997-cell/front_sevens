<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlstream.com/front/demo-real-estate/property-grid.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:23:37 GMT -->
<head>
  <!-- Title -->
  <title>Property Grid - Landing House | Front - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php $title = "Nuestras Obras"; require 'head.php'; ?>
</head>
<body>
  <!-- ========== HEADER ========== -->
  <?php  require 'header2.php'; ?>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Filters Section -->
    <div class="container py-3">
      <div class="row mx-n1">
        <div class="col-lg mb-2 mb-lg-0">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter font-size-1 mb-0">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
            </ol>
          </nav>
          <!-- End Breadcrumb -->
        </div>

        <div class="col-lg-auto">
          <span>Comparte</span>
          <a class="btn btn-sm btn-ghost-secondary px-2 py-1" href="javascript:;"><i class="fab fa-facebook-square fa-2x text-primary"></i></a>
          <a class="btn btn-sm btn-ghost-secondary px-2 py-1" href="javascript:;"><i class="fab fa-twitter-square fa-2x text-primary"></i></a>
        </div>

      </div>
    </div>
    <!-- End Filters Section -->

    <!-- Title Section -->
    <div class="container">
      <div class="row align-items-center">

        <div class="col-sm mb-3 mb-sm-0">
          <span class="font-size-1">147 total</span>
          <h1 class="h2 mb-0">Lista de Proyectos</h1>
        </div>

        <div class="col-auto px-1 mb-2 mb-lg-0">
          <!-- Unfold -->
          <div class="hs-unfold">
            <a class="js-hs-unfold-invoker btn btn-block btn-sm btn-white dropdown-toggle" href="javascript:;"
               data-hs-unfold-options='{
                "target": "#bedsFilterDropdown",
                "type": "css-animation",
                "animationIn": "slideInUp"
               }'>Diseño
            </a>

            <div id="bedsFilterDropdown" class="hs-unfold-content dropdown-menu dropdown-menu-sm-right dropdown-card" style="max-width: 25rem;">
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <!-- Button Group -->
                  <div class="btn-group btn-group-toggle btn-group-segment d-flex" data-toggle="buttons">
                    <a class="btn btn-sm flex-fill" href="property-list.php">
                      <input type="radio" name="options" id="optionStudio" > Lista
                    </a>
                    <a class="btn btn-sm flex-fill active" href="property-grid.php" >
                      <input type="radio" name="options" id="option1" checked> Cuadricula
                    </a>                    
                  </div>
                  <!-- End Button Group -->
                </div>
              </div>
              <!-- End Card -->
            </div>
          </div>
          <!-- End Unfold -->
        </div>

        <div class="col-sm-auto">
          <!-- Select -->
          <div id="sortBySelect" class="select2-custom select2-custom-sm-right">
            <select class="js-custom-select custom-select-sm" style="opacity: 0;"
                    data-hs-select2-options='{
                      "dropdownParent": "#sortBySelect",
                      "minimumResultsForSearch": "Infinity",
                      "customClass": "custom-select custom-select-sm",
                      "dropdownAutoWidth": true,
                      "dropdownWidth": "12rem"
                    }'>
              <option value="HighestPrice">2019</option>
              <option value="LowestPrice">2020</option>
              <option value="mostReduced">2021</option>
              <option value="mostPopular"selected>2022</option>
            </select>
          </div>
          <!-- End Select -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Title Section -->

    <!-- List of Properties Section -->
    <div class="container space-1 space-bottom-2 space-bottom-lg-3">
      <div class="row">
        <div class="col-sm-6 col-lg-4 mb-5">
          <!-- Property Item -->
          <a id="fancyboxGallery1" class="js-fancybox card card-no-gutters h-100" href="property-description.php"
             data-hs-fancybox-options='{ "selector": "#fancyboxGallery1 .js-fancybox-item" }'>
            <!-- Gallery -->
            <div class="js-fancybox-item media-viewer" data-src="pry/pry_1_1.jpeg" data-caption="Mision Nor Oriental - image #01">
              <img class="img-fluid rounded-lg" src="img1.jpeg" alt="imagen">

              <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
                <span class="btn btn-xs btn-icon btn-light"><i class="fas fa-images"></i></span>
              </div>
            </div>

            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_1_2.jpeg" data-caption="Mision Nor Oriental - image #02">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_1_3.jpeg" data-caption="Mision Nor Oriental - image #03">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_1_4.jpeg" data-caption="Mision Nor Oriental - image #04">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_1_5.jpeg" data-caption="Mision Nor Oriental - image #05">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_1_6.jpeg" data-caption="Mision Nor Oriental - image #06">
            <!-- End Gallery -->

            <!-- Body -->
            <div class="card-body">
              <!-- <span class="d-block font-size-1 text-body">For sale</span> -->
              <span class="badge badge-soft-info mr-2 "> <span class="legend-indicator bg-info"></span>En ejecución </span>

              <div class="row align-items-center">
                <div class="col"><h4 class="text-hover-primary">Sede Mision Nor Oriental.</h4></div>
                <div class="col-auto"><h3 class="text-primary"><i class="fas fa-eye text-info"></i></h3></div>
              </div>

              <ul class="list-inline list-separator font-size-1 text-body">
                <li class="list-inline-item"> <i class="far fa-calendar-check"></i> 15-03-2022 / 15-09-2022 </li>
                <li class="list-inline-item"> <i class="fas fa-map-marker-alt"></i> Tarapoto </li>
              </ul>
            </div>
            <!-- End Body -->
          </a>
          <!-- End Property Item -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-5">
          <!-- Property Item -->
          <a id="fancyboxGallery2" class="js-fancybox card card-no-gutters h-100" href="property-description.php"
             data-hs-fancybox-options='{ "selector": "#fancyboxGallery2 .js-fancybox-item" }'>
            <!-- Gallery -->
            <div class="js-fancybox-item media-viewer" data-src="pry/pry_2_1.jpeg" data-caption="Front in frames - image #01">
              <img class="img-fluid rounded-lg" src="img2.jpeg" alt="imagen">

              <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
                <span class="btn btn-xs btn-icon btn-light"><i class="fas fa-images"></i></span>
              </div>
            </div>

            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_2_2.jpeg" data-caption="Cerco perimetrico - image #02">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_2_3.jpeg" data-caption="Cerco perimetrico - image #03">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_2_4.jpeg" data-caption="Cerco perimetrico - image #04">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_2_5.jpeg" data-caption="Cerco perimetrico - image #05">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_2_6.jpeg" data-caption="Cerco perimetrico - image #06">
            
            <!-- End Gallery -->

            <!-- Body -->
            <div class="card-body">
              <!-- <span class="d-block font-size-1 text-body">For sale</span> -->
              <span class="badge badge-soft-danger mr-2 "><span class="legend-indicator bg-danger"></span>Culminada</span>

              <div class="row align-items-center">
                <div class="col"><h4 class="text-hover-primary">Cerco perimetrico etapa 2</h4></div>
                <div class="col-auto"><h3 class="text-primary"><i class="fas fa-eye text-info"></i></h3></div>
              </div>

              <ul class="list-inline list-separator font-size-1 text-body">
                <li class="list-inline-item"> <i class="far fa-calendar-check"></i> 31-01-2022 / 07-03-2022 </li>
                <li class="list-inline-item"> <i class="fas fa-map-marker-alt"></i> Lima - Naña </li>
              </ul>
            </div>
            <!-- End Body -->
          </a>
          <!-- End Property Item -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-5">
          <!-- Property Item -->
          <a id="fancyboxGallery3" class="js-fancybox card card-no-gutters h-100" href="property-description.php"
             data-hs-fancybox-options='{"selector": "#fancyboxGallery3 .js-fancybox-item" }'>
            <!-- Gallery -->
            <div class="js-fancybox-item media-viewer" data-src="pry/pry_3_1.jpeg" data-caption="Front in frames - image #01">
              <img class="img-fluid rounded-lg" src="img3.jpeg" alt="imagen">

              <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
                <span class="btn btn-xs btn-icon btn-light"><i class="fas fa-images"></i></span>
              </div>
            </div>
            
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_3_2.jpeg" data-caption="Escaleras en pabellón - image #02">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_3_3.jpeg" data-caption="Escaleras en pabellón - image #03">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_3_4.jpeg" data-caption="Escaleras en pabellón - image #04">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_3_5.jpeg" data-caption="Escaleras en pabellón - image #05">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="pry/pry_3_6.jpeg" data-caption="Escaleras en pabellón - image #06">
            
            <!-- End Gallery -->

            <!-- Body -->
            <div class="card-body">
              <!-- <span class="d-block font-size-1 text-body">For sale</span> -->
              <span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-danger"></span>Culminada </span>

              <div class="row align-items-center">
                <div class="col"><h4 class="text-hover-primary">Escaleras en pabellón C.</h4></div>
                <div class="col-auto"><h3 class="text-primary"><i class="fas fa-eye text-info"></i></h3></div>
              </div>

              <ul class="list-inline list-separator font-size-1 text-body">
                <li class="list-inline-item"> <i class="far fa-calendar-check"></i> 01-09-2021 / 17-12-2021 </li>
                <li class="list-inline-item"> <i class="fas fa-map-marker-alt"></i> Juliaca </li>
              </ul>
            </div>
            <!-- End Body -->
          </a>
          <!-- End Property Item -->
        </div>        

        <div class="col-sm-6 col-lg-4 mb-5">
          <!-- Property Item -->
          <a id="fancyboxGallery7" class="js-fancybox card card-no-gutters h-100" href="property-description.php"
             data-hs-fancybox-options='{ "selector": "#fancyboxGallery7 .js-fancybox-item" }'>
            <!-- Gallery -->
            <div class="js-fancybox-item media-viewer" data-src="../assets/img/1920x1080/img21.jpg" data-caption="Front in frames - image #01">
              <img class="img-fluid rounded-lg" src="../assets/img/480x320/img30.jpg" alt="imagen">

              <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
                <span class="btn btn-xs btn-icon btn-light"> <i class="fas fa-images"></i> </span>
              </div>
            </div>

            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img20.jpg" data-caption="Front in frames - image #02">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img27.jpg" data-caption="Front in frames - image #03">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img14.jpg" data-caption="Front in frames - image #04">
            <!-- End Gallery -->

            <!-- Body -->
            <div class="card-body">
              <!-- <span class="d-block font-size-1 text-body">For sale</span> -->
              <span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-danger"></span>Culminada </span>

              <div class="row align-items-center">
                <div class="col"><h4 class="text-hover-primary">Otro proyecto</h4></div>
                <div class="col-auto"><h3 class="text-primary"><i class="fas fa-eye text-info"></i></h3></div>
              </div>

              <ul class="list-inline list-separator font-size-1 text-body">
                <li class="list-inline-item"> <i class="far fa-calendar-check"></i> 00-00-0000 / 00-00-0000 </li>
                <li class="list-inline-item"> <i class="fas fa-map-marker-alt"></i> Perú </li>
              </ul>
            </div>
            <!-- End Body -->
          </a>
          <!-- End Property Item -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-5">
          <!-- Property Item -->
          <a id="fancyboxGallery8" class="js-fancybox card card-no-gutters h-100" href="property-description.php"
             data-hs-fancybox-options='{ "selector": "#fancyboxGallery8 .js-fancybox-item" }'>
            <!-- Gallery -->
            <div class="js-fancybox-item media-viewer" data-src="../assets/img/1920x1080/img28.jpg" data-caption="Front in frames - image #01">
              <img class="img-fluid rounded-lg" src="../assets/img/480x320/img31.jpg" alt="imagen">

              <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
                <span class="btn btn-xs btn-icon btn-light"><i class="fas fa-images"></i></span>
              </div>
            </div>

            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img24.jpg" data-caption="Front in frames - image #02">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img13.jpg" data-caption="Front in frames - image #03">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img25.jpg" data-caption="Front in frames - image #04">
            <!-- End Gallery -->

            <!-- Body -->
            <div class="card-body">
              <!-- <span class="d-block font-size-1 text-body">For sale</span> -->
              <span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-danger"></span>Culminada </span>

              <div class="row align-items-center">
                <div class="col"><h4 class="text-hover-primary">Otro proyecto</h4></div>
                <div class="col-auto"><h3 class="text-primary"><i class="fas fa-eye text-info"></i></h3></div>
              </div>

              <ul class="list-inline list-separator font-size-1 text-body">
                <li class="list-inline-item"> <i class="far fa-calendar-check"></i> 00-00-0000 / 00-00-0000 </li>
                <li class="list-inline-item"> <i class="fas fa-map-marker-alt"></i> Perú </li>
              </ul>
            </div>
            <!-- End Body -->
          </a>
          <!-- End Property Item -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-5">
          <!-- Property Item -->
          <a id="fancyboxGallery9" class="js-fancybox card card-no-gutters h-100" href="property-description.php"
             data-hs-fancybox-options='{ "selector": "#fancyboxGallery9 .js-fancybox-item" }'>
            <!-- Gallery -->
            <div class="js-fancybox-item media-viewer" data-src="../assets/img/1920x1080/img15.jpg" data-caption="Front in frames - image #01">
              <img class="img-fluid rounded-lg" src="../assets/img/480x320/img32.jpg" alt="imagen">

              <div class="position-absolute bottom-0 right-0 pb-2 pr-2">
                <span class="btn btn-xs btn-icon btn-light"><i class="fas fa-images"></i></span>
              </div>
            </div>

            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img20.jpg" data-caption="Front in frames - image #02">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img18.jpg" data-caption="Front in frames - image #03">
            <img class="js-fancybox-item d-none" alt="imagen" data-src="../assets/img/1920x1080/img11.jpg" data-caption="Front in frames - image #04">

            <!-- Body -->
            <div class="card-body">
              <!-- <span class="d-block font-size-1 text-body">For sale</span> -->
              <span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-danger"></span>Culminada </span>

              <div class="row align-items-center">
                <div class="col"><h4 class="text-hover-primary">Otro proyecto</h4></div>
                <div class="col-auto"><h3 class="text-primary"><i class="fas fa-eye text-info"></i></h3></div>
              </div>

              <ul class="list-inline list-separator font-size-1 text-body">
                <li class="list-inline-item"> <i class="far fa-calendar-check"></i> 00-00-0000 / 00-00-0000 </li>
                <li class="list-inline-item"> <i class="fas fa-map-marker-alt"></i> Perú </li>
              </ul>
            </div>
            <!-- End Body -->
          </a>
          <!-- End Property Item -->
        </div>
      </div>
      <!-- End Row -->

      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-3">
        <nav aria-label="Page navigation">
          <ul class="pagination mb-0">
            <li class="page-item ml-0">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">9</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>

        <small class="d-none d-sm-inline-block text-body">Pagina 1 de 9</small>
      </div>
      <!-- End Pagination -->
    </div>
    <!-- End List of Properties Section -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  <?php  require 'footer.php'; ?>
  <!-- ========== END FOOTER ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->
  
  <!-- ========== END SECONDARY CONTENTS ========== -->

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


  <!-- JS Implementing Plugins -->
  <script src="../assets/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="../assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INIT FLAGS
      var rangeReady = false

      // INITIALIZATION OF UNFOLD
      // =======================================================
      var unfold = new HSUnfold('.js-hs-unfold-invoker').init();

      new HSUnfold('.js-hs-unfold-invoker-price', {
        afterOpen() {
          if (!rangeReady) {
            // INITIALIZATION OF ION RANGE SLIDER
            // =======================================================
            $('.js-ion-range-slider').each(function () {
              var ionRangeSlider = $.HSCore.components.HSIonRangeSlider.init($(this));
            });

            rangeReady = true
          }
        }
      }).init();


      // INITIALIZATION OF HEADER
      // =======================================================
      var header = new HSHeader($('#header')).init();


      // INITIALIZATION OF MEGA MENU
      // =======================================================
      var megaMenu = new HSMegaMenu($('.js-mega-menu')).init();


      // INITIALIZATION OF CHARTJS
      // =======================================================
      $('.js-chart').each(function () {
        var chart = $.HSCore.components.HSChartJS.init($(this));
      });


      // INITIALIZATION OF SELECT2
      // =======================================================
      $('.js-custom-select').each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
      });


      // INITIALIZATION OF FANCYBOX
      // =======================================================
      $('.js-fancybox').each(function () {
        var fancybox = $.HSCore.components.HSFancyBox.init($(this));
      });


      // INITIALIZATION OF GO TO
      // =======================================================
      $('.js-go-to').each(function () {
        var goTo = new HSGoTo($(this)).init();
      });
    });
  </script>

  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
  </script>
</body>

<!-- Mirrored from htmlstream.com/front/demo-real-estate/property-grid.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:23:41 GMT -->
</html>
