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
<script>
  var app = angular.module('agent', []);
app.controller('myCtrl', function($scope,$http) {
  $scope.submitForm = function(){
    $('#overlay').fadeIn();    
    if ($scope.new==$scope.con) {
      $http({
      method:"POST",
      url:"<?= base_url() ?>agent/change_pass",
      data:{"old":$scope.old,"new":$scope.new,"con":$scope.con},
    }).then(function(responce){
    // alert(responce.data);
    $('#overlay').fadeOut();
      if (responce.data['status']) 
      {
//      alert(responce.data['message']);
$("#messagediv").attr("class","badge row badge-success");
 $("#messagediv").html(responce.data['message']);
      }
      else
      {
$("#messagediv").attr("class","badge row badge-danger");
 $("#messagediv").html(responce.data['message']);
      }
    });
    }
    else
    {
      $("#messagediv").attr("class","badge row badge-danger");
 $("#messagediv").html("New Password and confirm password didn't matched ");
    }
  };
  });
</script>
