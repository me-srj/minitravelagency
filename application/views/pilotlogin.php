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
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
 <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>app-assets/assets/img/favicon/minitravel.png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>app-assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>app-assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>app-assets/css/argon.min5438.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<body class="bg-default">
      <!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Main content -->
  <div class="main-content" ng-app="myapp" ng-controller="login" >
    <!-- Header -->
    <div class="header bg-gradient-primary py-6 py-lg-6 pt-lg-6">
      <div class="container">
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome! Mini Travel </h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-2"><small>Pilot Login</small></div>
            <div id="errordiv" class="alert alert-info alert-dismissible text-center" style="display: none;padding: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p id="messagediv" class="mt-3"></p></div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form method="POST" ng-submit="submitForm()" >
                <div class="form-group mb-2">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" required="" ng-model="username" placeholder="Email" type="email" name="_email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required="" ng-model="password" placeholder="Password" name="_password" type="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" id="submitbtn" class="btn btn-primary my-4" >Sign in</button>
                  <p id="loading" style="display: none;"><span class="fa fa-circle-o-notch fa-spin"></span> Loading...</p>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light" data-target="#add" data-toggle="modal"><small>Forgot password?</small></a>
              <div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-danger">
<h4 class="modal-title" id="myModalLabel17">Forget Password</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo base_url() ?>application/modal/admin/fpass_send.php">
<div class="modal-body">
<label for="tax">Email/Mobile:</label>
<input type="text" name="key" class="form-control">
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>app-assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>app-assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>app-assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url() ?>app-assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url() ?>app-assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url() ?>app-assets/js/argon.min5438.js?v=1.2.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?= base_url() ?>app-assets/js/demo.min.js"></script>
<div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Loading...
</div>
</body>
<script type="text/javascript">
	var app=angular.module('myapp',[]);
	app.controller('login',function($scope,$http)
	{
  $scope.submitForm = function(){
        $("#overlay").fadeIn();
    $("#submitbtn").hide();
    $("#loading").show();
    $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/pilotlogin",
      data:{'username':$scope.username, 'password':$scope.password}
    }).then(function(responce){
      //alert(responce.data['status']);
       if (!responce.data['status']) 
      {
        $("#overlay").fadeOut();
//      alert(responce.data['message']);
 var errordiv =$("#errordiv");
 errordiv.show();
 $("#messagediv").html(responce.data['message']);
      $("#submitbtn").show();
    $("#loading").hide();
      }
      else
      {
        window.location='<?= base_url() ?>pilot';
      }
    });
  };
	});
</script>
<div class="col-sm-8" id="alertPanel">
        
         
        </div>
        <script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>
</html>