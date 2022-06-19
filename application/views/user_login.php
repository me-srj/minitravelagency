<!DOCTYPE html>
<html lang="en-US">
   
<!-- Mirrored from themescare.com/demos/gauto-preview/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jul 2020 09:06:42 GMT -->
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Title -->
      <title>Mini Travels | A tour And Travel Company</title>
      <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
<meta name="description" content="MiniTravel's a new startup company providing a mobility platform for travelling and transporting goods across India. The MiniTravel app offers mobility solutions by connecting customers to drivers and a wide range of vehicles across bikes, auto-rickshaws, metered taxis, and cabs, enabling convenience and transparency for thousands of customers and driver-partners. MiniTravel's core target is to serve the customer as per their demand at affordable cost, Beginning from Jharkhand"/>
<meta name="keywords" content="Best service in ranchi,minitravel,minitravels minitravelagency,mini travel agency ,mini car in ranchi,car booking service,hire car in ranchi,car hiring,best cab service in ranchi,Car rentals jharkhnad, book cabs online, book taxi online, airport taxi jharkhnad, cabs in jharkhnad, taxi in jharkhnad, cabs services in jharkhnad, taxi services in jharkhnad, car rental services in jharkhnad, car rentals, taxi, cabs, hire, rent"/>
<meta name="author" content="A tour and Travel Company mini travel agency " />
<meta name="expires" content="never" />
<meta name="distribution" content="global" />
<meta name="copyright" content="https://www.minitravelagency.com/" />
<meta name="email" content="minitravelagency@gmail.com" />
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>app-assets/assets/img/favicon/minitravel.png">
      <!--Bootstrap css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
    
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/bootstrap.css">
      <!--Font Awesome css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/font-awesome.min.css">
      <!--Magnific css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/mobilemenu.css">
      <!--Owl-Carousel css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/owl.theme.default.min.css">
      <!--Animate css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/animate.min.css">
      <!--Nice Select css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/nice-select.css">
      <!-- Lightgallery css -->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/lightgallery.min.css">
      <!--ClockPicker css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/jquery-clockpicker.min.css">
      <!--Slicknav css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/slicknav.min.css">
      <!--Site Main Style css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/style.css">
      
      <!--Responsive css-->
      <link rel="stylesheet" href="<?= base_url()?>app-assets/assets/css/responsive.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script data-require="angular.js@1.2.x" src="https://code.angularjs.org/1.2.28/angular.js" data-semver="1.2.28"></script>
   <style>
      #overlay {
  background:#1b1e21;
  color: #666666;
  position: fixed;
  height: 100%;
  width: 100%;
  z-index: 5000;
  top: 0%;
  left: 0;
  float: left;
  text-align: center;
  padding-top:0;
  opacity: .80;
}

.spinner {
   /*margin: 240px 100px 1px 150px;*/
    margin: 260px auto 1px auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid firebrick;
    border-right-color: transparent;
    border-radius: 50%;
}
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
  </style>
   </head>
   <div class="row">  
   <div id="alertPanel">
   </div>  
   </div>
   <body>
         <!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->    
 
    <!-- Mainmenu Area End -->
       <div class="mobile-menu">
         <ul class="bottom-navbar-nav">
            <li class="bottom-nav-item active">
               <a href="<?= base_url()?>" class="bottom-nav-link">
               <i class="fa fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="<?=base_url()?>About" class="bottom-nav-link">
               <i class="fa fa-info-circle"></i>
               <span>About</span>
               </a>
            </li>
        
            <li class="bottom-nav-item">
               <a href="<?= base_url()?>my-rides" class="bottom-nav-link">
               <i class="fa fa-motorcycle"></i>
               <span>MY Rides</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <?php
