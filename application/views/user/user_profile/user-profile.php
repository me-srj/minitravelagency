
   <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?=base_url()?>" class="headerButton goBack">
               <i class="fa fa-arrow-left">  </i>
            </a>
        </div>
        <div class="pageTitle">
            My Profile
        </div>
        <div class="right">
            
        </div>
    </div>
    <!-- * App Header -->
 <!-- App Capsule -->
    <div id="appCapsule">
        
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    <?php
                    if(!empty($customer[0]->image))
                    {?>
                    <img src="<?= base_url();?>app-assets/images/user/profile/<?= $customer[0]->image; ?>" alt="avatar" id="avatar" class="imaged w100 rounded">
                    <?php
                }
                    else
                    {?>
                      <img src="<?= base_url();?>app-assets/images/user/profile/default.png" alt="avatar" id="avatar" class="imaged w100 rounded">
                  <?php
              }
                    ?>
                    
                    <span class="button" data-toggle="modal" data-target="#editphoto">
                        <i class="fa fa-camera"></i>
                    </span>
                </a>
            </div>
        </div>
        <canvas style="display:none;" id="dppic_canvas"></canvas>

        <!-- edit photo Sheet -->
        <div class="modal fade action-sheet" id="editphoto" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Photo</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form ng-submit="profile_photo()">
                              <div class="form-group basic">
                                    <label class="label">Choose Photo</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input14d"></span>
                                        </div>
                                        <input type="file" class="form-control " accept="image/x-png,image/gif,image/jpeg" onchange="dppic(this)">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary photo btn-block btn-lg"
                                        >Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * edit photo Sheet -->
     
   
       

        <div class="listview-title mt-1">Profile Settings</div>
        <ul class="listview image-listview text inset">
            <li>
                <a href="#" class="item">

                    <div class="in">
                        <div>
                            {{username}}
                        </div>
                        <span class="text-primary" data-toggle="modal" data-target="#editname"> <i class="fa fa-pencil"></i></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div><?= $customer[0]->mobile;?></div>
                       <span class="text-primary"></span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>
                            {{useremail}}
                        </div>
                        <span class="text-primary" data-toggle="modal" data-target="#editemail"><i class="fa fa-pencil"></i></span>
                    </div>
                </a>
            </li>

            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>
                            {{aadhar_no_sco}}
                        </div>
                        <?php
                        if($customer[0]->aadhar_card==='Aadhar Unavailable')
                        {
                        ?>
                          <span class="text-primary" data-toggle="modal" data-target="#editaadhar"><i class="fa fa-pencil"></i></span>
                        <?php
                        }
                        else
                        {?> 
                     <span class="text-primary" data-toggle="modal" data-target="#DialogImaged">view</span>
                       <?php
                       }
                       ?>
                       
                    </div>
                     
                </a>
            </li>
           
        </ul>

