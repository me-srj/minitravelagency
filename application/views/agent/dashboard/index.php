<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-gHE38DViTrpJpwjnj7fObqkbi0Z10dc"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/timeline/vertical-timeline.css">
    <!-- END: Page CSS-->

<div class="app-content content" ng-controller="myCtrlposition">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 ">
            <div class="alert alert-info pt-2 alert-dismissible text-uppercase text-center">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php
if ($pilot->status=="verify") {
 echo "<h6 class='text-white'>Your vehicle is in verification!!</h6>";
}
else if ($pilot->status=="blocked") {
  echo " <h6 class='text-white'>Your vehicle is has been blocked, please contact your Agent.</h6>";
}
else if ($pilot->status=="free") {
  echo "<h6 class='text-white'>please wait for a Ride to get active, Check future rides <a href='pilot/future_rides' class='btn btn-bg-gradient-x-orange-yellow  btn-sm text-white'>here</a></h6>";
}
else if ($pilot->status=="inuse") {
  echo "<h6 class='text-white'>Your'r serving....please don't leave this page.</h6>";
}
?>
            </div>
        
          </div>
         
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
           
                
            <div class="card-content collapse show">
                 <div class="card-header">
                
        
                <h6 class="card-title">Dashboard</h6>

                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
                <div class="card-body p-2 pb-0" id="ridefeedsdiv">
                    
          <div class="row card">
  <?php
if ($pilot->status=="verify") {
 ?>
  <div class="col-md-12 badge badge-info">Your vehicle is in verification!!</div>
<?php
}
else if ($pilot->status=="blocked") {
 ?>
  <div class="col-md-12 badge badge-danger">Your vehicle is has been blocked, please contact your Agent.</div>
<?php
}
else if ($pilot->status=="free") {
?>
  <div class="col-md-12 p-2 badge badge-info"><h3 class="text-white">Welcome Mini Travel's </h3></div>
<?php
}
else if ($pilot->status=="inuse") {
 ?>
 <?php
if (!empty($this->session->flashdata('otp_message'))) {
?>
<div class="badge-info badge"><?= $this->session->flashdata('otp_message'); ?></div>
<?php
}
 ?>

<div class="row">
    <div class="col-md-6">
        <ul>
            <li>ON:<?= date('d-M-y, h:i A(D)',strtotime($current_ride[0]->ridingon)) ?></li>
            <li>WITH:<?php if(!empty($current_ride[0]->name)){
    echo $current_ride[0]->name;
  }
  else{
    echo $current_ride[0]->mobile;

  } ?></li>
            <li>FROM:<?= $current_ride[0]->fromaddress ?></li>
            <li>To:<?= $current_ride[0]->toaddress ?></li>
            <li style="font-size: 18px;" class="badge badge-info">&#8377 <b><?= $current_ride[0]->fair+$current_ride[0]->tax ?></b></li>
        </ul>
        
    </div>
     <div class="col-md-6">
        <?php
if ($current_ride[0]->dstatus==="waiting") {
?>
         <form method="POST" action="pilot/accept_otp">
            <div class="form-group col-12">    
  <label>Enter OTP From Customer</label>
  <input type="text" required="" name="otp" class="form-control">
  <input type="hidden" value="<?= base64_encode($current_ride[0]->arid) ?>" name="id">
  </div>
  <div class="form-group text-center">  
    <input type="submit" name="start" value="Start The Journey" class="btn btn-info">
    </div>
</form>

<?php
}
else if ($current_ride[0]->dstatus=="accepted") {
?>
<div class="col-md-12">
  <div id="map">
      
  </div> 
  <br>  
<center><button id="show_map_btn" class="btn btn-info btn-sm" ng-click="show_map(<?= $current_ride[0]->destinationlatitude ?>,<?= $current_ride[0]->destinationlongitude ?>)">Show Map</button>
<?php
if ($current_ride[0]->payment==="unpaid") {
?>
<?php
if (!empty($current_ride[0]->wcotp)) {
?>
<div class="alert alert-info mb-1 mt-2 text-center">please tell <b class="text-danger"><?= $current_ride[0]->wcotp ?></b> OTP to customer. If the user want to use Wallet + Cash!! OTP generated <?php
$datetime1 = new DateTime("now");//start time
$datetime2 = new DateTime($current_ride[0]->upon);//end time
$interval = $datetime1->diff($datetime2);
$time= array('year' => $interval->format('%Y'),'month'=>$interval->format('%m'),'day'=>$interval->format('%d'),'hour'=>$interval->format('%H'),'minute'=>$interval->format('%i'),'second'=>$interval->format('%s'));
if ($time['hour']!="00") {
  echo $time['hour']." Hours ago";
}
else
{
if ($time['minute']!="0") {
  echo $time['minute']." Minutes ago";
}
else
{
  echo $time['second']." Seconds ago";  
}
}
//echo strtotime(date("Y-m-d h:i:s A",strtotime($current_ride[0]->upon)))."<br>";
//echo strtotime(date("Y-m-d h:i:s A"));
// $diff=(strtotime(date("Y-m-d h:i:s A"))-strtotime($current_ride[0]->upon));
//echo $diff/60;
?> Min Ago.</div>
<br>
<?php
}
?>
<button onclick="$(this).hide();$('#payment_btn').slideDown(500)" class="btn btn-warning btn-sm">Accept Cash? &#8377 <?= $current_ride[0]->fair+$current_ride[0]->tax ?></button>
<button style="display: none;" id="payment_btn" class="btn btn-primary btn-sm" ng-click="accepted_cash(<?= $current_ride[0]->arid ?>)">Mark as accepted.</button>
<?php
}
else
{
  ?>
 <button onclick="$(this).hide();$('#completerideform').slideDown(500)" class=" btn btn-sm  btn-danger">Complete Ride.</button>
  <?php
}
?>
<div style="display: none;" id="completerideform" class="row">
 <div class="col-md-12">
   <center>
   <form action="pilot/complete_ride_otp" method="POST">
    <div class="form-group">    
       <label>Ask the user for OTP:</label>
   <input type="hidden" value="<?= base64_encode($current_ride[0]->arid) ?>" name="id">
   <input type="text" required="" name="otp" class="form-control" >
   </div>
    <div class="form-group"> 
   <input type="submit" name="sub" class="btn btn-warning btn-sm">
</div>
 </form>
 </center>
 </div>
</div>
     </div>
</div>  
  


</div>
<?php
}
else
{
?>
<div class="alert alert-success">Ride Completed!!</div>
<?php
}

}
?>          
          </div>

                </div>
            </div>
        </div>
         <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-purple-red">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="icon-opacity text-white font-large-4 float-left">₹</i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                <span class="d-block mb-1 font-medium-1">Total Income</span>
                                <h1 class="text-white mb-0"><?php if(empty($get_income->totalincome)){
                                  echo "₹ 0";
                                }else{echo '₹'.$get_income->totalincome;}?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-blue-green">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="la la-money icon-opacity text-white font-large-4 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                <span class="d-block mb-1 font-medium-1">Completed Ride</span>
                                <h1 class="text-white mb-0"><?=$get_booking->totalbooking;?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-x-yellow">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-top">
                                <i class="la la-car icon-opacity text-white font-large-4 float-left"></i>
                            </div>
                            <div class="media-body text-white text-right align-self-bottom mt-3">
                                <span class="d-block mb-1 font-medium-1">Future Ride</span>
                                <h1 class="text-white mb-0"><?=$get_fbooking->totalfbooking;?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>
    </div>
     
