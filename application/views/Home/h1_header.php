<!DOCTYPE html>
<html lang="en-US" ng-app="plunker">
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
<meta name="google-site-verification" content="ADAVMJEXrV1X3w-ZG3HXaG2N1rV8Bk8fXtT0bMT_Z7c" />
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
      <script src="<?= base_url()?>app-assets/angularjs/angular.min.js"></script>
      <script src="<?= base_url()?>app-assets/preloader/preloader.css"></script>
<!--<script data-require="angular.js@1.2.x" src="https://code.angularjs.org/1.2.28/angular.js" data-semver="1.2.28"></script> -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-gHE38DViTrpJpwjnj7fObqkbi0Z10dc&libraries=places"></script>
       <!-- vsGoogleAutocomplete -->
    <script src="<?= base_url()?>app-assets/location/vs-google-autocomplete.js"></script>
    <script src="<?= base_url()?>app-assets/location/app2.js"></script>
    <link rel="manifest" href="manifest.json">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase.js"></script>
   </head>
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
   <div class="row">  
   <div id="alertPanel">                        
  </div>  
   </div>
   <script><?=$script;?></script>