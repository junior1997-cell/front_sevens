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
        <div class="card text-white overflow-hidden p-4" style="background-color: #ffa037 !important;">
          <div class="row justify-content-md-start align-items-md-center text-center text-md-left">
            <div class="col-md-6 offset-md-3 mb-3 mb-md-0">
              <h3 class="text-white mb-1">Deseas ver más fotos?</h3>
              <p class="text-white-70 mb-0">Si tu respuesta es si, click en el botón 
              <span class="badge ml-1" style="background-color: #f7faff; color: #000;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver más</font></font></span>
               </p> 

            </div>
            <div class="col-md-3 text-md-right">
              <a class="btn btn-light transition-3d-hover all_images" onclick="all_images()" >Ver más   <i class="fas fa-angle-double-down ml-2"></i> </a>
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
      <!-- Products & Filters Section -->
      <div class="container space-top-1 space-top-md-2 space-bottom-2 space-bottom-lg-3 all_content_mages" style="display: none;" >
        <div class="row">
          <div class="col-lg-12">
            <!-- Sorting -->
            <div class="row align-items-center mb-5">
              <div class="col-sm mb-3 mb-sm-0">
                <span class="font-size-1 ml-1" id="total_img"></span>
              </div>

              <div class="col-sm-auto">
                <div class="d-flex justify-content-sm-end align-items-center">
                  <!-- Select -->
                  <div class="mr-2">
                    <label for="fase_select" class="cargando_select"></label> 
                    <select class="js-custom-select custom-select-sm" size="1" style="opacity: 0;"
                          data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm",
                            "dropdownAutoWidth": true,
                            "width": "auto"
                          }' id="selec_fase" onchange="all_images()" >
                    </select>
                  </div>
                  <!-- End Select -->

                  <!-- Nav -->
                  <ul class="nav nav-segment">
                    <li class="list-inline-item">
                      <a class="nav-link active" > 
                      <!-- href="shop-products-grid.html" -->
                        <i class="fas fa-th-large"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a class="nav-link" >
                      <!-- href="shop-products-list.html" -->
                        <i class="fas fa-list"></i>
                      </a>
                    </li>
                  </ul>
                  <!-- End Nav -->
                </div>
              </div>
            </div>
            <!-- End Sorting -->
            <div class="cargando_spinner" ></div>
            <!-- Products -->
            <div class="row mx-n2 mb-5 " id="all_mages">
              <!-- aqui mostramos todas las imagenes -->
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-between align-items-center">
                <li class="page-item ml-0">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo; Prev</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item">
                  <div class="d-flex align-items-center">
                    <span class="d-none d-sm-inline-block text-body">Page:</span>
                    <select class="custom-select custom-select-sm w-auto mx-2">
                      <option value="quantity1">1</option>
                      <option value="quantity2">2</option>
                      <option value="quantity3">3</option>
                      <option value="quantity4">4</option>
                      <option value="quantity5">5</option>
                      <option value="quantity6">6</option>
                      <option value="quantity7">7</option>
                      <option value="quantity8">8</option>
                    </select>
                    <span class="d-none d-sm-inline-block text-body">of 8</span>
                  </div>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">Next &raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- End Pagination -->

            <!-- Divider -->
            <div class="d-lg-none">
              <hr class="my-7 my-sm-11">
            </div>
            <!-- End Divider -->
          </div>

          <!-- Filters -->
          <div class="col-lg-3 d-none" >
            <form>
              <div class="border-bottom pb-4 mb-4">
                <h4>Price</h4>

                <!-- Range Slider -->
                <div class="mt-10">
                  <input class="js-ion-range-slider" type="text"
                        data-hs-ion-range-slider-options='{
                          "extra_classes": "range-slider-custom range-slider-custom-grid",
                          "type": "double",
                          "grid": true,
                          "hide_from_to": false,
                          "prefix": "$",
                          "min": 0,
                          "max": 500,
                          "from": 25,
                          "to": 475,
                          "result_min_target_el": "#rangeSliderExample3MinResult",
                          "result_max_target_el": "#rangeSliderExample3MaxResult"
                        }'>
                  <div class="d-flex justify-content-between mt-7">
                    <input type="text" class="form-control form-control-sm max-w-9rem" id="rangeSliderExample3MinResult">
                    <input type="text" class="form-control form-control-sm max-w-9rem mt-0" id="rangeSliderExample3MaxResult">
                  </div>
                </div>
                <!-- End Range Slider -->
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h4>Gender</h4>

                <!-- Checkboxes -->
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="genderMen" checked>
                    <label class="custom-control-label text-lh-lg" for="genderMen">Men</label>
                  </div>
                  <small>73</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="genderWomen" checked>
                    <label class="custom-control-label text-lh-lg" for="genderWomen">Women</label>
                  </div>
                  <small>51</small>
                </div>
                <!-- End Checkboxes -->
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h4>Brand</h4>

                <!-- Checkboxes -->
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="brandAdidas">
                    <label class="custom-control-label" for="brandAdidas">Adidas</label>
                  </div>
                  <small>16</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                    <label class="custom-control-label" for="brandNewBalance">New Balance</label>
                  </div>
                  <small>8</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="brandNike">
                    <label class="custom-control-label" for="brandNike">Nike</label>
                  </div>
                  <small>35</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                    <label class="custom-control-label" for="brandFredPerry">Fred Perry</label>
                  </div>
                  <small>5</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="brandTnf">
                    <label class="custom-control-label" for="brandTnf">The North Face</label>
                  </div>
                  <small>1</small>
                </div>
                <!-- End Checkboxes -->

                <!-- View More - Collapse -->
                <div class="collapse" id="collapseBrand">
                  <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="brandGucci">
                      <label class="custom-control-label" for="brandGucci">Gucci</label>
                    </div>
                    <small>5</small>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="brandMango">
                      <label class="custom-control-label" for="brandMango">Mango</label>
                    </div>
                    <small>1</small>
                  </div>
                </div>
                <!-- End View More - Collapse -->

                <!-- Link -->
                <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                  <span class="link-collapse-default">View more</span>
                  <span class="link-collapse-active">View less</span>
                  <span class="link-icon ml-1">+</span>
                </a>
                <!-- End Link -->
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h4>Size</h4>

                <!-- Checkboxes -->
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sizeS" checked>
                    <label class="custom-control-label" for="sizeS">S</label>
                  </div>
                  <small>27</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sizeM">
                    <label class="custom-control-label" for="sizeM">M</label>
                  </div>
                  <small>18</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sizeL" checked>
                    <label class="custom-control-label" for="sizeL">L</label>
                  </div>
                  <small>0</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sizeXL">
                    <label class="custom-control-label" for="sizeXL">XL</label>
                  </div>
                  <small>1</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sizeXXL">
                    <label class="custom-control-label" for="sizeXXL">XXL</label>
                  </div>
                  <small>2</small>
                </div>
                <!-- End Checkboxes -->
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h4>Category</h4>

                <!-- Checkboxes -->
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="categoryTshirt" checked>
                    <label class="custom-control-label text-lh-lg" for="categoryTshirt">T-shirt</label>
                  </div>
                  <small>73</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="categoryShoes">
                    <label class="custom-control-label text-lh-lg" for="categoryShoes">Shoes</label>
                  </div>
                  <small>0</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="categoryAccessories" checked>
                    <label class="custom-control-label text-lh-lg" for="categoryAccessories">Accessories</label>
                  </div>
                  <small>51</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="categoryTops" checked>
                    <label class="custom-control-label" for="categoryTops">Tops</label>
                  </div>
                  <small>5</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="categoryBottom">
                    <label class="custom-control-label" for="categoryBottom">Bottom</label>
                  </div>
                  <small>11</small>
                </div>
                <!-- End Checkboxes -->

                <!-- View More - Collapse -->
                <div class="collapse" id="collapseCategory">
                  <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="categoryShorts">
                      <label class="custom-control-label" for="categoryShorts">Shorts</label>
                    </div>
                    <small>5</small>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="categoryHats">
                      <label class="custom-control-label" for="categoryHats">Hats</label>
                    </div>
                    <small>3</small>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-1">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="categorySocks">
                      <label class="custom-control-label" for="categorySocks">Socks</label>
                    </div>
                    <small>8</small>
                  </div>
                </div>
                <!-- End View More - Collapse -->

                <!-- Link -->
                <a class="link link-collapse small font-size-1" data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
                  <span class="link-collapse-default">View more</span>
                  <span class="link-collapse-active">View less</span>
                  <span class="link-icon ml-1">+</span>
                </a>
                <!-- End Link -->
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h4>Rating</h4>

                <!-- Checkboxes -->
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rating1">
                    <label class="custom-control-label" for="rating1">
                      <span class="d-block text-warning">
                        <i class="fas fa-star"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                      </span>
                    </label>
                  </div>
                  <small>3</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rating2">
                    <label class="custom-control-label" for="rating2">
                      <span class="d-block text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                      </span>
                    </label>
                  </div>
                  <small>10</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rating3">
                    <label class="custom-control-label" for="rating3">
                      <span class="d-block text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star text-muted"></i>
                        <i class="far fa-star text-muted"></i>
                      </span>
                    </label>
                  </div>
                  <small>34</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rating4">
                    <label class="custom-control-label" for="rating4">
                      <span class="d-block text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star text-muted"></i>
                      </span>
                    </label>
                  </div>
                  <small>86</small>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between font-size-1 text-lh-lg text-body mb-0">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rating5">
                    <label class="custom-control-label" for="rating5">
                      <span class="d-block text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </span>
                    </label>
                  </div>
                  <small>102</small>
                </div>
                <!-- End Checkboxes -->
              </div>

              <button type="button" class="btn btn-sm btn-block btn-white transition-3d-hover">Clear All</button>
            </form>
          </div>
          <!-- End Filters -->
        </div>
      </div>
      <!-- End Products & Filters Section -->

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

      // INITIALIZATION OF SELECT2
      // =======================================================
      $(".js-custom-select").each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
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