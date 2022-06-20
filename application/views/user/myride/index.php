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
      <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url()?>app-assets/angularjs/angular.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>app-assets/js/html2canvas.js"></script>
         <link rel="stylesheet" type="text/css" href="<?=base_url().'app-assets\css'?>\ridedetails.css">
          <style type="">
           @media only screen and (max-width:770px) {
  .bgimage {
    display:none;
  }
}
         </style>
     </head>
     <body >
         <!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->
           <div class="row modal-header">
            <div class="left ptr">
                <div class="backBtn">
                  <a style="text-decoration: none;color: black;" href="<?= base_url().'my-rides' ?>"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="middle">
              <?php
//echo $ride['ride'][0]->id;
//echo $ride['vechicle'][0]->id;
if(empty($adminamount['admintotal']) || $adminamount['admintotal']==='0'){ $amount20='0';$admtotal='0';}else{ $amount20= $adminamount['admintotal']/100*20;$admtotal=$adminamount['admintotal'];}
if ($ride['vechicle'][0]->id=="") {
  echo "Searching Your Cab...";
}
else
{
  echo $ride['vechicle'][0]->vname."(".$ride['vechicle'][0]->vnumber.")";
}
              ?>
            </div>
            <div id="sosContainer" class="ptr" hidden="">SOS</div>
        </div> 
         <div class=" col-md-12" ng-app="plunker" ng-Controller="PayController">
        <div class="row" style="max-height: 100vh;overflow: hidden;"> 
            <div class="col-md-6 mt-5" id="payslipdiv" style="overflow:auto;height:550px;overflow-x: hidden;" > 
  <div id="headerCard" class="card bg-white">

                
                    <div class="row-sm status-row center text value completed">
  <span class="bg-white" hidden=""> - </span> <?= date('D, M d, h:i A',strtotime($ride['ride'][0]->ridingon)) ?>
                      </div>
                    <div class="divider"></div>
                    <div id="mapImage">
                        <!-- <img alt="image rmvd " class="map-img" src=""> -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 600 400" xml:space="preserve">
                            <path fill="#FFFFFF" d="M234.539,148.5v103h130.922v-103H234.539z M354.908,240.33H245.707v-80.661h109.201V240.33L354.908,240.33z"></path>
                            <polygon fill="#FFFFFF" points="251.58,231.643 274.088,207.984 282.521,211.633 309.13,183.308 319.604,195.836 324.329,192.982   349.898,231.643 "></polygon>
                            <circle fill="#FFFFFF" cx="277.582" cy="180.18" r="9.83"></circle>
                        </svg> -->
                    </div>
                <dom-if style="display: none;"><template is="dom-if"></template></dom-if>

                <div class="map-container" hidden="">
                    <div class="divider"></div>
                    <div class="map-holder">
                        <div id="mapContainer"></div>
                        <div class="re-pan act-btns" hidden="">
                       <img srcset="<?=base_url().'app-assets\img\utemp'?>\ic_micro.png" alt="micro">
                        </div>
                    </div>
                </div>
                <div style="transform: translateY(0px)" class="cards-container ptr show-false">
            <div class="card bg-white">
                    <div class="row elastic-row car-row">
                        <div class="left label car-label">
                            <img src="" alt="add a image">
                        </div>

                        <div class="right-relative value text two-lines">
                            <div><?= $ride['ride'][0]->subcat ?></div>
                            <div class="desc"><?php
