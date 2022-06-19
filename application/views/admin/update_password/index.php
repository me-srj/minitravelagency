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
                  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div ng-app="myapp" ng-controller="login" class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<div class="row badge" id="messagediv"></div>
<form ng-submit="submitForm()" class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" novalidate="">
                            <div class="form-body">
                                <h4 class="form-section mt-2 ml-3"><i class="ft-lock"></i> Change Password</h4>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Old Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" ng-model="old" id="validationTooltip01" class="form-control" placeholder="Old Password" name="oldpassword" required="">
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip02">New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" ng-model="new" id="validationTooltip02" class="form-control Password" placeholder="New Password" name="newpassword" required="">
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">Re-New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" ng-model="con" id="validationTooltip03" class="form-control Re-Password" placeholder="Re-Password" name="repassword" required="">
                                       
                                    </div>
                                    </div>
                                </div>
<div class="mb-5 text-center">
                                <button id="submitbtn" type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                                                          <span style="display: none;" class="fa fa-circle-o-notch fa-spin"></span>
</div>
                            </div>
                        </form>
                <!--/ form end -->
            </div>
          </div>
        </div>
       
      </div>
<!-- BEGIN: Page JS-->
    <script src="https://minitravelagency.com/app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

 
    </div>
<script type="text/javascript">
  var app=angular.module('myapp',[]);
  app.controller('login',function($scope,$http)
  {
    $scope.name="<?= $adm['name'] ?>";
    $scope.mobile="<?= $adm['mobile'] ?>";
  $scope.submitForm = function(){
    $("#submitbtn").hide();
    $(".fa-circle-o-notch").show();
    if ($scope.new==$scope.con) {
      $http({
      method:"POST",
      url:"<?= base_url() ?>admin/edit_password",
      data:{"old":$scope.old,"new":$scope.new,"con":$scope.con},
    }).then(function(responce){
    // alert(responce.data);
      if (responce.data['status']) 
      {
//      alert(responce.data['message']);
$("#messagediv").attr("class","badge row badge-success");
 $("#messagediv").html(responce.data['message']);
      $("#submitbtn").show();
    $(".fa-circle-o-notch").hide();
      }
      else
      {
$("#messagediv").attr("class","badge row badge-danger");
 $("#messagediv").html(responce.data['message']);
      $("#submitbtn").show();
    $(".fa-circle-o-notch").hide();
      }
    });
    }
    else
    {
      $("#messagediv").attr("class","badge row badge-danger");
 $("#messagediv").html("New Password and confirm password didn't matched ");
    $("#submitbtn").show();
    $(".fa-circle-o-notch").hide();
    }
  };
  });
</script>
