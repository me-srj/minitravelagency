<?php
 $single_car[0]->rpkm;
  $distance=$this->session->userdata('booking_deatils')['distance'];
 $total_fair=$payamt;
 $bookdate=$this->session->userdata('booking_deatils')['booking_date'];
 if(empty($bookdate)){
   $bookdate=date('Y-m-d H:i:s', time());
 }
 $returndate=$this->session->userdata('booking_deatils')[0];
 if(!empty($returndate)){
  $type='twoway';
 }
 else{
  $type='oneway';

 }
 $car_id=base64_decode($this->session->userdata('car_id'));
 $customer_id=$this->session->userdata('customer')['id'];
?> 

 <!-- Breadcromb Area Start -->
      <section class="gauto-breadcromb-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcromb-box">
                     <h3>Pay Section</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="index.html">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Payment</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcromb Area End -->
       
       
      <!-- Car Booking Area Start -->
      <section class="gauto-car-booking section_70">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="car-booking-image">
                     <!-- <img src="<?= base_url()?>app-assets/images/agent/vehicle_photo/" alt="car" /> -->
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="car-booking-right">
                    

                     <h3><?=$single_car[0]->subcategory;?>
                       <!-- <img src="<?= base_url()?>app-assets/images/agent/vehicle_photo/" style="height:50px;width:50px;border-radius:50%;" class="img img-thumbnail" title=" Driver Name: <?= $single_car[0]->dname ;?>" alt="Driver Photo Not Found"> -->
                     </h3>
                     <div class="price-rating">
                        <div class="price-rent">
                           <h4><span>  ₹  </span><?=$total_fair?></h4>
                        </div>
                        <!-- <div class="car-rating">
                           <ul>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star-half-o"></i></li>
                           </ul>
                           <p>(123 rating)</p>
                        </div> -->
                     </div>
                    
                      <div class="car-features clearfix">
                        <ul>
                           <li><i class="fa fa-lock"></i>Complete security </li>
                           <li><i class="fa fa-car"></i>Comfort Ride</li>
                         
                        </ul>
                        <ul>
                           <li><i class="fa fa-female"></i>Women safety </li>
                           <li><i class="fa fa-cogs"></i> Experienced Driver </li>
                          
                        </ul>
                        <ul>
                           <li><i class="fa fa-eye"></i> GPS Navigation</li>
                           <li><i class="fa fa-lock"></i> Anti-Lock Brakes</li>
                          
                        </ul>
                     </div>
                      
                  <div class="booking-right">
                     <!--<h3>payment Method</h3>-->
                     <div class="gauto-payment clearfix">
                        <form ng-submit="FormSubmit()">
                        
                      
                        <!--<div class="payment">-->
                        <!--   <input type="radio" ng-click="payment_mode('s-option')" id="s-option" ng-model="selector" value="0">-->
                        <!--   <label for="s-option">Online Payment</label>-->
                        <!--   <div class="check">-->
                        <!--      <div class="inside"></div>-->
                        <!--   </div>-->
                        <!--   <img src="<?= base_url()?>app-assets/assets/img/master-card.jpg" alt="credit card">-->
                        <!--</div>-->
                        <div class="payment" style="display:none;>
                           <input type="radio" ng-click="payment_mode('t-option')" class="paylater" id="t-option" ng-model="selector" checked value="1">
                           <label for="t-option">Pay later (cash/online)</label>
                           <div class="check">
                              <div class="inside"></div>
                           </div>
                        </div>
                         <!--<a type="button" id="coupan_link" style="color:#ec3323;" href ng-click="coupan_area()" ng-show="coupan_a">Do You Have Coupon Code?</a>-->
                        <div class="payment">

                           <div class="account-form-group" ng-hide="coupan">
                           <input type="text" placeholder="Enter Coupoun Code" id="textbox" ng-model="c_code" ng-change="check_coupoun()">
                         <p class="text-danger" ng-hide="coupan_msg">Invalid Coupoun Code</p>
                           <p class="text-success" ng-hide="applied_msg">Coupoun Applied Successfully</p>
                        </div>

                        </div>
                     </div>
                     <div class="action-btn pt-4">
                        <!-- <input type="text" ng-model="coupanid" value="{{coupanid}}" hidden > -->
                        <!-- <input type="text" ng-model="fair" value="{{tamount}}" hidden require>
 -->                       <!--  <input type="text" name="type" value="oneway" hidden required> -->
                       
                     </div>
                      <!--<button type="submit" id="payment_button" class="gauto-theme-btn">Pay Rs {{tamount}}</button>-->
                      <button type="submit" id="payment_button" class="gauto-theme-btn">Confirm Booking</button>
                  </div>
               
