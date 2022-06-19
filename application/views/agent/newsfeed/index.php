
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/timeline/vertical-timeline.css">
    <!-- END: Page CSS-->
<div class="app-content content" ng-controller="myCtrlposition">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 ">
            <div  class="row" id="messagebar">
<div class="col-md-12 alert alert-info alert-dismissible text-uppercase text-center">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php
if ($pilot->status=="verify") {
    echo '<script type="text/javascript">
  alert("Your vehicle is in verification!!");
  window.location.href="<?= base_url() ?>pilot/";
</script>';
}
else if ($pilot->status=="blocked") {
  echo '<script type="text/javascript">
  alert("Your vehicle is has been blocked, please contact your Agent.");
  window.location.href="<?= base_url() ?>pilot/";
</script>';
}
else if ($pilot->status=="free") {
  echo "please wait for a Customer to create a ride and accept it to get a ride.";
}
else if ($pilot->status=="inuse") {
  echo '<script type="text/javascript">
  alert("You are in use please be on home page to serve the current customer.");
  window.location.href="<?= base_url() ?>pilot/";
</script>';
}
?>
</div>
</div>
          </div>
         
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
           
                
            <div class="card-content collapse show">
                 <div class="card-header">
                
        
                <h4 class="card-title">Your Rides</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
                <div class="card-body p-0 pb-0" id="ridefeedsdiv">

               <?=$ridefeeds;?>
                   
                </div>
            </div>
        </div>
    </div>
     
</div>
</div>
</div>
</div>
</div>
   
    <!-- END: Page JS-->
    <script type="text/javascript">
  function accept(id) {
    $.ajax({
      url:'<?= base_url() ?>pilot/accept_ride',
      method:"POST",
      data:{id:id},
      success:function(data)
      {
        res=JSON.parse(data);
//        alert(res['message']);
        if (res['status']) 
        {
          $("#ridediv"+id).slideUp(500);
        //  $("#messagebar").html("");
          $("#messagebar").html("<div class='col-md-12 alert alert-success alert-dismissible text-uppercase text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+res['message']+"</div>");
        }
        else
        {
          $("#ridediv"+id).slideUp(500);
        //  $("#messagebar").html("");
          $("#messagebar").html("<div class='col-md-12 alert alert-danger alert-dismissible text-uppercase text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+res['message']+"</div>");
        }
      }
    });
  }
mylat="";
mylog="";
function showPosition(position){
  mylat= position.coords.latitude;
  mylog= position.coords.longitude;
    }
  var app = angular.module('agent', []);
app.controller('myCtrlposition', function($http, $interval,$scope) {
  $scope.lattitude="";
  $scope.longitude="";
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
    $http({
    method:"POST",
    url:"<?= base_url() ?>pilot/get_ride_feed",
      data:{'id':<?= $pilot->id ?>, 'demail':'<?= $pilot->demail ?>','lattitude':$scope.lattitude,'longitude':$scope.longitude}
    }).then(function(responce){
      $("#ridefeedsdiv").html(responce.data);
//      console.log(responce.data);
    });
  }, 7000);
});
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
      </script>