if ($ride['vechicle'][0]->id!="") 
{
echo $ride['vechicle'][0]->vname;
}
else
{
if ($ride['ride'][0]->dstatus=="cancel") {
echo "your ride is cancel by you.";
}
else
{
  echo "Wait for accept your ride";
}
}
if ($ride['ride'][0]->cstatus=='cancel') {
?>
<i id="cstatus" class="badge badge-danger badge-sm" style="float: right;margin-right: 50px;padding:6px;">Ride Cancelled!</i>

<?php
}
else
{
if ($ride['ride'][0]->cstatus=='complete') 
{
  ?>
  <i class="badge badge-success" style="float: right;margin-right: 40px;margin-top: -10px;">Completed!</i>
  <?php
}
else
{
  if (!empty($ride['ride'][0]->endotp)) 
{
   ?>
    <i style="float: right;margin-right: 40px;padding:5px;margin-top: -10px;" class="badge badge-info">END OTP:<b style="font-size: 12px;"><?= $ride['ride'][0]->endotp ?></b></i>
    <?php


}
?>

<?php if($ride['ride'][0]->dstatus=="waiting")
{ 
?>
    <i style="float: right;margin-right: 40px;padding:5px;margin-top: -10px;" class="badge badge-info">Ride OTP:<b style="font-size: 12px;"><?= $ride['ride'][0]->otp ?></b></i>
    <?php
 }
}
}
?>
</div>
<div class="desc wrap" hidden=""></div>
 </div>
<div style="margin-left: 60%;" class="right text">
<?php
if ($ride['ride'][0]=="waiting") {
?>
<span class="badge badge-warning">Waiting</span>
<?php
}
else if ($ride['ride'][0]=="riding") {
?>
 <span class="badge badge-info">Riding</span>
<?php
}
else if ($ride['ride'][0]=="complete") {
?>
<span class="badge badge-success">Completed</span>
<?php
}
else if ($ride['ride'][0]=="cancel") {
?>
<span class="badge badge-danger">Ride Cancelled by you!! You will get a refund if paid online.</span>
<?php
}
?>
</div>
</div>
                    <div class="divider center"></div>
                    <div class="row">
                        <div class="left label">
                          <i style="margin-left: 30px;" class="fa fa-rupee fa-2x"></i>
                        </div>
                        <div style="" class="right text">
                            <span class="stats-span">₹ <?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?></span>
                        </div>
                    </div>                
                    <div class="divider center mt-3"></div>
                    <div class="row elastic-row address-holder">
                        <div class="left label time"><?= date('h:i A',strtotime($ride['ride'][0]->ridingon)) ?></div>
                        <div class="left label time" hidden="8">PICKUP</div>
                        <div class="right-relative">
                            <div class="dot from"></div>
                            <div class="address wrap"><?= $ride['ride'][0]->fromaddress ?></div>
                        </div>
                    </div>
                    <span style="color: blue;margin-left: 12.5%;font-weight: bolder;">|</span>
                    <div class="row elastic-row address-drop-holder">
                        <div class="left label time"><?= date('h:i A',strtotime($ride['ride'][0]->returndate)) ?></div>
                        <div class="left label time" hidden="8">DROP</div>
                        <div class="right-relative">
                            <div class="dot to"></div>
                            <div class="address wrap"><?= $ride['ride'][0]->toaddress ?></div>
                        </div>
                    </div>
                
            </div>


            <!-- bill/payment breakup details -->
            <div class="card bg-white zig-zag-true">
                <div class="payment-section">
                    
                        <div class="pay-title desc bold">
                            Bill Details
                        </div>
                        
                            <div class="dotted-border">
                                
                                    <div class="row-sm xs ">
                                        <div class="pay-label">
                                            Your Trip ID : <b class="badge text-info">TRIP-<?= $ride['ride'][0]->id ?></b>
                                            <span>Icon rmved</span>
                                        </div>
                                        <div class="pay-value">₹ <?= $ride['ride'][0]->fair ?></div>
                                    </div>
                                    <div class="sub-text" hidden="">
                                        
                                    </div>
                               
                                <div class="divider"></div>
                            </div>
                        
