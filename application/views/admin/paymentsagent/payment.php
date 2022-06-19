    <!-- Header -->    <!-- Header -->
    <div ng-app="myapp" ng-controller="payment" class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Agent Payment</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->

          <div class="row">
<?php
if (!empty($this->session->flashdata("paymentmsg"))) {
 ?>
<div class="col-md-12 alert alert-info" style="text-align: center;">
<?= $this->session->flashdata("paymentmsg") ?>
</div>
 <?php
}
?>
<div class="col-md-12 card">
  <label>Agent:<b><?= $agent[0]->name ?></b> Mobile:<b><?= $agent[0]->mobile ?></b> E-mail:<b><?= $agent[0]->email ?></b></label>
</div>
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
              <table class="table file-export align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Ride Details</th>
                    <th>Profit</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Type</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($payments as $key => $value) {
                  ?>
                    <tr>
                      <td><?=++$i;?></td>
                       <td>From:<?= $value->fromaddress ?><br>
                         To:<?= $value->toaddress ?><br>
                         ON:<?= $value->ridingon ?>,Type:<?= $value->cat ?><br>
                         Vehicle:<?= $value->vname ?>,<?= $value->vnumber ?><br>
                         Total:<i class="badge badge-danger"><?= $value->fair+$value->tax ?> ₹</i>
                       </td>
                        <td><?= $value->toadmin ?> ₹</td>
                        <td><?= $value->toagent ?> ₹</td>
                        <td><?= $value->tax ?> ₹</td>
                        <td><i class="badge badge-info"><?= $value->ptype ?>
                                                    <?php
                          if ($value->ptype=="cash") {
                            ?>
                            <i class="badge badge-info">Take <?= $value->toadmin ?> + <?= $value->tax ?> ₹ From Agent</i>
                            <?php
                          }
                          else
                          {
                          ?>
                            <i class="badge badge-info">Give <?= $value->toagent ?> ₹ To Agent</i>
                            <?php
                          }
                          ?>
                        </i></td>
                        <td>
                        <?php
if ($value->paystatus=="due") {
    ?>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $value->paymentid ?>">Mark As Paid!</button>

<!-- The Modal -->
<div class="modal fade" id="myModal<?= $value->paymentid ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Mark Payment AS Paid</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url()?>admin/mark_paymentbyonline"  enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $value->paymentid ?>">
    <label class="control-label">Name</label>
    <input type="name" name="payid" required="" class="form-control">
  <br>
  <center><input type="submit" name="submit" value="Mark as paid" class="btn btn-success btn-sm"></center>
      </form>
<div class="row"><div class="col-md-12"><center>OR<br><i ng-click="mark_as_paid(<?= $value->paymentid ?>)" class="btn btn-info btn-sm">Mark as Recived with cash!!</i>
</center></div></div>
      </div>
    </div>
  </div>
</div>

  <?php
}
else
{
if ($value->ptype=="cash") {
   ?>
<i class="badge badge-success badge-sm">Recieved From agent ID:<b><?= $value->payid ?></b></i>
  <?php
}
else
{
    ?>
<i class="badge badge-success badge-sm">Online Payment ID: <b><?= $value->payid ?></b></i>
  <?php
}
}

                        ?>
                        </td>
                        <td>
                          <?php
if ($value->paystatus=="due") {
  ?>
<i class="badge badge-danger">DUE</i>
  <?php
}
else
{
  ?>
<i class="badge badge-success">SENDED</i>
  <?php
}
                          ?>
                        </td>
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
      var app=angular.module('myapp',[]);
     app.controller('payment',function($scope,$http)
  {
  $scope.mark_as_paid = function(id){
    if (confirm("Are you sure!!")) {
      $("#overlay").fadeIn();
    $http({
      method:"POST",
      url:"<?= base_url() ?>admin/admmarkaspaid",
      data:{'id':id}
    }).then(function(responce){
//      alert(responce.data);
      if (!responce.data['status']) 
      {
            $("#overlay").fadeOut();
      alert(responce.data['message']);
      }
      else
      {
        window.location='<?= base_url() ?>admin/paymentsofagent?id=<?= base64_encode($agent[0]->id) ?>';
      }
    });
    }
  };
  });
    </script>