<!-- Dialog with Image -->
        <div class="modal fade dialogbox" id="DialogImaged" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                   
                    <div class="modal-body">
                   <div class="flip-card">
                  <div class="flip-card-inner">
                    <div class="flip-card-front">
                      <img src="<?=base_url()?>app-assets/images/user/adhar/<?=$customer[0]->aadhar_card;?>" alt="Avatar" style="height:240px;width:265px;">
                    </div>
                    <div class="flip-card-back">
                     <img src="<?=base_url()?>app-assets/images/user/adhar/<?=$customer[0]->aadhar_back;?>" alt="Avatar" style="height:240px;width:265px;">
                    </div>
                  </div>
                </div>
                       
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-dismiss="modal">CANCEL</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Dialog with Image -->
        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset">
            <li>
                <a href="https://play.google.com/store/apps/details?id=mini.travel.pilot" class="item">
                    <div class="in">
                        <div>Earn With Us ?</div>
                    </div>
                </a>
            </li>
           
            <li>
                <a href="<?= base_url()?>user-logout" class="item">
                    <div class="in">
                        <div>Log out all devices</div>
                    </div>
                </a>
            </li>
        </ul>
        

    </div>
    
    <!-- * App Capsule -->
    <!-- edit name Sheet -->
        <div class="modal fade action-sheet" id="editname" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Name</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form ng-submit=name_form();>
                              <div class="form-group basic">
                                    <label class="label">Enter Name</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input14d"></span>
                                        </div>
                                        <input type="text" class="form-control " ng-model="name" placeholder=" Enter New Name">
                                        <input type="hidden" ng-model="cid" name="">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="sumit" class="btn btn-primary name btn-block btn-lg"
                                        >Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * edit name Sheet -->
         <!-- edit email Sheet -->
        <div class="modal fade action-sheet" id="editemail" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change email</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form ng-submit="email_form()">
                              <div class="form-group basic">
                                    <label class="label">Enter Email Id</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input14d"></span>
                                        </div>
                                        <input type="email" class="form-control " placeholder=" Enter New Email" ng-model="email">
                                         <input type="hidden" ng-model="cid" name="">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="submit" class="btn email btn-primary btn-block btn-lg"
                                        >Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * edit email Sheet -->
         <!-- edit aadhar Sheet -->
        <div class="modal fade action-sheet" id="editaadhar" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Aadhar Document</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form ng-submit="doc_form()">

                                <div class="form-group basic">
                                    <label class="label">Enter aadhar No</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input14d"></span>
                                        </div>
                                        <input type="text" class="form-control" ng-model="aadhar_no" placeholder=" Enter aadhar_no" maxlength="12" value="<?=
                                        $customer[0]->aadhar_no;?>" onkeypress="return isNumber(event)">
                                        
                                    </div>
                                </div>
                              <div class="form-group basic">
                                    <label class="label">Aadhar Front side</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input14d"></span>
                                        </div>
                                       <input type="file" class="form-control" onchange="adpic(this)" accept="image/x-png,image/gif,image/jpeg">
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <label class="label">Aadhar Back Side</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input14d"></span>
                                        </div>
                                       <input type="file" class="form-control" onchange="addpic(this)" accept="image/x-png,image/gif,image/jpeg">
                                    </div>
                                </div>
                                <canvas style="display:none;" id="adpic_canvas"></canvas>
                                <canvas style="display:none;" id="addpic_canvas"></canvas>

                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"
                                        >Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * edit aadhar Sheet -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
        <script src="<?= base_url()?>app-assets/walletassets/toastr/toastr.js"></script>
        <script type="text/javascript">
            var failed;
        var vphotos = '';
        var adphoto = '';
        var addphoto = '';
 function dppic(ele) {
  var img = new Image();
  img.onload = dp;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function dp() {
  var canvas = document.getElementById('dppic_canvas');
if (this.width>500) 
{
    canvas.width = 500;
}
else
{
   canvas.width = this.width; 
}
 if (this.height>500) 
{
    canvas.height = 500;
}
else
{
   canvas.height = this.height; 
}
  var ct = canvas.getContext('2d');
  ct.drawImage(this, 0,0,canvas.width,canvas.height);
  var dataURL = canvas.toDataURL("image/png");
  vphotos=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
  $('#avatar').attr('src',dataURL);
 // console.log(vphotos);
};
//aadhar front
 function adpic(ele) {
  var img = new Image();
  img.onload = adp;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function adp() {
  var canvasv = document.getElementById('adpic_canvas');
  //$(canvasv).show();
if (this.width>500) 
{
    canvasv.width = 500;
}
else
{
   canvasv.width = this.width; 
}
 if (this.height>500) 
{
    canvasv.height = 500;
}
else
{
   canvasv.height = this.height; 
}
  var ctx = canvasv.getContext('2d');
  ctx.drawImage(this, 0,0,canvasv.width,canvasv.height);
  var dataURL = canvasv.toDataURL("image/png");
  adphoto=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
};
//aadhar back
 function addpic(ele) {
  var img = new Image();
  img.onload = addp;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function addp() {
  var canvasb = document.getElementById('addpic_canvas');
  //$(canvasv).show();
if (this.width>500) 
{
    canvasb.width = 500;
}
else
{
   canvasb.width = this.width; 
}
 if (this.height>500) 
{
    canvasb.height = 500;
}
else
{
   canvasb.height = this.height; 
}
  var ctxx = canvasb.getContext('2d');
  ctxx.drawImage(this, 0,0,canvasb.width,canvasb.height);
  var dataURL = canvasb.toDataURL("image/png");
  addphoto=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
};
 var app=angular.module('plunker',[]);
  app.controller('MainCtrl',function($scope,$http){
         var toastr1 = new Toastr();        
    $scope.username='<?=$customer[0]->name;?>';
    $scope.useremail='<?=$customer[0]->email;?>';
    $scope.name='<?=$customer[0]->name;?>';
    $scope.aadhar_no_sco='<?=$customer[0]->aadhar_no;?>';
          $scope.cid="<?= $customer[0]->id;?>";
      $scope.name_form=function()
     {
        if($scope.name!=null)
        {    $('.name').attr('disabled','disabled');
            $('.name').html('Please Wait  <span class="spinner-border spinner-border-sm text-white"></span>');
           $http({
        method: 'POST',
        url: '<?= base_url() ?>user/edit_name',
        data: {'id':$scope.cid,'name' : $scope.name},
      }).then(function(responce){
        if(responce.data.status===true)
        {
            $scope.username=$scope.name;
            $('.name').html('Save Changes')
            $('.name').removeAttr('disabled');
            $('#editname').modal('toggle');
             toastr1.show('Name Updated Successfully');
        }
        else{
            $('.name').removeAttr('disabled');
            toastr1.show('Failed to Update');
        }
        
      });
        }
        else{
            toastr1.show('Enter Name');
        }
     }

     $scope.email_form=function()
     {
         $('.email').attr('disabled','disabled');
            $('.email').html('Please Wait  <span class="spinner-border spinner-border-sm text-white"></span>');
        
        if($scope.email!=null)
        { 
             $('.email').attr('disabled','disabled');
            $('.email').html('Please Wait  <span class="spinner-border spinner-border-sm text-white"></span>');
           $http({
        method: 'POST',
        url: '<?= base_url() ?>user/edit_email',
        data: {'id':$scope.cid,'email' : $scope.email},
      }).then(function(responce){
        if(responce.data.status===true)
        {
            $('.email').html('Save Changes')
            $('.email').removeAttr('disabled');
            $scope.useremail=$scope.email;
            $('#editemail').modal('toggle');
             toastr1.show('Email Updated Successfully');
        }
        else{
             $('.email').removeAttr('disabled');
             toastr1.show('Failed to Update');
        }
      });
        }
        else{
            toastr1.show('Enter Email');
        }
     }

     $scope.profile_photo=function()
     {  
        if(vphotos !=null || vphotos!='')
        {
          //  console.log(vphotos);
            //toastr1.show(vphotos);
            $('.photo').attr('disabled','disabled');
            $('.photo').html('Please Wait  <span class="spinner-border spinner-border-sm text-white"></span>');
           $http({
        method: 'POST',
        url: '<?= base_url() ?>user/edit_profile_photo',
        data: {'id':$scope.cid,'photo' : vphotos},
      }).then(function(responce){
          console.log(responce.data);
        if(responce.data.status===true)
        {   
            $('.photo').html('Save Changes');
            $('.photo').removeAttr('disabled');
            $('#editphoto').modal('toggle');
             toastr1.show('Profile Photo Updated');
        }
        else{
            $('.photo').html('Save Changes');
             $('.photo').removeAttr('disabled');
            toastr1.show('Failed to Update Photo');
        }
      });
        }
        else{
            $('.photo').html('Save Changes');
            $('.photo').removeAttr('disabled');
            toastr1.show('Choose Photo');
        }
     }
     $scope.doc_form=function()
     {
        if($scope.aadhar_no!=null && adphoto !=null)
        {
          //  console.log(adphoto);
       //     toastr1.show(adphoto);
          $http({
        method: 'POST',
        url: '<?= base_url() ?>user/edit_aadhar',
        data: {'aadhar_no':$scope.aadhar_no,'photo' : adphoto,'aadhar_back':addphoto},
      }).then(function(responce){
        console.log(responce.data);
        if(responce.data.status===true)
        {
            $scope.aadhar_no_sco=$scope.aadhar_no;
            $('#editaadhar').modal('toggle');
             toastr1.show('Aadhar details Saved .');
        }
        else{
             toastr1.show('Failed to Update');
        }
      });
        }
        else{
             toastr1.show('Enter Details');
        }
     }
     

     });
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
        </script>