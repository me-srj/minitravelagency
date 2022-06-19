<style type="">
   .col .fa{
        font-size:17px;
        padding:5px;
        color:#ec3323;
    }
</style>
 <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?=base_url()?>" class="item">
            <div class="col">
                <i class="fa fa-home"> </i>
                <strong style="font-weight:600;color:#666;">Home</strong>
            </div>
        </a>
        <a href="<?=base_url()?>my-rides" class="item">
            <div class="col">
                <i class="fa fa-motorcycle"> </i>
                <strong style="font-weight:600;color:#666;">My Rides</strong>
            </div>
        </a>
        
        <a href="<?= base_url()?>user-transaction" class="item">
            <div class="col">
                <i class="fa fa-inr"> </i>
                <strong style="font-weight:600;color:#666;">Transaction</strong>
            </div>
        </a>
        <a href="<?= base_url()?>user-profile" class="item">
            <div class="col">
               <i class="fa fa-user-circle"> </i>
                <strong style="font-weight:600;color:#666;">My Profile</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->


   
    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?=base_url()?>app-assets/walletassets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?=base_url()?>app-assets/walletassets/js/lib/popper.min.js"></script>
    <script src="<?=base_url()?>app-assets/walletassets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    
    <!-- Owl Carousel -->
    <script src="<?=base_url()?>app-assets/walletassets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
 <!--    <script src="assets/js/base.js"></script> -->
<script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>
</body>

</html>