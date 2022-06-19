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
                  <li class="breadcrumb-item active" aria-current="page">Ride Transactions</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div ng-app="myapp" ng-controller="myCtrl" class="row">
    <div class="col-md-12 text-center">
      <div class="form-group">
      <label class="label-control mt-1 float-left" style="margin-left: 2vw;">Select Date</label>
      <br><br>
      <select ng-Model="year" class="form-control float-right" style="width: 50%;">
        <option selected="" value="<?= date("Y") ?>"><?= date("Y") ?></option>
        <option value="<?= date("Y",strtotime("-1 year")) ?>"><?= date("Y",strtotime("-1 year")) ?></option>
      </select>
      <select ng-Model="month" ng-Change="gettxnmonth()" class="form-control float-right" style="width: 50%;">
        <option selected="" value="<?= date("m") ?>"><?= date("M") ?> (<?= date("m") ?>)</option>
        <?php
        for ($i=1; $i<=12 ; $i++) { 
        if ($i!=intval(date("m"))) {
        ?>
        <option value="<?= date("m",mktime(0,0,0,$i,1,2011)); ?>"><?= date("M",mktime(0,0,0,$i,1,2011)); ?>(<?= date("m",mktime(0,0,0,$i,1,2011)); ?>)</option>
        <?php
        }
        }
        ?>
      </select>
      </div>
    </div>
    <div class="col-md-12 mt-1" id="daterow" style="max-width: 100vw;overflow-x: auto;max-height: 8vh;white-space: nowrap;">
      <?php
$dm=cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
for ($i=1; $i <=$dm ; $i++) { 
?>
<button ng-Click="gettxn(<?= $i ?>)" class="btn btn-sm btn-primary datebtn" id="date<?= $i?>"><?= $i ?></button>
<?php
}
      ?>
    </div>
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
  .table tbody tr .calcu{
    padding: 0px;
    font-size: 10px;
  }
  .table tbody tr .bdate{
    padding: 0px;
    font-size: 10px;
  }
  .table tbody tr .ditbit{
    padding: 0px;
    font-size: 10px;
  }
  .table tbody tr .txnid
  {
    padding: 0px;
    font-size: 8px;
  }
}
</style>
  <div class="col-md-12 table-responsive mt-1 text-center p-0">
    <table class="table table-hover  table-bordered">
      <thead><th>Base+Tax/Mgn(%)</th><th>Txn ID</th><th class="bg-success text-white">Amount</th><th class="bg-danger text-white">Tr ID</th><th>Wallet(Dt)</th></thead>
      <tbody id="recordtable">
        <?= $earnings ?>
      </tbody>
    </table>
  </div>
  </div>  
        </div>
      </div>
<script type="text/javascript">
  var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.year="<?= date("Y") ?>";
  $scope.month="<?= date("m") ?>";
  $scope.day="<?= date("d") ?>"
  $scope.gettxn=function(date)
  {
    $scope.day=date;
//    alert($scope.day);
    $http({
      method:"POST",
      url:"<?= base_url() ?>admin/ridetxnajax",
      data:{'date':$scope.day, 'month':$scope.month,'year':$scope.year}
    }).then(function(responce){
//  alert(responce.data);
  $("#recordtable").html(responce.data);
    });    
  };
  $scope.gettxnmonth=function()
  {
    $http({
      method:"POST",
      url:"<?= base_url() ?>admin/ridetxnajax",
      data:{'date':'', 'month':$scope.month,'year':$scope.year}
    }).then(function(responce){
//  alert(responce.data);
  $("#recordtable").html(responce.data);
    });
  }
});
</script>