if (!empty($this->session->userdata("customer"))) {
   ?>
            <a href="<?= base_url()."user-profile" ?>" class="bottom-nav-link">
               <i class="fa fa-user-circle"></i>
               <span>Account</span>
               </a>
   
   <?php
}
else
{
?>
            <a href="<?= base_url()."customer-Login" ?>" class="bottom-nav-link">
               <i class="fa fa-user-circle"></i>
               <span>Account</span>
               </a>
<?php
}
               ?>
            </li>
         </ul>
      </div>     
     <!--Main Header Area Start -->
      <header class="gauto-main-header-area">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="site-logo">
                     <a href="<?= base_url() ?>//welcome/">
                <img src="https://www.animatedimages.org/data/media/67/animated-car-image-0021.gif" border="0" alt="animated-car-image-0150" / style="">
                     <h1 style="position:absolute;top:2px;">Mini<span style="color:#ec3323;">Travel's</span> </h1>
                     </a>
                  </div>
               </div>
               <div class="col-lg-6 col-sm-9">
                  <div class="header-promo">
                     <div class="single-header-promo">
                        <div class="header-promo-icon">
                           <img src="<?= base_url() ?>//app-assets/assets/img/globe.png" alt="globe" />
                        </div>
                        <div class="header-promo-info">
                           <h3>Chandwara</h3>
                           <p>Jharkhand</p>
                        </div>
                     </div>
                     <div class="single-header-promo">
                        <div class="header-promo-icon">
                           <img src="<?= base_url() ?>/app-assets/assets/img/clock.png" alt="clock" />
                        </div>
                        <div class="header-promo-info">
                           <h3>24 / 7</h3>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="header-action">
                     <a href="tel:+919934712947"><i class="fa fa-phone"></i> Request a call</a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Main Header Area End -->
       
       
      <!-- Mainmenu Area Start -->
      <section class="gauto-mainmenu-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-9">
                  <div class="mainmenu">
                     <nav>
                        <ul id="gauto_navigation">
                           <li class="active"><a href="<?= base_url() ?>">home</a></li>
                           <li><a href="<?= base_url() ?>About-US">about</a></li>

                           <li><a href="<?= base_url()?>Gallery">gallery</a></li>
                           <li><a href="<?= base_url() ?>Privacy-Policy">Privacy Policy</a></li>
                         
                           <li><a href="<?= base_url() ?>Contact-US">contact</a></li>

                           <?php
                            if(empty($this->session->userdata('customer'))){
                              ?>
                              <li>  <a href="<?= base_url()?>customer-Login">Account</a></li>

                          <?php }
                           else{
                              ?>
                               <li>
                              <a href="#">MY Account</a>
                              <ul>
                                 <li><a href="<?= base_url()?>my-rides">My Rides</a></li>
                                 <li><a href="<?= base_url()?>user-profile">My Profile</a></li>
                                 <li><a href="<?= base_url()?>user-logout">Log Out</a></li>
                              </ul>
                           </li>

                       
                       <?php
                           }

                           ?>
                           
                        </ul>
                     </nav>
                  </div>
               </div>
              
         </div>
      </section>
      <!-- Mainmenu Area End --><style type="text/css">
   #textbox{
      border:none;
      border-bottom:2px solid #ec3323;
   }
   
</style>
 <!-- Breadcromb Area Start -->
      <section class="gauto-breadcromb-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12"> 
                  <div class="breadcromb-box">
                     <h3>Login</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Login</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcromb Area End -->
       
       
      <!-- Login Area Start -->
      <section class="gauto-login-area section_70">
         <div class="container">
            <div ng-app="myapp" ng-controller="login" class="row">
               <div class="col-md-12">
                  <div class="login-box">
                     <div class="login-page-heading">
                        <i class="fa fa-key"></i>
                        <h3>sign in</h3>
                     </div>
                     <form method="post" action="#">
                        <div class="account-form-group" id="mobile_box">
                           <input type="text" placeholder="Enter Mobile Number" class="mobile" id="textbox" name="username" onkeypress="return isNumber(event)" ng-model="username" maxlength="10">
                           <i class="" style="border:none;color:#000;">+91</i>
                                              </div>
                        <div class="account-form-group" style="display: none;" id="otpbox">
                           <input type="text" placeholder="Enter OTP" class="otp_number" ng-model="otpvar" id="textbox" name="password">
                           <i class="fa fa-lock" style="border:none;"></i>
                        </div>
   <span style="color:red;font-weight:bolder;font-size:12px;" id="error"></span>
                        <p>
                           <button type="button" class="gauto-theme-btn" id="get_otp" ng-click="send_otp()">Get Otp</button>
                           <button type="button" class="gauto-theme-btn" id="verify_otp" ng-click="verify_otp()" style="display:none;" >verify otp</button>
                        </p>
                     </form>
