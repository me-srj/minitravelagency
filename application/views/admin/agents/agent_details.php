    <!-- Header -->    <!-- Header -->
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
                  <li class="breadcrumb-item"><a href="<?=base_url()?>admin/agents">Pilots</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vehiles Details</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div ng-app="myapp" ng-controller="myCtrl" class="row">
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
<center>              <div class="dabge col-md-12" id="messagediv"></div></center>
              <table class="table file-export align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Vehicle Name</th>
                    <th>Vechile Number</th>
                    <th>Insuarace Number</th>
                     <th>Vechile Photo</th>
                    <th>Insuarace Photo</th>   
                    <th>Driver</th>
                    <th>License Number</th>
                    <th>License Photo</th>
                   <th>Driver Experience</th>
                    <th>Status</th>
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
    <td><a target="_blank" class="badge badge-info" href="<?= base_url() ?>app-assets\images\agent\driver_photo\<?= $agent->dimage ?>"><span class="fa fa-eye"></span></a></td>
  <td><?= $agent->dname ?><br><?= $agent->demail ?><br><?= $agent->dmobile ?></td>
   <td> <?= $agent->dlicence_number ?></td>
  <td><a target="_blank" class="badge badge-info" href="<?= base_url() ?>app-assets\images\agent\driver_doc\<?= $agent->dlicence_doc ?>"><span class="fa fa-eye"></span></a></td>
   <td><?= $agent->dexperience ?></td>
  

  
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
  <td>
    <select class="form-control" style="width: 120px;" ng-model="selectedItem[<?= $agent->id;?>]" ng-change="update(<?= $agent->id;?>)">
      <option value="" selected>ACTION</option>
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
        </div>
      </div>
    </div>
<script type="text/javascript">
  var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
  $scope.update = function(ev){

      if($scope.selectedItem[ev]=='blocked' || $scope.selectedItem[ev]=='free'){
      var status = $scope.selectedItem[ev];
       = $http({
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
});
</script>