</form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Car Booking Area End -->
      <style type="text/css">
   #textbox{
      border:none;
      border-bottom:2px solid #ec3323;
   }
   
</style>
       
       
      <!-- Booking Form Area Start -->
      <section class="gauto-booking-form section_70">
         <div class="container">
            <div class="row">
              <div class="col-lg-4"></div>
              
               </form>
               <div class="col-lg-4"></div>
            </div>
         </div>
      </section>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <!-- Booking Form Area End -->
      <script>
         var app=angular.module('plunker',[]);
  app.controller('MainCtrl',function($scope,$http){
      $scope.selector="1";
      
$scope.coupan = true;
$scope.coupan_a = true;
$scope.coupan_msg = true;
$scope.applied_msg = true;
$scope.tamount = '<?=$total_fair?>';
 var base_fair='<?= $base_fair?>';
var coupanid = '';
$scope.coupan_area = function(){
   $scope.coupan = false;
   $scope.coupan_a = false;
}
$scope.payment_mode=function(ele) {
    if($("#"+ele).val()=="0")
    {
      $("#textbox").val("");
      $("#textbox").show();
      $("#coupan_link").show();
    }
    else
    {
      $scope.tamount = '<?=$total_fair?>';
    $("#coupan_link").hide();
    $("#textbox").hide();
    $("#textbox").val("");
    $scope.applied_msg=true;
    }
  }
$scope.check_coupoun = function(){
   var total_fair = '<?=$total_fair?>';
  if ($scope.c_code!=null||$scope.c_code!="") 
  {
    // alert($scope.c_code);
   $http({
      method:"POST",
      url:"<?= base_url() ?>user/check_coupoun",
      data:{'name':$scope.c_code}
    }).then(function(responce){
    //   alert(responce.data);
      if(responce.data != ''){
      var coupanid = responce.data[0].id;
      var disc = responce.data[0].discount;
      $scope.coupan_msg = true;
      $scope.applied_msg = false;
      //discount calculate here
      var a=total_fair/100*disc;
      var payable_amount=total_fair-a;

      $scope.tamount=payable_amount.toFixed(2);
      // alert(payable_amount);
   }
   else{
      $scope.tamount = '<?=$total_fair?>';
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
$scope.FormSubmit = function(e)
{
   if($scope.selector=='0')
   {  
       
    // alert($scope.tamount);
      var type ='<?=$type;?>';

      $http({
        method: 'POST',
        url: '<?= base_url() ?>payment/pay',
        data: {'amount' : $scope.tamount,'name': '<?=$single_car[0]->subcategory;?>'
},
      }).then(function(responce){
        // var razorpayOrderId = responce.data;
        console.log(responce.data);
        var options = responce.data;
        options.handler = function (response){
    $http({
            method: 'POST',
            url: '<?= base_url() ?>payment/verify',
            data: {'razorpay_payment_id': response.razorpay_payment_id ,'razorpay_signature': response.razorpay_signature, 'totalAmount' : $scope.tamount, 'coupanid' : coupanid, 'type' : type, 'payment': 'paid','bookdate':'<?=$bookdate;?>','returndate':'<?=$returndate?>','base_fair':base_fair , 'ptype': 'online' }
                }).then(function(responce){
                  // alert(responce.data);
             window.location.href = '<?= base_url() ?>'+responce.data;
            });
};
  
  var rzp1 = new Razorpay(options);
  rzp1.open();
  // e.preventDefault();
  })
   }
   else if($scope.selector=='1'){
       $("#overlay").fadeIn();
      var type ='<?=$type;?>';
      $http({
            method: 'POST',
            url: '<?= base_url() ?>payment/paylater',
    data: {'razorpay_payment_id': 'null', 'totalAmount' : $scope.tamount,'bookdate':'<?=$bookdate;?>','returndate':'<?=$returndate?>' ,'coupanid' : coupanid, 'type' : type,'base_fair':base_fair,'payment': 'unpaid', 'ptype': 'null'}
                }).then(function(responce){
                  // alert(responce.data);
                $("#overlay").fadeOut();
              window.location.href = '<?= base_url() ?>'+responce.data;
            });
   }
   else{
       $("#overlay").fadeOut();
      alert('select payment method');
   }
}
});
        
     
      </script>