<!--                             <div class="dotted-border">
                                
                                    <div class="row-sm xs ">
                                        <div class="pay-label">
                                            Rounded Off
                                        Icon rmvd
                                        </div>
                                        <div class="pay-value">- ₹ 0.08</div>
                                    </div>
                                    <div class="sub-text" hidden="">
                                        
                                    </div>
                              
                                <div class="divider"></div>
                            </div> -->
                        
                            <div class="dotted-border">
                                
                                    <div class="row-sm xs bold">
                                        <div class="pay-label">
                                            Total Bill
                                           
                                           <i class="fa fa-money"></i>
                                        </div>
                                        <div class="pay-value"><?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?></div>
                                    </div>
                                    <div class="sub-text">
                                        Includes ₹ <?= $ride['ride'][0]->tax ?> Taxes
                                    </div>
                                    <div class="sub-text" hidden="">
                                    </div>
                                <div class="divider"></div>
                              </div>                        
                            <div class="dotted-border">                                
                                    <div class="row-sm xs bold">
                                        <div class="pay-label">
                                            Total Payable
  Icon rmvd
                                        </div>
                                        <div class="pay-value">₹ <?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?></div>
                                    </div>
                                    <div class="sub-text" hidden="">
                                        
                                    </div>
                               
                                <div class="divider"></div>
                            </div>
<?php
if ($ride['ride'][0]->payment=="unpaid" && $ride['ride'][0]->cstatus!="cancel") {
  ?>
                            <div class="dotted-border">
                                
                                    <div class="row-sm xs bold">
                                        <div class="pay-label" ng-click="show_coupan_box()">
                                            Apply coupan code ?
                                           
                                           <i class="fa fa-cog"></i>
                                        </div>
                                        <div class="pay-value" ng-hide="coupan_box">
                                          <input type="text" class=""placeholder="Enter Coupoun Code" id="textbox" ng-model="c_code" ng-change="check_coupoun()">
                                      </div>
                                    </div>
                                    <div class="sub-text">
                                      <p class="text-danger" ng-hide="coupan_msg">Enter a valid Coupoun Code to get discount.</p>
                                      <p class="text-success" ng-hide="applied_msg">Coupoun Applied Successfully</p>
                                    </div>
                                    <div class="sub-text" hidden="">
                                    </div>
                                <div class="divider"></div>
                              </div> 


                              <?php
                                  if($walletaccess>1)
                                  {
                            ?>
                              <div ng-hide="walletaccess" class="dotted-border">
                                
                                    <div class="row-sm xs bold">
                                        <div class="pay-label">
                <input type="checkbox" name="b1" ng-model="usewallet" ng-change="walletfunc()"> Use Wallet
                                           <i class="fa fa-wallet"></i>
                                        </div>

                                    </div>
                                  <div class="pay-value">
                                          - {{usewalletamount}}
                                        </div>
                                    <div class="sub-text">
                                         Avilable Balance ₹ {{walletbalace}} 
                                    </div>
                                    <div class="sub-text" hidden="">
                                    </div>
                                <div class="divider"></div>
                              </div>
                             
                
  <?php
}
}

?>
                     
                    
                        <div class="pay-title desc bold">
                            Payment
                        </div>
                        
                            <div class="dotted-border" style="margin-top: -40px;">
