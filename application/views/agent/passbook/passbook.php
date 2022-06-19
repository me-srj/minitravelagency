<style>
 .btn-sm{
     width:75px;
 }   
</style>
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
<form ng-submit="submitForm()" class="form form-horizontal needs-validation" novalidate="">
                            <div class="form-body">
 <h4 class="form-section mt-2" style="margin-left: 2vw;"><i class="la la-book"></i>My Passbook</h4>
  <div class="row">
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
    <table class="table table-hover table-bordered">
      <thead><th>Base+Tax/Mgn(%)</th><th>Txn ID</th><th class="bg-success text-white">Credit</th><th class="bg-danger text-white">Debit</th><th>Bal(Dt)</th></thead>
      <tbody id="recordtable">
        <?= $earnings ?>
      </tbody>
    </table>
  </div>
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
    </div>
<script>
  var app = angular.module('agent', []);
app.controller('myCtrl', function($scope,$http) {
  $scope.year="<?= date("Y") ?>";
  $scope.month="<?= date("m") ?>";
  $scope.day="<?= date("d") ?>"
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
  $scope.gettxn=function(date)
  {
    $scope.day=date;
//    alert($scope.day);
    $http({
      method:"POST",
      url:"<?= base_url() ?>agent/getearningon",
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
      url:"<?= base_url() ?>agent/getearningonmonth",
      data:{'date':'', 'month':$scope.month,'year':$scope.year}
    }).then(function(responce){
//  alert(responce.data);
  $("#recordtable").html(responce.data);
    });
  }
  });
</script>
