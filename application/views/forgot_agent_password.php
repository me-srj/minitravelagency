
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
<link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
<meta name="email" content="minitravelagency@gmail.com" />
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
 <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>app-assets/assets/img/favicon/minitravel.png">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=base_url()?>app-assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>app-assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?=base_url()?>app-assets/css/argon.min.css?v=1.2.0" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="<?= base_url()?>app-assets/angularjs/angular.min.js"></script>

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
              <h1 class="text-white">Forgot Password</h1>
              <p>Change Your Password Here</p>
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
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small></small>
                <div id="errordiv" class="alert alert-danger alert-dismissible text-center" style="display: none;padding: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p id="errmessagediv" class="mt-3"></p></div>
          <div id="successdiv" class="alert alert-success alert-dismissible text-center" style="display: none;padding: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p id="succmessagediv" class="mt-3"></p></div>
              </div>
              <form method="POST" ng-submit="reset_password()" class="usernamebox">
                <div class="form-group mb-3" >
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email or Phone" name="username"  ng-model="username" required>
                  </div>
                </div>                
                <div class="text-center">
                  <button type="submit" class="btn btn-dark my-4">Get Otp</button>
                </div>
              </form>
              <form method="POST" ng-submit="check_otp()" style="display:none;" class="otpbox">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Otp" maxlength="6" name="password"  ng-model="otp">
                  </div>
                </div>                
                <div class="text-center">
                  <button type="submit" class="btn btn-dark my-4">Verify Otp</button>
                </div>
              </form>
              <form method="POST" ng-submit="change_password()" style="display:none;" class="passwordbox">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type ="password"class="form-control" placeholder="Enter New Password"  name="password"  ng-model="password" required>
                  </div>
                </div>   
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Re Enter New Password" name="password"  ng-model="cpassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-dark my-4">Change Password</button>
                </div>
              </form>
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
      var username=$scope.username;
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       if($scope.username!='' && $scope.username!=null)
       {
        $('btn-dark').attr('disabled');
      $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/sendagentotp",
      data:{'username':$scope.username, 'type':'dGJsX2FnZW50X21hc3Rlcg=='}
    }).then(function(responce){
      //$('#overlay').fadeOut();
      if(responce.data['status']==true)
      {
        //$scope.username;
        $('.usernamebox').hide();
      $('.otpbox').show();
      $('#successdiv').show();
      $('#succmessagediv').html(responce.data['message']);
      }else{
        $("#errordiv").show();
        $("#errmessagediv").html(responce.data['message']);
      }
    });  
       }

}
$scope.check_otp = function(){
if($scope.otp!='' && $scope.otp!=null){
  $('btn-dark').attr('disabled');
         $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/check_agent_otp",
      data:{'otp':$scope.otp}
    }).then(function(responce){
      //console.log(responce.data)
      // alert(responce.data['status']);
      if(responce.data['status']==true)
      {
        $('.otpbox').hide();
        $('.passwordbox').show();
         $('#successdiv').show(); 
          $("#errordiv").hide();
      $('#successdiv').html(responce.data['message']);
      
      }else{
        $("#errmessagediv").show();
       $("#errmessagediv").html(responce.data['message']);
      }
    });
       }

       else{
        $("#errordiv").show();
         $('#successdiv').hide();
        $("#errordiv").html('Enter Valid OTP');

       }
}
$scope.change_password = function(){
if($scope.password==$scope.cpassword){
  $('btn-dark').attr('disabled');
         $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/change_agent_password",
      data:{'username':$scope.username,'password':$scope.password}
    }).then(function(responce){
      if(responce.data['status']==true)
      {
       $scope.password=''; 
       $scope.cpassword=''; 
       $scope.username='';
       $("#errordiv").hide();
         $('#successdiv').show();
         $('.otpbox').hide();
        $('.passwordbox').hide();
        $('.usernamebox').show();
      $('#successdiv').html(responce.data['message']);
      
      }else{
        $scope.password='';
        $scope.cpassword=''; 
        $("#errmessagediv").show();
       $("#errmessagediv").html(responce.data['message']);
      }
    });
       }

       else{
        $("#errordiv").show();
         $("#successdiv").hide();
        $("#errordiv").html('Password & Confirm Password must be same');

       }
}

  });

    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  
</script>