<?php
if ($ride['ride'][0]->payment=="paid") {
?>
                                <div class="row-sm xs ">
                                        <div class="pay-label">
<i class="badge badge-success">Paid <?= $ride['ride'][0]->ptype ?></i>
<i class="badge badge-info">Wallet Used: <?= $ride['ride'][0]->wallet_pay ?></i>
                                            Icon rmvd
                                        </div>
                                        <div class="pay-value">₹ <?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?></div>
                                    </div>
<?php
}
else if($ride['ride'][0]->payment=="unpaid")
{
    ?>

<div  style="padding-bottom: 50px;" class=" row-sm xs ">
                                        <div class="pay-label">
                                            <br>
<?php
if ($ride['ride'][0]->cstatus==='waiting') {
?>
<button id="cancelbtn" ng-click="cancel_ride(<?= $ride['ride'][0]->id ?>)"  type="button" class="btn btn-sm btn-danger">Cancel Ride</button>
<?php
}
else if ($ride['ride'][0]->cstatus==='cancel') {
    
}
else
{
?>
<button id="payonline" ng-click="paynow()" type="button" class="btn btn-sm btn-warning">Pay Now ₹ {{tamount}}</button>
<button id="paywallet" ng-click="paywithwallet()"  type="button" class="btn btn-sm btn-warning">Use Wallet</button>
<br>
<span id="otperror" class="text-danger"></span>

<?php
}
?>
                                           <br>
                                               </div>
                                               <br>
                                    </div>
   <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php
}
?>                              <div class="divider mt-3"></div>
                            </div>
                 <script type="text/javascript">
 var app=angular.module('plunker',[]);
  app.controller('PayController',function($scope,$http){
     $scope.coupan_msg = true;
      $scope.pwc=true;
      $scope.otpbox=true;
      $scope.applied_msg = true;
      $scope.coupan_box=true;
      $scope.usewalletamount=0;
      $scope.usewallet=false;
      $scope.c_code="";
      $scope.newwalletamt="";
      $scope.debitedamt="";
      $scope.trnsby="";
      $('#paywallet').hide();
      $scope.cancel_ride= function(id){
          $('#cancelbtn').html('<i class="fa fa-spinner fa-spin"></i> please wait..');
          $('#cancelbtn').attr('disabled','true');
          $http({
      method:"POST",
      url:"<?= base_url() ?>user/sorry_ride",
      data:{'id':id}
    }).then(function(responce){
        if(responce.data){
             location.reload();
        }
        else{
            $('#cancelbtn').html('Cancle Ride');
          $('#cancelbtn').removeAttr('disabled');
            alert('failed cancel');
        }
    })
      }
      $scope.show_coupan_box=function()
      {
        $scope.coupan_box=false;
      }
      $scope.pamount='<?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?>';
    $scope.tamount='<?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?>';
  $scope.check_coupoun = function(){
   var total_fair = '<?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?>';
  if ($scope.c_code!=null||$scope.c_code!="") 
  {
   // alert($scope.c_code);
   $http({
      method:"POST",
      url:"<?= base_url() ?>user/check_coupoun",
      data:{'name':$scope.c_code}
    }).then(function(responce){
//      alert(responce.data);
      if(responce.data != ''){
      coupanid = responce.data[0].id;
      var disc = responce.data[0].discount;
      $scope.coupan_msg = true;
      $scope.applied_msg = false;
      //discount calculate here
      var a=total_fair/100*disc;
      var payable_amount=total_fair-a;
      $scope.tamount=payable_amount.toFixed(2);
      // alert(payable_amount);
   }
   else
   {
      $scope.tamount = '<?= $ride['ride'][0]->fair+$ride['ride'][0]->tax ?>';
      $scope.coupan_msg = false;

      $scope.applied_msg = true;
   }
});
  }
  else
  {
    alert("invaid as");
  }
}

$scope.get_wallet=function()
{
    $http({
      url:"<?= base_url() ?>payment/get_amount",
    }).then(function(responce){
      if (responce.data<=0) {
        $scope.walletaccess=true;
       
        $
      }
      $scope.walletbalace=responce.data;
    });
}
$scope.get_wallet();

$scope.walletfunc=function()
{
  if($scope.usewallet===true)
  { 
    //   alert(parseInt(amount20));
   $('#paywallet').hide();
     $('#payonline').show();
    if(parseInt($scope.tamount)<=parseInt(<?php if(empty($useramount['usertotal'])){ echo '0';}else{echo $useramount['usertotal'];}?>))
    {  
      $('#paywallet').hide();
       $('#payonline').show();
       
       $scope.tamount=parseInt($scope.tamount)-parseInt($scope.tamount);
       $scope.newwalletamt=parseInt(<?=$useramount['usertotal']+$admtotal?>)-parseInt($scope.tamount);
       $scope.debitedamt=parseInt($scope.tamount);
       $scope.trnsby='';
       $scope.usewalletamount=$scope.tamount;
    }
    else if(parseInt(<?=$amount20?>)<= parseInt(<?=$admtotal?>))
    {
        $('#paywallet').hide();
       $('#payonline').show();
       $scope.tamount=parseInt($scope.tamount)-parseInt(<?=$amount20?>);
       $scope.newwalletamt=parseInt(<?=$useramount['usertotal']+$admtotal-$amount20?>);
       $scope.debitedamt=parseInt(<?=$amount20?>);
       $scope.trnsby='ADMIN';
       $scope.usewalletamount=<?=$amount20?>;
    }
    else
    {
      $('#paywallet').show();
      $('#payonline').hide();
     $scope.usewalletamount=$scope.tamount;
    $scope.tamount=$scope.tamount-$scope.walletbalace;
    }
  }
  else
  { 
    
    $('#paywallet').hide();
     $('#payonline').show();
     $scope.tamount=$scope.pamount;
     $scope.usewalletamount=0;
   
  }
}
$scope.paywithwallet=function()
{
  $http({
        method: 'POST',
        url: '<?= base_url() ?>user/allpaywallet',
        data: {'rid':"<?= $ride['ride'][0]->id ?>",'amount' : $scope.tamount,'usewallet': $scope.usewalletamount
},}).then(function(responce){
        console.log(responce.data);
        if (responce.data['status']) 
        {
          location.reload();
        }
        else
        {
 location.reload();
        }
  });
}



  $scope.paynow = function(){
//alert("asd");
alert($scope.usewallet);
    $http({
        method: 'POST',
        url: '<?= base_url() ?>payment/pay',
        data: {'amount' : $scope.tamount,'name': 'name'
},}).then(function(responce){
        // var razorpayOrderId = responce.data;
       // console.log(responce.data);
        var options = responce.data;
        options.handler = function (response){
    $http({
            method: 'POST',
            url: '<?= base_url() ?>payment/verifypay',
            data: {coupanid:$scope.c_code,'razorpay_payment_id': response.razorpay_payment_id ,'razorpay_signature': response.razorpay_signature, 'totalAmount' : $scope.tamount, 'type' : '<?= $ride['ride'][0]->type ?>', 'payment': 'paid', 'ptype': 'online','vid':'<?= $ride['vechicle'][0]->id ?>','id':'<?= $ride['ride'][0]->id ?>','usingwallet':$scope.usewallet,'newwalletamt':$scope.newwalletamt,'trnsby':$scope.trnsby,'debitamt':$scope.debitedamt}
                }).then(function(responce){
                   console.log(responce.data);
                  //            window.location.href = '<?= base_url() ?>'+responce.data;
            });
};
  
  var rzp1 = new Razorpay(options);
  rzp1.open();
  // e.preventDefault();
  });
  }
  });

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>    

                </div>
            </div>
            

            <div class="card bg-white permissions pb-2"> 

              
                 <div class="row ptr">
                        <div class="left text label">
                             <i class="fa fa-phone"></i>
                        </div>
