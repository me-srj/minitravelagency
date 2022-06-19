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
                  <li class="breadcrumb-item active" aria-current="page">Un-fullfilled Rides</li>
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
                    <th>Customer Details</th>
                    <th>Vehicle Details</th>
                    <th>Ride Details</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
//                print_r($rides);
$i=1;
foreach ($rides as $agent) {
 ?>
 <tr>
  <td><?= $i++; ?></td>
  <td> <?= $agent->name ?><br><?= $agent->email ?>,<?= $agent->mobile ?></td>
  <td> <?= $agent->subcategory.", At <b>".($agent->fair+$agent->tax)."</b>" ?></td>
  <td>
    <i style="color: green;font-size: 40px;">.</i> <?= $agent->fromaddress ?><br>
    <i style="color: red;font-size: 40px;">.</i> <?= $agent->toaddress ?><br>
    ON:<?= $agent->ridingon ?>,<?= $agent->type ?>
      </td>
    <td><?= $agent->payment ?>
    <?php
if($agent->payment=="paid")
{
echo "(<b>".$agent->pid."</b>)";
}
    ?>
    </td>
    <td><button class="btn" onclick="assingride(<?= $agent->rid ?>)">
<span data-toggle="modal" data-target="#myModal" class="badge badge-primary">Alot Driver</span>
    </button></td>
</tr>
<?php
}
                  ?> 
                </tbody>
              </table>
            </div>
          </div>
          </div>
      
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search Drivers</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <input type="text" class="form-control" id="searchdrivers"  onkeypress="searchdrivers(this)" name="" placeholder="Enter Driver name,email,mobile or vechicle number">
        <div id="modeldiv" class="row">
        </div>
        </div>
      </div>
    </div>
  </div>
  


<script>
  var r_id="";
  function assingride(rid)
  {
//alert(rid);
r_id=rid;
  }
  function searchdrivers() {
    if (r_id!="") 
    {
    var search=$("#searchdrivers").val();
        $.ajax({
  url:'<?php echo base_url().'admin/search_drivers' ?>',
  type:'POST',
  data:{r_id:r_id,search:search},
  success:function(data){
//alert(data);
$("#modeldiv").html(JSON.parse(data));
  }
});
    }
  }
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