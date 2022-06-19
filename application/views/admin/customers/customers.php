
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
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                     <th>Photo</th>
                    <th>Last Activity</th>   
                  </tr>
                </thead>
                <tbody>
                <?php
$i=1;
foreach ($customer as $agent) {
 ?> 
 <tr>
  <td><?= $i++; ?></td>
  <td> <?= $agent->name ?></td>
   <td> <?= $agent->mobile ?></td>
    <td> <?= $agent->email ?></td>
    <td><img class="img" style="height: 45px;width: 45px;border-radius: 50%;" src="<?= base_url() ?>app-assets/images/agent/driver_photo/<?= $agent->image ?>"> <?= $agent->image ?></td>
   <td> <?= $agent->uon ?></td>
</tr>
<?php
}
                  ?> 
                </tbody>
              </table>
            </div>
          </div>
          </div>
        
<script>
  var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
  $scope.update = function(ev){

     if($scope.selectedItem[ev]=='0')
     {
      var mymodal = "#myModal" + ev;
      $(mymodal).modal();
   //    $scope.savepricing = function(){
   //      $http({
   //   method:"POST",
   //   url:"<?= base_url() ?>admin/verifyagent",
   //   data:{'id':ev, 'action':$scope.selectedItem[ev], 'rpkm':$scope.rpkm[ev], 'acrpkm':$scope.acrpkm[ev], 'rpd':$scope.rpd[ev]}
   // }).then(function(response) {
   //  window.location.reload();
   // })
   //    }
     }
    else if($scope.selectedItem[ev]=='blocked' || $scope.selectedItem[ev]=='unblock'){
      var status = '';
      if($scope.selectedItem[ev]=='unblock'){
        status = '0';
      }
      else{
        status = 'blocked';
      }
      $http({
     method:"POST",
     url:"<?= base_url() ?>admin/verifyagent",
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
     url:"<?= base_url() ?>admin/rejectagent",
     data:{'id':ev, 'action':$scope.selectedItem[ev]}
   }).then(function(response) {
    window.location.reload();
   })
 }
 }
  }
});
</script>