</div>
</div>
</div>
</div>
</div>
<?php
if ($pilot->status!="blocked") {
  ?>
  </div>
<script type="text/javascript">
mylat="";
mylog="";
function showPosition(position){
  mylat= position.coords.latitude;
  mylog= position.coords.longitude;
    }
  var app = angular.module('agent', []);
  app.controller('myCtrl',function($scope,$http)
  {
  $scope.change_status = function(type,value,ele,oele){
$(ele).hide();
    $http({
      method:"POST",
      url:"<?= base_url() ?>pilot/changestat",
      data:{'type':type, 'value':value}
    }).then(function(responce){
 // alert(responce.data);
       if (responce.data['status']) 
      {
$(oele).show();
      }
      else
      {
$(ele).show();
      }
    });
  };
  });
app.controller('myCtrlposition', function($http, $interval,$scope) {
  $scope.lattitude="";
  $scope.longitude="";
  $scope.accepted_cash=function(id)
  {
    if (confirm("Click OK to mark as accepted!!")) 
    {
      $("#payment_btn").hide();
    $http({
      method:"POST",
      url:"<?= base_url() ?>pilot/accept_payment",
      data:{'id':id}
    }).then(function(responce){
    //alert(responce.data);
    if (responce.data['status']) 
    {
      window.location.reload();
    }
    else
    {
      $("#payment_btn").show();
      alert(responce.data['message']);
    }
    });
    }
  }
  $scope.show_map=function(lati,longi)
  {
        navigator.geolocation.getCurrentPosition(showPosition);
            const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: {
            lat: mylat,
            lng:  mylog,
          },
        });
         directionsRenderer.setMap(map);
function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route(
          {
            origin: {
              query: mylat+","+mylog,
            },
            destination: {
              query: lati+","+longi,
            },
            travelMode: google.maps.TravelMode.DRIVING,
          },
          (response, status) => {
            if (status === "OK") {
              directionsRenderer.setDirections(response);
            } else {
              console.log("Directions request failed due to " + status);
            }
          }
        );
      }
       calculateAndDisplayRoute(directionsService, directionsRenderer);
    $("#map").show();
    $("#map").attr("style","width:100%;height:50vh;");
    $("#show_map_btn").html("Referesh");
  }
  $interval(function () {
    navigator.geolocation.getCurrentPosition(showPositioncurre);
    function showPositioncurre(position){
       $scope.lattitude=position.coords.latitude;
  $scope.longitude=position.coords.longitude;
  mylat=position.coords.latitude;
mylog=position.coords.longitude;
    }
    $http({
      method:"POST",
      url:"<?= base_url() ?>pilot/change_position",
      data:{'id':<?= $pilot->id ?>, 'demail':'<?= $pilot->demail ?>','lattitude':$scope.lattitude,'longitude':$scope.longitude}
    }).then(function(responce){
      //console.log(responce.data);
    });
  }, 7000);
});
      </script>
<?php
}
?>

   
    