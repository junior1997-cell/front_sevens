<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlstream.com/front/demo-real-estate/property-seller.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:23:49 GMT -->
<head>
  <!-- Title -->
  <title>Property Seller - Landing House | Front - Responsive Website Template</title>

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
    <!-- Upload Form Section -->
    <div class="container space-2">
      <div class="w-lg-75 mx-lg-auto">
        <!-- Title -->
        <div class="text-center mb-9">
          <h1 class="h2">Real estate listing upload form</h1>
          <p class="mb-0">Please proofread your submission carefully before submitting.</p>
          <p>Submissions which exceed maximum word counts will be edited.</p>
        </div>
        <!-- End Title -->

        <form class="js-validate">
          <!-- Listing Agent Information -->
          <div class="mb-5">
            <h5 class="divider mb-5">Listing agent information</h5>

            <div class="row">
              <div class="col-md-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingAgentAgentName" class="input-label">Listing agent name</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingAgentAgentNameLabel">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="agentName" id="listingAgentAgentName" placeholder="Listing agent name" aria-label="Listing agent name" aria-describedby="listingAgentAgentNameLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-md-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingAgentPhoneNumber" class="input-label">Phone number</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingAgentPhoneNumberLabel">
                        <i class="fas fa-phone"></i>
                      </span>
                    </div>
                    <input type="tel" class="form-control" name="phoneNumber" id="listingAgentPhoneNumber" placeholder="Phone number" aria-label="Phone number" aria-describedby="listingAgentPhoneNumberLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingAgentRealEstateAgency" class="input-label">Real estate agency</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingAgentRealEstateAgencyLabel">
                        <i class="fas fa-briefcase"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="RealEstateAgency" id="listingAgentRealEstateAgency" placeholder="Real estate agency" aria-label="Real estate agency" aria-describedby="listingAgentRealEstateAgencyLabel">
                  </div>
                </div>
              </div>
              <!-- End Input -->

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingAgentWebsiteAddress" class="input-label">Website address</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingAgentWebsiteAddressLabel">
                        <i class="fas fa-globe"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="websiteAddress" id="listingAgentWebsiteAddress" placeholder="Website address" aria-label="Website address" aria-describedby="listingAgentWebsiteAddressLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>
          </div>
          <!-- End Listing Agent Information -->

          <!-- Type of Listing -->
          <div class="mb-10">
            <h5 class="divider mb-5">Type of listing</h5>

            <!-- Radio Checkbox Group -->
            <div class="row mx-n2">
              <div class="col-6 col-md-3 px-2 mb-3 mb-md-0">
                <div class="custom-control custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100">
                  <input type="radio" id="typeOfListingRadio1" name="typeOfListingRadio1" class="custom-control-input checkbox-outline-input checkbox-icon-input">
                  <label class="checkbox-outline-label checkbox-icon-label w-100 rounded py-3 px-1 mb-0" for="typeOfListingRadio1">
                    <img class="img-fluid w-50 mb-3" src="../assets/svg/illustrations/small-house.svg" alt="SVG">
                    <span class="d-block">House</span>
                  </label>
                </div>
              </div>
              <div class="col-6 col-md-3 px-2 mb-3 mb-md-0">
                <div class="custom-control custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100">
                  <input type="radio" id="typeOfListingRadio2" name="typeOfListingRadio1" class="custom-control-input checkbox-outline-input checkbox-icon-input" checked>
                  <label class="checkbox-outline-label checkbox-icon-label w-100 rounded py-3 px-1 mb-0" for="typeOfListingRadio2">
                    <img class="img-fluid w-50 mb-3" src="../assets/svg/illustrations/flat-house.svg" alt="SVG">
                    <span class="d-block">Flat</span>
                  </label>
                </div>
              </div>
              <div class="col-6 col-md-3 px-2">
                <div class="custom-control custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100">
                  <input type="radio" id="typeOfListingRadio3" name="typeOfListingRadio1" class="custom-control-input checkbox-outline-input checkbox-icon-input">
                  <label class="checkbox-outline-label checkbox-icon-label w-100 rounded py-3 px-1 mb-0" for="typeOfListingRadio3">
                    <img class="img-fluid w-50 mb-3" src="../assets/svg/illustrations/multi-family-house.svg" alt="SVG">
                    <span class="d-block">Multi-family</span>
                  </label>
                </div>
              </div>
              <div class="col-6 col-md-3 px-2">
                <div class="custom-control custom-radio custom-control-inline checkbox-outline checkbox-icon text-center w-100 h-100">
                  <input type="radio" id="typeOfListingRadio4" name="typeOfListingRadio1" class="custom-control-input checkbox-outline-input checkbox-icon-input">
                  <label class="checkbox-outline-label checkbox-icon-label w-100 rounded py-3 px-1 mb-0" for="typeOfListingRadio4">
                    <img class="w-50 mb-3" src="../assets/svg/illustrations/farm-land.svg" alt="SVG">
                    <span class="d-block">Farms/land</span>
                  </label>
                </div>
              </div>
            </div>
            <!-- End Radio Checkbox Group -->
          </div>
          <!-- End Type of Listing -->

          <!-- Listing Information -->
          <div class="mb-5">
            <h5 class="divider mb-5">Listing information</h5>

            <!-- Input -->
            <div class="form-group mb-5">
              <label for="listingPrice" class="input-label">Price</label>
              <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="listingPriceLabel">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="text" class="form-control" name="price" id="listingPrice" placeholder="Price" aria-label="Price" aria-describedby="listingPriceLabel">
              </div>
            </div>
            <!-- End Input -->

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingAddress" class="input-label">Address</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingAddressLabel">
                        <i class="fas fa-map-marker-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="address" id="listingAddress" placeholder="Address" aria-label="Address" aria-describedby="listingAddressLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingCityProvince" class="input-label">City, Province</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingCityProvinceLabel">
                        <i class="fas fa-city"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="cityProvince" id="listingCityProvince" placeholder="City, Province" aria-label="City, Province" aria-describedby="listingCityProvinceLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingLotSize" class="input-label">Lot size</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingLotSizeLabel">
                        <i class="fas fa-ruler-combined"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="lotSize" id="listingLotSize" placeholder="Lot size" aria-label="Lot size" aria-describedby="listingLotSizeLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingPostalCode" class="input-label">Postal code</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingPostalCodeLabel">
                        <i class="fas fa-envelope-open"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="PostalCode" id="listingPostalCode" placeholder="Postal code" aria-label="Postal code" aria-describedby="listingPostalCodeLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingBedroom" class="input-label">Bedroom</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingBedroomLabel">
                        <i class="fas fa-bed"></i>
                      </span>
                    </div>
                    <select class="custom-select" id="listingBedroom" aria-describedby="listingBedroomLabel">
                      <option selected>Choose amount</option>
                      <option value="parkingSpacesSelect1">1</option>
                      <option value="parkingSpacesSelect2">2</option>
                      <option value="parkingSpacesSelect3">3</option>
                      <option value="parkingSpacesSelect4">4</option>
                      <option value="parkingSpacesSelect5plus">5+</option>
                    </select>
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingBathrooms" class="input-label">Bathrooms</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingBathroomsLabel">
                        <i class="fas fa-bath"></i>
                      </span>
                    </div>
                    <select class="custom-select" id="listingBathrooms" aria-describedby="listingBathroomsLabel">
                      <option selected>Choose amount</option>
                      <option value="bathroomsSelect1">1</option>
                      <option value="bathroomsSelect2">2</option>
                      <option value="bathroomsSelect3">3</option>
                      <option value="bathroomsSelect4">4</option>
                      <option value="bathroomsSelect5plus">5+</option>
                    </select>
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingKitchen" class="input-label">Kitchen</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingKitchenLabel">
                        <i class="fas fa-utensils"></i>
                      </span>
                    </div>
                    <select class="custom-select" id="listingKitchen" aria-describedby="listingKitchenLabel">
                      <option selected>Choose amount</option>
                      <option value="kitchenSelect1">1</option>
                      <option value="kitchenSelect2">2</option>
                      <option value="kitchenSelect3">3</option>
                      <option value="kitchenSelect4">4</option>
                      <option value="kitchenSelect5plus">5+</option>
                    </select>
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="listingYearBuilt" class="input-label">Year built</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="listingYearBuiltLabel">
                        <i class="fas fa-calendar"></i>
                      </span>
                    </div>
                    <select class="custom-select" id="listingYearBuilt" aria-describedby="listingYearBuiltLabel">
                      <option selected>Choose year</option>
                      <option value="yearBuiltSelectOlder">Older</option>
                      <option value="yearBuiltSelect1985">1985</option>
                      <option value="yearBuiltSelect1986">1986</option>
                      <option value="yearBuiltSelect1987">1987</option>
                      <option value="yearBuiltSelect1988">1988</option>
                      <option value="yearBuiltSelect1989">1989</option>
                      <option value="yearBuiltSelect1990">1990</option>
                      <option value="yearBuiltSelect1991">1991</option>
                      <option value="yearBuiltSelect1992">1992</option>
                      <option value="yearBuiltSelect1993">1993</option>
                      <option value="yearBuiltSelect1994">1994</option>
                      <option value="yearBuiltSelect1995">1995</option>
                      <option value="yearBuiltSelect1996">1996</option>
                      <option value="yearBuiltSelect1997">1997</option>
                      <option value="yearBuiltSelect1998">1998</option>
                      <option value="yearBuiltSelect1999">1999</option>
                      <option value="yearBuiltSelect2000">2000</option>
                      <option value="yearBuiltSelect2001">2001</option>
                      <option value="yearBuiltSelect2002">2002</option>
                      <option value="yearBuiltSelect2003">2003</option>
                      <option value="yearBuiltSelect2004">2004</option>
                      <option value="yearBuiltSelect2005">2005</option>
                      <option value="yearBuiltSelect2006">2006</option>
                      <option value="yearBuiltSelect2007">2007</option>
                      <option value="yearBuiltSelect2008">2008</option>
                      <option value="yearBuiltSelect2009">2009</option>
                      <option value="yearBuiltSelect2010">2010</option>
                      <option value="yearBuiltSelect2011">2011</option>
                      <option value="yearBuiltSelect2012">2012</option>
                      <option value="yearBuiltSelect2013">2013</option>
                      <option value="yearBuiltSelect2014">2014</option>
                      <option value="yearBuiltSelect2015">2015</option>
                      <option value="yearBuiltSelect2016">2016</option>
                      <option value="yearBuiltSelect2017">2017</option>
                    </select>
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <label class="input-label">Listing description</label>

            <!-- Quill -->
            <div class="quill-custom form-group">
              <div class="js-quill" style="min-height: 15rem;"
                   data-hs-quill-options='{
                   "placeholder": "Type your message...",
                    "modules": {
                      "toolbar": [
                        ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                      ]
                    }
                   }'>
              </div>
            </div>
            <!-- End Quill -->
          </div>
          <!-- End Listing Information -->

          <!-- Utilities -->
          <div class="mb-5">
            <h5 class="divider mb-5">Estimated running costs</h5>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="utilitiesMortgage" class="input-label">Mortgage</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="utilitiesMortgageLabel">
                        <i class="fas fa-hand-holding-usd"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="mortgage" id="utilitiesMortgage" placeholder="Mortgage" aria-label="Mortgage" aria-describedby="utilitiesMortgageLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="utilitiesEnergy" class="input-label">Energy</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="utilitiesEnergyLabel">
                        <i class="fas fa-burn"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="energy" id="utilitiesEnergy" placeholder="Energy" aria-label="Energy" aria-describedby="utilitiesEnergyLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="utilitiesWater" class="input-label">Water</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="utilitiesWaterLabel">
                        <i class="fas fa-tint"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="water" id="utilitiesWater" placeholder="Water" aria-label="Water" aria-describedby="utilitiesWaterLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <!-- Input -->
                <div class="form-group">
                  <label for="utilitiesHomeInsurance" class="input-label">Home insurance</label>
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="utilitiesHomeInsuranceLabel">
                        <i class="fas fa-shield-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="HomeInsurance" id="utilitiesHomeInsurance" placeholder="Home insurance" aria-label="Home insurance" aria-describedby="utilitiesHomeInsuranceLabel">
                  </div>
                </div>
                <!-- End Input -->
              </div>
            </div>
          </div>
          <!-- End Utilities -->

          <!-- Upload Images -->
          <div class="mb-5">
            <h5 class="divider mb-5">Upload images</h5>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <label class="input-label">Property media</label>

                <!-- File Attachment Input -->
                <div id="imaegDropzone" class="js-dropzone dz-dropzone dz-dropzone-boxed">
                  <div class="dz-message">
                    <img class="avatar mb-3" src="../assets/svg/illustrations/add-file.svg" alt="SVG">
                    <span class="d-block">Browse your device and upload images</span>
                    <small class="d-block text-muted">Maximum file size is 2MB</small>
                  </div>
                </div>
                <!-- End File Attachment Input -->
              </div>

              <div class="col-lg-6 mb-3">
                <label class="input-label">Floorplan</label>

                <!-- File Attachment Input -->
                <div id="floorplanDropzone" class="js-dropzone dz-dropzone dz-dropzone-boxed">
                  <div class="dz-message">
                    <img class="avatar mb-3" src="../assets/svg/illustrations/add-file.svg" alt="SVG">
                    <span class="d-block">Upload floorplan</span>
                    <small class="d-block text-muted">Maximum file size is 1MB</small>
                  </div>
                </div>
                <!-- End File Attachment Input -->
              </div>
            </div>
          </div>
          <!-- End Upload Images -->

          <button type="submit" class="btn btn-primary btn-block transition-3d-hover">Submit</button>
        </form>
      </div>
    </div>
    <!-- End Upload Form Section -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  <?php  require 'footer.php'; ?>
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


  <!-- JS Implementing Plugins -->
  <script src="../assets/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="../assets/js/theme.min.js"></script>

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


      // INITIALIZATION OF FORM VALIDATION
      // =======================================================
      $('.js-validate').each(function() {
        $.HSCore.components.HSValidation.init($(this));
      });


      // INITIALIZATION OF DROPZONE FILE ATTACH MODULE
      // =======================================================
      $('.js-dropzone').each(function () {
        var dropzone = $.HSCore.components.HSDropzone.init('#' + $(this).attr('id'));
      });


      // INITIALIZATION OF QUILLJS EDITOR
      // =======================================================
      var quill = $.HSCore.components.HSQuill.init('.js-quill');


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

<!-- Mirrored from htmlstream.com/front/demo-real-estate/property-seller.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 14:23:50 GMT -->
</html>
