
<?php 
$admin_base_url = base_url(); 
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" ng-app="agent">
<!-- BEGIN: Head-->

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
    <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader2.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- BEGIN: Vendor CSS-->
     <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/components.min.css">
    <!-- END: Theme CSS-->
    <link rel="stylesheet" href="<?= base_url() ?>app-assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/plugins/animate/animate.min.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>app-assets/css/core/colors/palette-gradient.min.css">
    <script src="<?= base_url()?>app-assets/angularjs/angular.min.js"></script>

    <!-- END: Page CSS-->

    <!-- END: Page CSS-->
	<link rel="manifest" href="<?=base_url(); ?>app-assets/manifest.json">
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
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-danger" data-col="2-columns" ng-controller="myCtrl">
    <!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->
     <script>
// Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCK_BJ4lmmqOQdyow3krynQSjHs67FbIuE",
    authDomain: "test-f1857.firebaseapp.com",
    databaseURL: "https://test-f1857-default-rtdb.firebaseio.com",
    projectId: "test-f1857",
    storageBucket: "test-f1857.appspot.com",
    messagingSenderId: "1054012487170",
    appId: "1:1054012487170:web:3b27245c81992785aa591b"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
// Retrieve Firebase Messaging object.
 const messaging = firebase.messaging();
messaging.requestPermission().then(function(){
        console.log('Notification permission granted.');

        if(isTokenSentToServer()){
        	console.log("Token Aready Sent");
        }else{
        getRegisterToken();
    }
      }).catch(function(err){

        console.log('Unable to get permission to notify.');
      });

function getRegisterToken(){
	// Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
messaging.getToken({vapidKey: 'BFz9V9xqGk_IKJWMDjpdTxOHm4lx_zI00zQcW3H2KuZVSPtp7Lc_tgZZ0ZLSHZuwGsBgAricUqK3b_0Q4Y-oi9Q'}).then(function(currentToken){
	saveToken(currentToken);
	console.log(currentToken);
  if (currentToken) {
    sendTokenToServer(currentToken);
    //updateUIForPushEnabled(currentToken);
  } else {
    // Show permission request.
    console.log('No registration token available. Request permission to generate one.');
    // Show permission UI.
    //updateUIForPushPermissionRequired();
    setTokenSentToServer(false);
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  //showToken('Error retrieving registration token. ', err);
  setTokenSentToServer(false);
});
}
function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
  }
function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
      console.log('Sending token to server...');
      // TODO(developer): Send the current token to your server.
      setTokenSentToServer(true);
    } else {
      console.log('Token already sent to server so won\'t send it again ' +
          'unless it changes');
    }

  }
  function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
  }
  function saveToken(currentToken) {
      $.ajax({
      type: 'POST',
      url: "<?=base_url()?>pilot/saveWebToken",
      data:{'token':currentToken},
      success: function(resultData) { 
          console.log(resultData); 
    }
      });

  }
  messaging.onMessage(function(payload) {
   console.log("Message received. ", payload);
   var notificationTitle = payload.data.title;
   const notificationOptions = {
       body: payload.data.body,
       icon: payload.data.icon,
       image: payload.data.image,
       click_action: "https://minitravelagency.com/"+ payload.data.url, // To handle notification click when notification is moved to notification tray
       data: {
               click_action: "https://minitravelagency.com/"+ payload.data.url
           }
     };
   var notification = new Notification(notificationTitle,notificationOptions);
  });
</script>