<div class="right text value">
<a style="text-decoration: none;color: black;" href="tel:+918789882539">Call Support</a>
</div>

<?php
if ($ride['ride'][0]->payment=="paid") {
  ?>
  <!--<div style="margin-top: 45px;" class="left text label">-->
  <!--                           <i class="fa fa-download fa-2x"></i>-->
  <!--                      </div>-->
<!--<div style="margin-top: 45px;" class="right text value">-->
<!--<a id="downloadlink" download="reciept<?= $ride['ride'][0]->id ?>.PNG" style="text-decoration: none;color: black;">Download Reciept</a>-->
<!--</div>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript">
  var captureme=document.getElementById('payslipdiv');
 html2canvas(captureme).then(function(canvas) {
    document.body.appendChild(canvas);
    canvas.setAttribute("id","captured");
    canvas.setAttribute("style","display:none;");
var canvas = document.getElementById("captured");
var img    = canvas.toDataURL("image/png");
downloadlink=document.getElementById("downloadlink");
downloadlink.href=img;
   });


</script>
  <?php
}

?>
</div>
                    <div class="divider mt-3"></div>
                           </div>

         <br><br><br><br>
        </div>
            </div>     
                  </div>
        <div class="col-md-6 bgimage" style="padding: 0px;margin-top: -20px;"> 
            <div class="img-cover">
          <img src="<?=base_url().'app-assets\img\utemp'?>\bg-cover.jpg"  class="img img-responsive">
        </div>   
        </div> 

        </div>
    </div>
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