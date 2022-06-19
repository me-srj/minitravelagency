<!-- BEGIN: Content-->
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
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<div class="row badge" id="messagediv"></div>
<form class="form form-horizontal needs-validation" ng-submit="submitForm()" novalidate="">
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> Edit Profile</h4>
                                <div class="col-md-12">
                                <img src="<?= base_url() ?>app-assets/images/agent/profile/<?php if(empty($adm[0]->photo)){echo 'default.png';}else{echo $adm[0]->photo;}?>" id="profile-img-tag" style="width:100px; height:100px" class="img-thumbnail">
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="validationTooltip01">Name</label>
                                            <div class="col-md-9">
                                            <div class="position-relative has-icon-left">
<input type="text" id="validationTooltip01" class="form-control border-primary" placeholder="Name" name="name" value="<?= $adm[0]->name; ?>" required="" ng-model="name">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Phone No.</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input ng-model="mobile" type="tel" id="userinput2" class="form-control border-primary" placeholder="Phone Number" name="mobile" value="<?= $adm[0]->mobile; ?>" max="10" min="10" required="">
                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Email</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input ng-model="email" type="text" id="userinput2" class="form-control border-primary" placeholder="Phone Number" name="email" value="<?= $adm[0]->email; ?>" max="10" min="10" required="">
                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput8">Image</label>
                                        <div class="col-md-9">
                                        <fieldset class="form-group">
                            <div class="custom-file">
                                <input type="file" ng-model="photo" class="custom-file-input image-file" id="photo" name="image" value="">
                                <label class="custom-file-label" for="userinput7">Choose file</label>
                            </div>
                                        </fieldset>
                                     </div>
                                        </div>
                                    </div>
                                </div>
<div class="col-md-12 alert alert-info">Payments Methods</div>
                                 <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Account Number/UPI ID</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
 <input ng-model="accountnumber" type="text" class="form-control border-primary" placeholder="Account Number/UPI ID" name="accountnumber" value="<?= $adm[0]->accountnumber; ?>" required=""> 
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput8">IFSC</label>
                                        <div class="col-md-9">
                                        <fieldset class="form-group">
                            <div class="custom-file">
<input type="text" ng-model="ifsc" class="form-control" id="ifsc" placeholder="Enter IFSC" name="ifsc" value="<?= $adm[0]->ifsc; ?>">
                            </div>
                                        </fieldset>
                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <input type="text" name="currentimg" value="0" hidden="">
                            <div class="form-actions right">
                                <center>
                                <button id="submitbtn" type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                              <span style="display: none;" class="fa fa-circle-o-notch fa-spin"></span>
            </center>                </div>
                        </form>
                <!--/ form end -->
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </section>
</div>
</div>
</div>
    
      
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
                // alert(e.target.result);
               // photodata=e.target.result;
            }
           reader.readAsDataURL(input.files[0]);
           reader.onloadend=function()
           {
            photodata=reader.result.replace(/^data:.+;base64,/, '');
           // console.log(photodata);
           }
        }
    }
    $("#photo").change(function(){
        readURL(this);
    });
</script>
<script>
  var photodata="";
  var app=angular.module('agent',[]);
  app.controller('myCtrl',function($scope,$http)
  {
    $scope.name="<?= $adm[0]->name; ?>";
    $scope.mobile="<?= $adm[0]->mobile; ?>";
    $scope.email="<?= $adm[0]->email; ?>";
    $scope.accountnumber="<?= $adm[0]->accountnumber; ?>";
    $scope.ifsc="<?= $adm[0]->ifsc; ?>";
  $scope.submitForm = function(){
    $('#overlay').fadeIn();
    $http({
      method:"POST",
      url:"<?= base_url() ?>agent/edit_pro",
      data:{"name":$scope.name,"mobile":$scope.mobile,"email":$scope.email,"photo":photodata,"accountnumber":$scope.accountnumber,"ifsc":$scope.ifsc},
    }).then(function(responce){
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
  };
  });
</script>


