    <!-- Header -->    <!-- Header -->
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Coupans</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div ng-app="myapp" ng-controller="myCtrl" class="row">
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
<center>              <div class="dabge col-md-12" id="messagediv"></div></center>
<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#myModal">+</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add A Coupan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="add_coupan">
        <label>Name</label><input type="text" name="name" placeholder="Enter The COUPON" class="form-control">
        <label>Description</label><textarea name="description" placeholder="Enter Description" class="form-control"></textarea>
        <label>Discount</label><input class="form-control" type="number" step="0.01" name="discount">
        <label>Type</label><select name="type" class="form-control">
    <option value="ONETIME" >ONETIME</option>
    <option value="SONETIME" >SONETIME</option>
    <option value="SEASONAL" >SEASONAL</option>
  </select>
  <br>
  <center><input type="submit" name="sub" value="Add" class="btn btn-success btn-sm"></center>
      </form>
      </div>
    </div>
  </div>
</div>
              <table class="table file-export align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$i=1;
foreach ($coupans as $agent) {
 ?>
<tr>
   <form method="POST" action="<?= base_url() ?>admin/edit_coupan">
  <td><?= $i++; ?></td>
  <input type="hidden" name="id" value="<?= $agent->id ?>">
  <td><input type="text" name="name" class="form-control" value="<?= $agent->name ?>"></td>
  <td><input type="text" name="description" class="form-control" value="<?= $agent->description ?>"></td>
  <td><input type="text" name="discount" class="form-control" value="<?= $agent->discount ?>"></td>
  <td>
    <select name="type" class="form-control">
    <option value="ONETIME" <?php if ($agent->type=="ONETIME") 
{
  echo 'selected=""';
}
 ?> >ONETIME</option>
    <option value="SONETIME" <?php if ($agent->type=="SONETIME") 
{
  echo 'selected=""';
}
 ?> >SONETIME</option>
    <option value="SEASONAL" <?php if ($agent->type=="SEASONAL") 
{
  echo 'selected=""';
}
 ?> >SEASONAL</option>

  </select></td>
  <td>
    <input type="submit" name="sub" class="btn btn-sm btn-info" value="Edit">
    <?php
if ($agent->status=="1") {
?>
    <a class="btn btn-success btn-sm" href="<?= base_url() ?>admin/deactivate_coupan?id=<?= base64_encode($agent->id) ?>">Deactivate!!</a>
<?php
}
else
{
?>
<a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/activate_coupan?id=<?= base64_encode($agent->id) ?>">Activate!!</a>
<?php
}

    ?>
  </td>
  </form>
</tr>
 <?php
}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
  var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
  $scope.verify_user=function(elid,id)
  {
//    alert(id);
   $http({
     method:"POST",
     url:"<?= base_url() ?>admin/verifyagent",
     data:{'id':id, 'action':'verify'}
   }).then(function(response) {
//alert("user verified!1");
if (response.data['status']) 
{
$("#messagediv").attr("class","badge badge-success col-md-12");
$("#messagediv").html(response.data['message']);
$("#agent"+elid).attr("class","btn btn-success btn-sm");
$("#agent"+elid).attr("ng-click","block_user("+elid+","+id+")");
$("#agent"+elid).html("Activated!!");
}
else
{
$("#messagediv").attr("class","badge badge-danger col-md-12");
$("#messagediv").html(response.data['message']);
}
  });
  }
  $scope.unblock_user=function(elid,id)
  {
//    alert(id);
   $http({
     method:"POST",
     url:"<?= base_url() ?>admin/verifyagent",
     data:{'id':id, 'action':'unblock'}
   }).then(function(response) {
//alert("unblocked user");
if (response.data['status']) 
{
$("#messagediv").attr("class","badge badge-success col-md-12");
$("#messagediv").html(response.data['message']);
$("#agent"+elid).attr("class","btn btn-success btn-sm");
$("#agent"+elid).attr("ng-click","block_user("+elid+","+id+")");
$("#agent"+elid).html("Activated!!");
}
else
{
$("#messagediv").attr("class","badge badge-danger col-md-12");
$("#messagediv").html(response.data['message']);
}
  });
  }
  $scope.block_user=function(elid,id)
  {
//    alert(id);
   $http({
     method:"POST",
     url:"<?= base_url() ?>admin/verifyagent",
     data:{'id':id, 'action':'block'}
   }).then(function(response) {
//alert("blocked user");
if (response.data['status']) 
{
$("#messagediv").attr("class","badge badge-success col-md-12");
$("#messagediv").html(response.data['message']);
$("#agent"+elid).attr("class","btn btn-warning btn-sm");
$("#agent"+elid).attr("ng-click","unblock_user("+elid+","+id+")");
$("#agent"+elid).html("Blocked!!");
}
else
{
$("#messagediv").attr("class","badge badge-danger col-md-12");
$("#messagediv").html(response.data['message']);
}
  });
  }
});
</script>