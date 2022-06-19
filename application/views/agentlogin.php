
<!DOCTYPE html>
<html>

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
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=base_url()?>app-assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>app-assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?=base_url()?>app-assets/css/argon.min.css?v=1.2.0" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="<?= base_url()?>app-assets/angularjs/angular.min.js"></script>
  <!-- Google Tag Manager -->

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

<body class="bg-dark" ng-app="plunker">
    <!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->
 
  <!-- Main content -->
  <div class="main-content" ng-controller="MainCtrl">
    <!-- Header -->
    <div class="header bg-gradient-danger py-4 py-lg-5 pt-lg-6">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Pilot Login</h1>
              <p class="text-lead text-white">Please do not share your credential with someone to Keep you account Secure</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-dark" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body  mt-3 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
                <div id="errordiv" class="alert alert-info alert-dismissible text-center" style="display: none;padding: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p id="messagediv" class="mt-3"></p></div>
              </div>
              <form method="POST" ng-submit="submitForm()">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" name="username" required ng-model="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="password" required ng-model="password">
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-dark my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-4">
              <a href="<?= base_url()?>forgot-password" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-4">
              <a href="<?= base_url()?>Pilot-Policy" class="text-light"><small>Privacy & Policy</small></a>
            </div>
            <div class="col-4 text-right">
              <a href="<?= base_url();?>agentregister/" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Loading...
</div>

  <!-- Core -->
  <script src="<?=base_url()?>app-assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>app-assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>app-assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=base_url()?>app-assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=base_url()?>app-assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=base_url()?>app-assets/js/argon.min.js?v=1.2.0"></script>

</body>

</html>

<script>
  var app=angular.module('plunker',[]);
  app.controller('MainCtrl',function($scope,$http)
  {
    $scope.reset_password=function(){
      if ($scope.param!==undefined) 
      {
        $("#overlay").fadeIn();
      $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/sendotp",
      data:{'username':$scope.param, 'type':'dGJsX2FnZW50X21hc3Rlcg=='}
    }).then(function(responce){
      $scope.param="";
 $("#fpassmeg").html(responce.data);
$('#overlay').fadeOut();
    });    
      }
      else
      {
        $("#fpassmeg").html("Please Enter E-mail/Mobile...");
      }
    }
  $scope.submitForm = function(){
    $('#overlay').fadeIn();
    $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/agentWeblogin",
      data:{'username':$scope.username, 'password':$scope.password}
    }).then(function(responce){
      if (!responce.data['status']) 
      {
//      alert(responce.data['message']);
 var errordiv =$("#errordiv");
 errordiv.show();
 $("#messagediv").html(responce.data['message']);
      $('#overlay').fadeOut();
      }
      else
      {
        $('#overlay').fadeOut();
        window.location='<?= base_url() ?>agent';
      }
    });
  };
  });
  
</script>
<script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>