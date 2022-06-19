
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
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
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
              <h1 class="text-white">Become a Pilot</h1>
              <p class="text-lead text-white">Get Register as a pilot & start Earning with us.</p>
        
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
      <!-- Table -->
      <div class="row justify-content-center">
          
        <div class="col-lg-8 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-3">
             <p id="messagediv" class="mt-3"></p>

            
            <div class="card-body px-0 py-lg-3">
              
              <form method="POST" enctype="multipart/form-data" ng-submit="submitForm()">
                <div class="form-group">
                  <h5 for="Name" class="control-label">Name</h5>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control"placeholder="Your Name" required="" minlength="4" maxlength="100" required ng-model="aname">
                  </div>
                </div>
                <div class="form-group">
                  <h5 for="Phone Number" class="control-label">Phone Number</h5>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input class="form-control"maxlength="10" minlength="10" required="" placeholder="Contact No." required ng-model="mobile" onkeypress="return isNumber(event)">
                  </div>
                </div>
                <div class="form-group">
                  <h5 for="Email" class="control-label">Email</h5>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="email"class="form-control" placeholder="Email" required="" ng-model="email">
                  </div>
                </div>
                 <div class="form-group">
                  <h5 for="aadhar" class="control-label">Aadhar No</h5>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input type="text"class="form-control" minlength="12" maxlength="12" required="" placeholder="Adhar No" required ng-model="adhar_no" onkeypress="return isNumber(event)">
                  </div>
                </div>
                 <div class="form-group">
                  <h5 for="aadhar" class="control-label">Aadhar</h5>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input type="file" class="form-control" required="" name="adhar_doc" required onchange="adhar_doc_can(this)" />
                  </div>
                </div>
                <canvas style="display: none;" id="doc_canvas"></canvas>
                <div class="form-group">
                  <h5 for="Profile" class="control-label">Profile Photo</h5>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                    </div>
                    <input type="file" class="form-control" required="" name="photo" required onchange="photo_selected(this)"/>
                  </div>
                </div>
                <canvas style="display: none;" id="photo_canvas"></canvas>
                <div class="form-group">
                  <h5 for="Password" class="control-label">Password</h5>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required="" placeholder="Password" required ng-model="password">
                  </div>
                </div>
                <div class="form-group">
                  <h5 for="cpassword" class="control-label">Confirm Password</h5>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" type="password" placeholder="Confirm Password" required ng-model="repassword">
                  </div>
                </div>
                <div class="form-group">
                  <h5 for="address" class="control-label">Address</h5>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-user-circle"></i></span>
                    </div>
                    <textarea class="form-control form-group" required="" name="address" placeholder="Enter your address" required ng-model="address">
                      </textarea>
                  </div>
                </div> 
                <div class="form-group">
                  <h5 for="address" class="control-label">Bio</h5>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-user-circle"></i></span>
                    </div>
                    <textarea class="form-control form-group" required="" maxlength="100" name="address" placeholder="Enter your Bio" required ng-model="driverbio">
                      </textarea>
                  </div>
                </div>            
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox" required="">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-12 pt-2">
                    <div class="row badge badge-danger" id="errordiv"></div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-dark mt-4">Register Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
         <div class="row mt-3">
            <div class="col-6">
              <a href="<?= base_url()?>agentlogin" class="text-light"><small>Already Have A Account?</small></a>
            </div>
            <div class="col-6">
              <a href="<?= base_url()?>Pilot-Policy" class="text-light"><small>Privacy & Policy</small></a>
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
  <script src="<?= base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/extensions/sweet-alerts.min.js" type="text/javascript"></script>
  <!-- Argon JS -->
  <script src="<?=base_url()?>app-assets/js/argon.min.js?v=1.2.0"></script>
</body>

</html>
<script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>
<script type="text/javascript">
  function photo_selected(ele) {
  var img = new Image();
  img.onload = drawphoto;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function adhar_doc_can(ele) {
         var img2 = new Image();
  img2.onload = draw;
  img2.onerror = failed;
  img2.src = URL.createObjectURL(ele.files[0]);
        }
function drawphoto() {
  var canvasp = document.getElementById('photo_canvas');
  //$(canvasp).show();
if (this.width>500) 
{
    canvasp.width = 500;
}
else
{
   canvasp.width = this.width; 
}
 if (this.height>500) 
{
    canvasp.height = 500;
}
else
{
   canvasp.height = this.height; 
}
  var ctx = canvasp.getContext('2d');
  ctx.drawImage(this, 0,0,canvasp.width, canvasp.height);
  var dataURL = canvasp.toDataURL("image/png");
  photo=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
function draw() {
  var canvas = document.getElementById('doc_canvas');
 // $(canvas).show();
 if (this.width>1366) 
{
    canvas.width = 1366;
}
else
{
   canvas.width = this.width; 
}
 if (this.height>768) 
{
    canvas.height = 768;
}
else
{
   canvas.height = this.height; 
}
  var ctx = canvas.getContext('2d');
  ctx.drawImage(this, 0,0,canvas.width, canvas.height);
  var dataURL = canvas.toDataURL("image/png");
  doc=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
function failed() {
  console.error("The provided file couldn't be loaded as an Image media");
}
</script>
      <script>
        var photo="";
  var doc="";
        var app = angular.module('plunker', [])
        app.controller('MainCtrl', function ($scope,$http) {
            $scope.submitForm = function(){          

               $('#overlay').fadeIn();
              if($scope.password === $scope.repassword)
              {
      $http({
      method:"POST",
      url:"<?= base_url() ?>welcome/agent_register",
      data:{"name":$scope.aname,"email":$scope.email,"mobile":$scope.mobile,"adhar_no":$scope.adhar_no,"adhar_doc":doc,"photo":photo,"password":$scope.password,'address':$scope.address,"driverbio":$scope.driverbio},
    }).then(function(responce){
            $('#overlay').fadeOut();
           // alert(responce.data['status']);
      if (!responce.data['status']) 
      {
        swal('Sorry to say',''+ responce.data["message"]+'','error',{button: 'Okay',});
 var errordiv =$("#errordiv");
  errordiv.show();
  errordiv.html(responce.data['message']);
      }
      else
      {
          swal('Successfully !',''+ responce.data["message"]+'','success',{button: 'Okay',}).then((value)=>{
        window.location='<?= base_url() ?>agentlogin';
       })
      }
    });
              }
              else
              {
                $('#overlay').fadeOut();
        var errordiv =$("#errordiv");
  errordiv.show();
  errordiv.html("Password and Re-Password are Not Same");
              }
            };
        });
    </script>
    <script type="">
      function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    </script>
    <script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>