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


    // INITIALIZATION OF TEXT ANIMATION (TYPING)
    // =======================================================
    var typed = $.HSCore.components.HSTyped.init(".js-text-animation");


    // INITIALIZATION OF GO TO
    // =======================================================
    $('.js-go-to').each(function () {
      var goTo = new HSGoTo($(this)).init();
    });
  });
</script>