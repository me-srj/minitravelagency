

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
                  <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
<form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" ng-submit="submitForm()" novalidate="">
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> Edit Profile</h4>
                                <div class="col-md-12">
                                <img src="<?= base_url() ?>app-assets/images/admin/<?= $adm['image'] ?>" id="profile-img-tag" style="width:100px; height:100px" class="img-thumbnail">
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="validationTooltip01">Name</label>
                                            <div class="col-md-9">
                                            <div class="position-relative has-icon-left">
<input type="text" id="validationTooltip01" class="form-control border-primary" placeholder="Name" name="name" value="<?= $adm['name'] ?>" required="" ng-model="name">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Phone No.</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input ng-model="mobile" type="tel" id="userinput2" class="form-control border-primary" placeholder="Phone Number" name="mobile" value="<?= $adm['mobile'] ?>" max="10" min="10" required="">
                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="row">
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
    
      
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
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
<script type="text/javascript">
  var photodata="";
  var app=angular.module('myapp',[]);
  app.controller('login',function($scope,$http)
  {
    $scope.name="<?= $adm['name'] ?>";
    $scope.mobile="<?= $adm['mobile'] ?>";
  $scope.submitForm = function(){
    $("#submitbtn").hide();
    $(".fa-circle-o-notch").show();
    $http({
      method:"POST",
      url:"<?= base_url() ?>admin/edit_profile",
      data:{"name":$scope.name,"mobile":$scope.mobile,"file":photodata},
    }).then(function(responce){
     // alert(responce.data['status']);
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
  };
  });
</script>


