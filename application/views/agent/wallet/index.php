    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
          </div>
        </div>
            <div class="content-body">
                <section id="minimal-statistics-bg">

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
<div class="row badge" id="messagediv"></div>
<form method="POST" action="<?= base_url()."agent/walletreq" ?>" class="form form-horizontal needs-validation" novalidate="">
                            <div class="form-body">
                                <h4 class="form-section mt-2 ml-2x  "><i class="la la-money"></i>My Wallet</h4>
<div class="row">
  <div class="col-xl-4"></div>
  <div class="col-xl-4 col-lg-12 p-0">
            <div class="card" style="border-radius: 20px;">
                <div class="card-header bg-hexagons">
                    <h4 class="card-title ">Wallet</h4>
                    <div class="heading-elements">
                        
                    </div>
                </div>
                <div class="card-content collapse show bg-hexagons">
                    <div class="card-body pt-0 pb-1">
                        <div class="media d-flex">
                           <i class="la la-money font-large-4"></i>
                            <div class="media-body text-right mt-2">
                                <h3 class="font-large-2 blue-grey lighten-1 "> &#8377 <?= $adm[0]->wallet ?>
                                </h3>
                                <h6 class="mt-1">
                                   
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="col-md-12 alert alert-info text-center"><span class="text-white">Money request can be made in the multiples of
                                        500 &#8377 and it will be sended to your Payment method. To change Payment methods click <a href="<?= base_url() ?>agent/edit_profile/">here</a>
                                    </span></div>
<?php
if ($adm[0]->wallet>=500) {
?>
<div class="col-md-12 text-center" id="paymediv">
  <?php
$opt=intval($adm[0]->wallet/500);
  ?>
  <select required="" name="amount" class="form-control">
    <option disabled="" >--Select an Amount--</option>
    <?php
$i=1;
while($i<=$opt)
{
echo "<option value='".($i*500)."'>&#8377 ".($i*500)."</option>";
  $i++;
}
    ?>
  </select>
  <br>
  <center><input type="submit" name="sub" class="btn btn-success btn-sm" value="Request"></center>
</div>
<?php
}
?>
<?php
if (!empty($pending)) {
?>
<style type="text/css">
  @media only screen and (max-width: 705px) {
  .table {
    padding: 0px;
  }
  .table thead {
    padding: 0px;
  }
  .table thead th{
    padding: 0px;
    text-align: center;
  }
  .table tbody{
    padding: 0px;
  }
  .table tbody tr{
    padding: 0px;
  }
  .table tbody tr td{
    padding: 0px;
  }
}

</style>
<div class="col-md-12 text-center mt-1">
  <div class="alert alert-danger btn">Pending Requests</div>
<div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead>
    <th>S.no</th>
    <th>Amount</th>
    <th>On</th>
  </thead>
  <tbody>
<?php
$i=1;
foreach ($pending as $key) {
  ?>
    <tr>
      <td><?= $i++?></td>
      <td>&#8377 <?= -($key->amount) ?></td>
      <td><?= date("l jS \of F Y h:i:s A",strtotime($key->con)) ?></td>
    </tr>
  <?php
}
?>
  </tbody>
</table>
</div>
  <?php

  ?>
</div>
<?php
}
?>
<?php
if (!empty($recent)) {
?>
<div class="col-md-12 text-center mt-2">
  <div class="alert alert-warning btn">Recent Requests in last 10 days</div>
<div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead>
    <th>S.no</th>
    <th>Amount</th>
    <th>On</th>
    <th>Status</th>
  </thead>
  <tbody>
<?php
$i=1;
foreach ($recent as $key) {
  ?>
    <tr>
      <td><?= $i++?></td>
      <td>&#8377 <?= -($key->amount) ?></td>
      <td><?= date("l jS \of F Y h:i:s A",strtotime($key->con)) ?></td>
      <td><?php
if (!empty($key->pid)) {
 echo "<b class='badge badge-success'>To Account/UPI:".$key->accountnumber."<br>On:".date("D jS \of F Y",strtotime($key->pon))."</b>"."<br>PID:".$key->pid;
}
else
{
  echo "Pending.";
}
      ?></td>
    </tr>
  <?php
}
?>
  </tbody>
</table>
</div>
  <?php

  ?>
</div>
<?php
}
?>

</div>
                            </div>
                        </form>
                <!--/ form end -->
              </div>
            </div></div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- BEGIN: Page JS-->
    <script src="https://minitravelagency.com/app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->
 
    </div>
<script type="text/javascript">
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
</script>