
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/timeline/vertical-timeline.css">
    <!-- END: Page CSS-->
<div class="app-content content" ng-controller="myCtrlposition">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 ">
            <h1 class="text-white"> future Rides</h1>
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
                <div class="card-body p-2 pb-0">
                <div class="col-md-12 alert alert-info alert-dismissible text-uppercase text-center">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?php
if ($pilot->status!="blocked") {
  echo "You can get to the pickup point for these future rides on appropriate time.And click on 'Pick Up'";
}
else {
 echo "Your vehicle is has been blocked, please contact your Agent.";
}
?>
            </div>  

    <div class="col-md-12 card">
  <div style="display: none;" id="map"></div>
</div>  
<div class="col-md-12">
<?php
$i=0;
foreach ($future_rides as $row) {
  ?>
<div class="container-fluid">
    <b><?= ++$i ?>.
<label>On: </label><b class="text-danger"><?= date('d-M-y, h:i A(D)',strtotime($row->ridingon)) ?></b>
<br>
<label>Source: <b class="text-success"><?= $row->fromaddress ?></b></label>
<br>
<label>Destination: <b class="text-info"><?= $row->toaddress ?></b></label>
<br>
 <b>
    <i class="ft-user"> </i><?php if(empty($row->name)){
   echo "No Name"; }else{ echo $row->name;}?>, <i class="ft-mail"></i>

   <?php if(empty($row->email)){echo "No Email";}else{echo $row->email;}  ?>, <i class="ft-phone"></i><a class="text-danger" href="tel:+91<?= $row->mobile ?>"><?= $row->mobile ?></a></b>
<br><br>
<label class="badge badge-info"><b><?= $row->fair+$row->tax ?> &#8377; </b></label>
<br>

<a type="button" title="view Map" id="viewmapbtn<?= $row->arid ?>" ng-click="view_map(<?= $row->arid ?>,<?= $row->sorcelatitude?>,<?= $row->sorcelongitude ?>,<?= $row->destinationlatitude ?>,<?= $row->destinationlongitude ?>)" class="btn btn-danger btn-sm mr-0.5"><i class="la la-eye text-white"></i></a>
<a type="button"id="viewdirbtn<?= $row->arid ?>" title="View Direction" ng-click="view_direction(<?= $row->arid ?>,<?= $row->sorcelatitude?>,<?= $row->sorcelongitude ?>)" class="btn btn-warning  btn-sm text-white"><i class="la la-road text-white"></i></a>

<?php
if ($i=="1" && $pilot->status!="inuse") {
?>

 <a href="<?= base_url() ?>pilot/reachedtopickup?id=<?= base64_encode($row->arid) ?>" class="btn btn-bg-gradient-x-red-pink btn-danger btn-sm"><i class="la la-flag"></i>Pick-UP</a>
<?php
}
?>
</div>
  <?php
}
?>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-gHE38DViTrpJpwjnj7fObqkbi0Z10dc"></script>
<?php
if ($pilot->status!="blocked") {
  ?>
      <script type="text/javascript">
mylat="";
mylog="";
oldbtn="";
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
  $scope.view_direction=function(id,latitude,longitude)
  {
    $("#viewdirbtn"+oldbtn).html("View Direction");
    oldbtn=id;
    navigator.geolocation.getCurrentPosition(showPosition);
            const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom:18,
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
              query: latitude+","+longitude,
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
  $("#viewdirbtn"+id).html("<i class='la la-refresh text-white'></i>Refresh");
    $("#map").show();
    $("#map").attr("style","width:100%;height:50vh;");
  }
  $scope.view_map=function(id,sorcelatitude,sorcelongitude,destinationlatitude,destinationlongitude)
  {
    var locations = [
      ['PickUp Point', sorcelatitude , sorcelongitude, 1],
      ['Drop Point', destinationlatitude, destinationlongitude, 2]
    ];
        var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(sorcelatitude, sorcelongitude),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    $("#map").show();
    $("#map").attr("style","width:100%;height:50vh;");
  }
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
  }, 5000);
});
      </script>
<?php
}
?>
   
   