    <!-- Header -->    <!-- Header -->
     <div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Agents</li>
                </ol>
              </nav>
            </div>
          </div>
          </div>
          </div>
          </div> 
          <!-- Card stats -->
          <div class="container-fluid mt--6" ng-app="myapp" ng-controller="myCtrl">
          <div class="row">
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
<center>              <div class="dabge col-md-12" id="messagediv"></div></center>
              <table class="table file-export align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Vehicle Name</th>
                    <th>Vechile Number</th>
                    <th>Insuarance Number</th>
                     <th>Vechile Photo</th>
                    <th>Insuarance Photo</th>   
                    <th>Driver</th>
                    <th>License Number</th>
                    <th>License Photo</th>
                   <th>Driver Experience</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
$i=1;
foreach ($agents_details as $agent) {
 ?> 
 <tr>
  <td><?= $i++; ?></td>
  <td> <?= $agent->vname ?></td>
   <td> <?= $agent->vnumber ?></td>
    <td> <?= $agent->vregistrationnumber ?></td>
    <td><a target="_blank" class="badge badge-info" href="<?= base_url() ?>app-assets\images\agent\vehicle_photo\<?= $agent->vphoto ?>"><span class="fa fa-eye"></span></a></td>
    <td><a target="_blank" class="badge badge-info" href="<?= base_url() ?>app-assets/images/agent/driver_photo/<?= $agent->dimage ?>"><span class="fa fa-eye"></span></a></td>
  <td><?= $agent->dname ?><br><?= $agent->demail ?><br><?= $agent->dmobile ?></td>
   <td> <?= $agent->dlicence_number ?></td>
  <td><a target="_blank" class="badge badge-info" href="<?= base_url() ?>app-assets\images\agent\driver_doc\<?= $agent->dlicence_doc ?>"><span class="fa fa-eye"></span></a></td>
   <td><?= $agent->dexperience ?>yrs</td>
    <th>
    <?php
if ($agent->status=='blocked') {
?>
<a class="btn btn-danger btn-sm" id="agent<?= $i ?>"  href="#">Blocked</a>
<?php
}
else if($agent->status=='verify')
{
?>
<a class="btn btn-sm btn-warning" id="agent<?= $i ?>"  href="#">In Verification</a>
<?php
}
else if($agent->status=='inuse')
{?>
<a class="btn btn-sm btn-warning" id="agent<?= $i ?>"  href="#">In Verification</a>
<?php
}
else
{
  ?>
<a class="btn btn-success btn-sm" id="agent<?= $i ?>"  href="#">Active!</a>
  <?php
}
    ?>
  </th>
  <td><button class="btn btn-info btn-sm" ng-click="get_location(<?= $agent->id ?>)">View</button></td>
  <td>
    <select class="form-control" ng-model="selectedItem[<?= $agent->id;?>]" ng-change="update(<?= $agent->id;?>)" style="width:80px;">
      <?php if ($agent->status=='blocked') {
       echo "<option value='free'>Unblock</option>";
    }
    elseif($agent->status=='verify'){
      echo "<option value='free'>Verify</option>";
      echo "<option value='delete'>Reject</option>";
    }
    else{
      echo "<option value='blocked'>Block</option>";
    }
    ?>      
    </select>
  </td>
</tr>
<?php
}
                  ?> 
                </tbody>
              </table>
            </div>
            <div class="modal" id="Confirmalert">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <center><h1>Are You Sure ?</h1></center>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" ng-click="rejectagent()">Confirm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
          </div>
          </div>
 <!--    map model -->
<div class="modal" id="mapModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <div id="map" style="width: 100%;height: 100%;"></div>
      </div>

    </div>
  </div>
</div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-gHE38DViTrpJpwjnj7fObqkbi0Z10dc&ca"></script>
<script>
  var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
$scope.update = function(ev){

      if($scope.selectedItem[ev]=='blocked' || $scope.selectedItem[ev]=='free'){
      var status = $scope.selectedItem[ev];
      $http({
     method:"POST",
     url:"<?= base_url() ?>admin/vh_update_status",
     data:{'id':ev, 'action':status}
   }).then(function(response) {
   window.location.reload();
   }) 
    }
    else{
      $('#Confirmalert').modal();
      $scope.rejectagent = function(){
      $http({
     method:"POST",
     url:"<?= base_url() ?>admin/rejectagent_vh",
     data:{'id':ev, 'action':$scope.selectedItem[ev]}
   }).then(function(response) {
    window.location.reload();
   })
 }
 }
  }
  $scope.get_location=function(id)
    {
      $("#overlay").fadeIn();
      $http({
      method:"POST",
      url:"<?= base_url() ?>admin/view_location",
      data:{"id":id},
    }).then(function(responce){
      $('#overlay').fadeOut();
      //alert(responce.data['id']);
      $("#mapModal").modal("show");

        const initialPosition = { lat: parseFloat(responce.data['vlatitude']),lng: parseFloat(responce.data['vlongitude']) };
const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: {
            lat: parseFloat(responce.data['vlatitude']),
            lng: parseFloat(responce.data['vlongitude']),
          },
        });

  const marker = new google.maps.Marker({ map, position: initialPosition });
  $("#map").attr("style","width:100%;height:50vh;");
    });
    }
});
</script>