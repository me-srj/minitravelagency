
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
<?php
if (!empty($this->session->flashdata('brockrage_updated'))) {
 ?>
           <div class="col-md-12 alert alert-info" style="text-align: center;"><?= $this->session->flashdata('brockrage_updated'); ?></div>
 <?php
}
?>
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pilots</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- Card stats -->
          <div class="container-fluid mt--6" ng-app="myapp" ng-controller="myCtrl">
          <div  class="row">
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
<center>              <div class="dabge col-md-12" id="messagediv"></div></center>
              <table class="table file-export align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Adhar</th>
                    <th>address</th>
                    <th>Registered on/last updated</th>
                    <th>Brokrage</th>
                    <th>More</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$i=1;
foreach ($agents as $agent) {
 ?>
<tr>
  <td><?= $i++; ?></td>
  <td><a target="_blank" href="<?= base_url() ?>app-assets/images/agent/profile/<?= $agent->photo ?>"><img class="img" style="height: 45px;width: 45px;border-radius: 50%;" src="<?= base_url() ?>app-assets/images/agent/profile/<?= $agent->photo ?>"></a> <?= $agent->name ?></td>
  <td><?= $agent->email ?><br><?= $agent->mobile ?></td>
  <td><?= $agent->adhar_no ?><br><a target="_blank" class="badge badge-info" href="<?= base_url() ?>app-assets\images\agent\adhar_doc\<?= $agent->adhar_doc ?>"><span class="fa fa-eye"></span></a></td>
  <td><?= $agent->address ?></td>
  <td><?= $agent->con ?><br><?= $agent->uon ?></td>
  <td><button class="btn btn-sm btn" data-toggle="modal" data-target="#myModal<?= $agent->id ?>"><?= $agent->brokrage ?></button></td>
  <td>
    <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/agentmore?id=<?= base64_encode($agent->id) ?>">More</a>
    <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/paymentsofagent?id=<?= base64_encode($agent->id) ?>">Get Agent Payments</a>
  </td>
  <td>
    <?php
if ($agent->status=='verify') {
?>
<a class="btn btn-danger btn-sm" id="agent<?= $i ?>" ng-click="verify_user(<?= $i ?>,'<?= base64_encode($agent->id) ?>')" href="#">Verify!!</a>
<?php
}
else if($agent->status=='0')
{
?>
<a class="btn btn-sm btn-warning" id="agent<?= $i ?>" ng-click="unblock_user(<?= $i ?>,'<?= base64_encode($agent->id) ?>')" href="#">Blocked!!</a>
<?php
}
else
{
  ?>
<a class="btn btn-success btn-sm" id="agent<?= $i ?>" ng-click="block_user(<?= $i ?>,'<?= base64_encode($agent->id) ?>')" href="#">Active!</a>
  <?php
}
    ?>
  </td>
  <!-- The Modal -->
<div class="modal fade" id="myModal<?= $agent->id ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Brokrage</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
         <div class="col-md-12 alert alert-info">Note:-Change in brockrage will not affect previous records but ONLY Future fairs.</div>
         <form  method="POST" action="<?= base_url()."admin/edit_agent_brockarage" ?>">
          <input type="hidden" value="<?= $agent->id ?>" name="id">
           <div class="col-md-12"><input type="number" value="<?= $agent->brokrage ?>" required="" step="0.01" name="brokrage" class="form-control form-data"></div>
           <div class="col-md-12"><center><input type="submit" name="sub" class="btn btn-danger btn-sm mt-2" value="Edit"></center></div>
         </form>
       </div>
      </div>

    </div>
  </div>
</div>
</tr>
 <?php
}
                  ?>
                </tbody>
              </table>
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
//alert(response.data);
if (response.data['status']) 
{
$("#messagediv").attr("class","badge badge-success col-md-12");
$("#messagediv").html(response.data['message']);
$("#agent"+elid).attr("class","btn btn-success btn-sm");
$("#agent"+elid).attr("ng-click","block_user("+elid+","+id+")");
$("#agent"+elid).html(response.data['message']);
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
//alert(response.data);
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
//alert(response.data);
if (response.data['status']) 
{
$("#messagediv").attr("class","badge badge-success col-md-12");
$("#messagediv").html(response.data['message']);
$("#agent"+elid).attr("class","btn btn-warning btn-sm");
$("#agent"+elid).attr("ng-click","unblock_user("+elid+","+id+")");
$("#agent"+elid).html(response.data['message']);
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