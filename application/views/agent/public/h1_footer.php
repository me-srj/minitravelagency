    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?php echo date ( "Y" ); ?>  &copy; <a class="text-bold-800 grey darken-2" href="#" target="_blank"> Minitravel </a></span>
            <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
                <li class="list-inline-item"><a class="my-1" href="#" target="_blank">Developed Under</a></li>
                <li class="list-inline-item"><a class="my-1" href="#" target="_blank">SoftTricks</a></li>
            </ul>
        </div>
    </footer>
    <div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Loading...
</div>
    <!-- END: Footer-->
<script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>
    <!-- BEGIN: Vendor JS--><script src="<?=base_url(); ?>app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    
    <script src="<?= base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/extensions/sweet-alerts.min.js" type="text/javascript"></script>
    <script src="<?=base_url(); ?>app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="<?=base_url(); ?>app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url(); ?>app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="<?=base_url(); ?>app-assets/js/core/app.min.js" type="text/javascript"></script>
<!--     <script src="app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script> -->
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url(); ?>app-assets/js/scripts/tables/datatables/datatable-basic.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/animation/animation.js" type="text/javascript"></script>

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/ltr/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jun 2019 18:24:43 GMT -->
</html>