<br>
<!--      <div class="remember-row float-right">
                           <p class="lost-pass">
                              <a href="#" onclick="$('#mapModal').modal('show');">forgot password?</a>
                           </p>
                        </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Login Area End -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
  var app=angular.module('myapp',[]);
  app.controller('login',function($scope,$http)
  {
    $scope.verify_otp = function(){
    if ((""+$scope.otpvar).length==4) 
    {
      $("#overlay").fadeIn();
    $http({
      method:"POST",
      url:"<?= base_url() ?>/user/check_otp",
      data:{'otp':$scope.otpvar}
    }).then(function(responce){
      if (!responce.data['status']) 
      {
        $("#overlay").fadeOut();
 var error =$("#error");
 error.show();
 $("#error").html(responce.data['message']);
      }
      else
      {
      //  alert("eles");
      <?php
if (!empty($car_id)) 
{
?>
           window.location='<?= base_url() ?>Book-Car?id=<?=$this->session->userdata('car_id');?>';
<?php
}
else
{
?>
 window.location='<?= base_url() ?>';
<?php
}

      ?>
      }
    });
    }
    else
    {
var error =$("#error");
 error.show();
 error.html("Please Enter a valid OTP!!");
    }
  };
  $scope.send_otp = function(){
    if ((""+$scope.username).length==10) 
    {
      $("#send_otp").hide();
          $("#overlay").fadeIn();
    $http({
      method:"POST",
      url:"<?= base_url() ?>/Send-otp",
      data:{'username':$scope.username}
    }).then(function(responce){
      //console.log(responce.data);
      if (!responce.data['status']) 
      {
        $("#overlay").fadeOut();
 var error =$("#error");
 error.show();
 $("#error").html(responce.data['message']);
      }
      else
      {
        $("#overlay").fadeOut();
  $("#mobile_box").hide();
  $("#get_otp").hide();
  $("#otpbox").show();
  $("#error").slideDown();
  $("#verify_otp").show();
  //$("#error").html(responce.data['message']);
      //  window.location='<?= base_url() ?>/';
      }
    });
    }
    else
    {
var error =$("#error");
 error.show();
 error.html("Please Enter a valid number!!");
    }
  };
  });
           function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script> </script> <!-- Footer Area Start -->
      <footer class="gauto-footer-area">
         <div class="footer-top-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="single-footer">
                        <div class="footer-logo">
                           <a href="#">
                            <h2><a href="https://minitravelagency.com/">MiniTravel Agency</a></h2>
                             
                           </a>
                        </div>
                       <p><a href="https://minitravelagency.com/">MiniTravelagency</a> with Love assures you a safe and happy journey throughout the Country.</p>
                        <div class="footer-address">
                           <h3>Head office</h3>
                           <p>Ashok Nagar, Ranchi Jharkhand, 834002 <span>JHarkhnad, India</span></p>
                           <ul>
                              <li>Phone:  <a href="tel:+919798796646">+919798796646</a></li>
                              <li>Email: <a href="mailto:care@minitravelagency.com">care@minitravelagency.com</a></li>
                              <li>Office Time: 24 x 7</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="single-footer quick_links">
                        <h3>Quick Links</h3>
                        <ul class="quick-links">
                           <li><a href="https://minitravelagency.com/application/view/contact/">Contact us</a></li>
                           <li><a href="https://minitravelagency.com/application/view/privacy_policy/">Privacy Policy</a></li>
                        </ul>
                        <ul class="quick-links">
                           <li><a href="https://minitravelagency.com/app-assets/assets/apk/_MiniTravels_12014316.apk" download>Click Here To Download Mobile App</a></li>
                           <li>  <a href="https://minitravelagency.com/app-assets/assets/apk/_Mini_Travels_12086807.apk" download>
                <img src="https://www.animatedimages.org/data/media/67/animated-car-image-0021.gif" border="0" alt="animated-car-image-0150" / style="">
                     <h3 style="position:absolute;top:3vh;">Mini<span style="color:#ec3323;">Travel's</span> Apk </h3>
                     </a></li>
                           
                           
                        </ul>
                     </div>
                    
                  </div>
                
               </div>
            </div>
         </div>
         <div class="footer-bottom-area">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="copyright">
                        <p>Devloped By <i class="fa fa-heart"></i> <a href="#">SoftTricks Solution <a href="tel:+917903562598">+917903562598</a></p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="footer-social">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer Area End -->
      <div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Loading...
</div>
</body>


    <!--Jquery js-->
    <!--Jquery js-->
      <script src="<?= base_url()?>app-assets/assets/js/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="<?= base_url()?>app-assets/assets/js/popper.min.js"></script>
      <!--Bootstrap js-->
      <script src="<?= base_url()?>app-assets/assets/js/bootstrap.min.js"></script>
      <!--Owl-Carousel js-->
      <script src="<?= base_url()?>app-assets/assets/js/owl.carousel.min.js"></script>
      <!--Lightgallery js-->
      <script src="<?= base_url()?>app-assets/assets/js/lightgallery-all.js"></script>
      <script src="<?= base_url()?>app-assets/assets/js/custom_lightgallery.js"></script>
      <!--Slicknav js-->
      <script src="<?= base_url()?>app-assets/assets/js/jquery.slicknav.min.js"></script>
      <!--Magnific js-->
      <script src="<?= base_url()?>app-assets/assets/js/jquery.magnific-popup.min.js"></script>
      <!--Nice Select js-->
      <script src="<?= base_url()?>app-assets/assets/js/jquery.nice-select.min.js"></script>
      <!-- Datepicker JS -->
      <script src="<?= base_url()?>app-assets/assets/js/jquery.datepicker.min.js"></script>
      <!--ClockPicker JS-->
      <script src="<?= base_url()?>app-assets/assets/js/jquery-clockpicker.min.js"></script>
      <!--Main js-->
      <script src="<?= base_url()?>app-assets/assets/js/main.js"></script>
      <script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>
      </html>