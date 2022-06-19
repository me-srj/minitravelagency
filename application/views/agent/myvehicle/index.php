<!-- BEGIN: Content-->
<style>
  .card .editbutton{
  /*display: none;*/
  float: right;
  margin-right: 0px;
  /*transition: transform 0.3s ease;
  transform: translateX(120px);*/
}
  .coords{
  margin: 0 1rem;
  color: #fff;
  font-size: 1rem;

}

.stats {
  font-size: 2rem;
  display: flex;
  position: absolute;
  bottom: 1rem;
  left: 7rem;
  right: 1rem;
  top: auto;
  color: #fff;
}
.stats > div {
  flex: 1;
  text-align: center;
}
.stats div.title {
  font-size: 0.75rem;
  font-weight: bold;
  text-transform: uppercase;
}
.stats div.value {
  font-size: 1.5rem;
  font-weight: bold;
  line-height: 1.5rem;
}
.stats div.value.infinity {
  font-size: 2.5rem;
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
<section id="horizontal">
    <div class="row" ng-show="table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?php if(empty($this->session->userdata('agent')->adhar_no) && empty($this->session->userdata('agent')->adhar_doc) && empty($this->session->userdata('agent')->address) && empty($this->session->userdata('agent')->driver_bio)){?>
                    <h4 class="card-title"><i class="la la-cab"></i>Please complete your detailes.</h4>
                    <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <form ng-submit="completeform()">
                            <div class="form-group">
                                <label for="adhar_no">Adhar No.</label>
                                <input type="number" ng-model="adhar_no" class="form-control" placeholder="adhar no" id="adhar_no" required>
                            </div>
                            <div class="form-group">
                                <label for="adhar_doc">Adhar Doc.</label>
                                <input type="file" name="adhar_doc" class="form-control" id="adhar_doc" required onchange="adhar_doc_can(this)" />
                            </div>
                            <canvas style="display: none;" id="doc_canvas"></canvas>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea ng-model="address" class="form-control" id="address" required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="driver_bio">Driver Bio</label>
                                <textarea ng-model="driverbio" class="form-control" id="driver_bio" required>
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success"> Save Details</button>
                            </form>
                        </div>
                        </div>
                    <?php } else{?>
                    <h4 class="card-title"><i class="la la-cab"></i> My Vehicles</h4>
                    
                    <div class="heading-elements mt-0.5">
                      <?php if(empty($this->session->userdata('pilot')))
                      {?>
              <button class="btn btn-sm btn-primary btn-round btn-icon buttonAnimation" data-animation="pulse" ng-click="add()" data-toggle="tooltip" data-original-title="Add Vehicle">
                <span class="btn-inner--icon"><i class="ft-plus"></i></span>
                <span class="btn-inner--text">Add Vehicle</span>
              </button>
              <?php
            }?>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="">
              <div class="">
                <?php
                if(empty($list))
                {
                ?>
                <div class="card bg-gradient-x-purple-blue">
        <div class="heading-elements">
          <div class="text-center text-white font-medium-5 ml-5">
          </div>
        </div>
                <div class="card-content">
                    <div class="card-body">
                       <div class="media d-flex">
                            <div class="align-self-top">                          
                              </div>
                            <div class="media-body text-white text-center align-self-bottom mt-0">
                             
                             <h3 class="mt-2">No Vechile Added</h3>
                           
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
              }
              else{
                ?>

            <div class="card bg-gradient-x-purple-blue">
        <div class="heading-elements">
          <div class="text-center text-white font-medium-5 ml-5"><?=$list[0]->vname;?>
          <a class="btn text-white btn-primary editbutton mb-0" ng-click="edit(<?= $list[0]->id;?>)" data-toggle="tooltip" data-original-title="Edit Vehicle"  style="border-radius:0px 0px 0px 25px;"><i class="ft-click"></i> Edit</a>
          </div>
        </div>
                <div class="card-content">
                    <div class="card-body">
                       <div class="media d-flex">
                            <div class="align-self-top">
                          <span class="badge badge-pill badge-glow badge-secondary mb-2 ml-1"><?=$list[0]->vnumber;?></span>
                                <br/>
                                <a href="#"data-toggle="modal" data-target="#exampleModal4">
                                  <img src="<?= base_url()?>app-assets\images\agent\vehicle_photo\<?= $list[0]->vphoto;?>" class="img-responsive rounded-circle mb-1" height="90px" width="90px"  />
                                </a>
                              
                              <br/><?php
if ($list[0]->status=='blocked') {
?>
<span class="badge badge-pill badge-glow badge-danger ml-1">Blocked</span>
<?php
}
else if($list[0]->status=='verify')
{
?>
<span class="badge badge-pill badge-glow badge-warning ml-1">In Verification</span>
<?php
}
else
{
  ?>
  <span class="badge badge-pill badge-glow badge-success ml-1">Active!</span>
  <?php
}?>
                              </div>
                            <div class="media-body text-white text-center align-self-bottom mt-0">

                              <div class="d-inline-flex">
                                <div class="coords">
                              <span>Category :</span>                          
                            </div>
                            <div class="coords">
                              <span><?=$list[0]->cat;?></span>
                            </div>
                          </div>
                           <div class="d-inline-flex">
                                <div class="coords">
                              <span>SubCat. :</span>                          
                            </div>
                            <div class="coords">
                              <span><?=$list[0]->subcat;?></span>
                            </div>
                          </div>
                          <div class="d-inline-flex">
                                <div class="coords">
                              <span>Insurance :</span>                          
                            </div>
                            <div class="coords">
                              <span><?php if(empty($list[0]->vregistrationnumber)){
                      echo "---";
                    }else{
                      echo $list[0]->vregistrationnumber;
                    };?></span>
                            </div>
                          </div>
                           <div class="d-inline-flex">
                                <div class="coords">
                              <span></span>Licence:</span>                          
                            </div>
                            <div class="coords">
                              <span><?=$list[0]->dlicence_number;?></span>
                            </div>
                          </div>
                          <div class="d-inline-flex">
                                <div class="coords">
                              <span>Driver Exp. :</span>                          
                            </div>
                            <div class="coords">
                              <span><?=$list[0]->dexperience;?> year</span>
                            </div>
                          </div>

                           <div class="stats">
                            <div>
            <div class="title">Insurance</div>
            <a href="#" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-file text-white"></i></a>          
          </div>
          <div>
            <div class="title">Licence</div>
           <a href="#" data-toggle="modal" data-target="#exampleModal3"><i class="fas fa-file text-white"></i></a>           
          </div>
          <div>
            <div class="title">Location</div>
           <a href="#" ng-click="get_location(<?= $list[0]->id ?>)"><i class="fas fa-map text-white"></i></a>           
          </div>          
          </div>
        </div>
      </div>
                        </div>
                    </div>
                </div>

                <?php
              }
              ?>
            </div>
        </div>

                    <!--     <div class="table-responsive">
                            <table class="table display nowrap table-striped table-bordered scroll-horizontal">

                <thead class="">
                  <tr>
                    <th>Serial No</th>
                    <th>Vehicle Name</th>
                    <th>Vehicle No</th>
                    <th>Insurance No</th>
                    <th> Insurance Doc</th>
                    <th>Vehicle Photo</th>
                    <th>Vehicle Category</th>
                    <th>Vehicle SubCategory</th>
                    <th>Driver Name</th>
                    
                    <th>Driver Email</th>
                    <th>Driver Contact No</th>
                    <th>Driving Licence No</th>
                    <th>Driving Licence Doc</th>
                    <th>Driving Experience</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                  $i=0;
                   foreach($list as $key){?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $key->vname;?></td>
                    <td><?= $key->vnumber;?></td>
                    <td><?php if($key->vregistrationnumber==''){
                      echo "---";
                    }else{
                      echo $key->vregistrationnumber;
                    };?></td>
                    <td><a href="<?= base_url()?>app-assets\images\agent\driver_photo\<?= $key->dimage;?>" target="_blank"><img src="<?= base_url()?>app-assets\images\agent\driver_photo\<?= $key->dimage;?>" style="height: 50px;width: 50px;"></a></td>
            <td> <a href="<?= base_url()?>app-assets\images\agent\vehicle_photo\<?= $key->vphoto;?>" target="_blank"><img src="<?= base_url()?>app-assets\images\agent\vehicle_photo\<?= $key->vphoto;?>" style="height: 50px;width: 50px;"></a></td>

                    <td><?= $key->cat;?></td>
                    <td><?= $key->subcat;?></td>
                    <td><?= $key->dname;?></td>
                    
                    <td><?= $key->demail;?></td>
                    <td><?= $key->dmobile;?></td>
                    <td><?= $key->dlicence_number;?></td>
                    <td><a href="<?= base_url()?>app-assets\images\agent\driver_doc\<?= $key->dlicence_doc;?>" target="_blank" class="btn btn-sm">view<a></td>
                    <td><?= $key->dexperience;?></td>
                    <td>
                          <?php
if ($key->status=='blocked') {
?>
<a class="btn btn-danger btn-sm" id="agent<?= $i ?>"  href>Blocked</a>
<?php
}
else if($key->status=='verify')
{
?>
<a class="btn btn-sm btn-warning" id="agent<?= $i ?>"  href>In Verification</a>
<?php
}
else if($key->status=='inuse')
{?>
<a class="btn btn-sm btn-warning" id="agent<?= $i ?>"  href>In Verification</a>
<?php
}
else
{
  ?>
<a class="btn btn-success btn-sm" id="agent<?= $i ?>"  href>Active!</a>
  <?php
}
    ?>
                    </td>
                    <td><button class="btn btn-info btn-sm" ng-click="get_location(<?= $key->id ?>)">View</button></td>
                    <td class="table-actions">
                      <a href="#!" class="table-action" ng-click="edit(<?= $key->id;?>)" data-toggle="tooltip" data-original-title="Edit Vehicle">
                    <i class="ft-edit"></i>
                  </a></td>
                  </tr>
                  <?php
                };?>
                </tbody>
              </table>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row" ng-hide="formm">
    <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title" id="horz-layout-colored-controls"><i class="la la-car"></i> {{statchange}}</h4>
              <div class="heading-elements mt-0.5">
                          <button class="btn btn-sm btn-primary btn-round btn-icon buttonAnimation" data-animation="pulse" ng-click="sub()" data-toggle="tooltip" data-original-title="Add Vehicle">
                <span class="btn-inner--icon"><i class="ft-eye"></i></span>
                <span class="btn-inner--text">View Vehicle</span>
              </button>
                  </div>
              </div>
              <div class="card-content collpase show">
                  <div class="card-body">
                <div id="msgdiv" class="alert alert-info alert-dismissible text-center" style="display: none;padding: 0px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p id="messagediv" class="mt-3"></p></div>
                <div id="errordiv" class="alert alert-danger alert-dismissible text-center" style="display: none;padding: 0px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p id="messagediv" class="mt-3"></p></div>
                <form class="form form-horizontal" ng-submit="submitForm()">
                  <input type="hidden" name="id" ng-model="id" required>
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom01">Vehicle Name</label>
                      <input type="text" class="form-control" id="validationCustom01" placeholder="Vehicle Name" ng-model="vname" required>
                      <div class="valid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom02">Vehicle No</label>
                      <input type="text" class="form-control" id="validationCustom02" placeholder="Vehicle No" ng-model="vnumber" ng-readonly="read" required>
                      <div class="valid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustomUsername">Insurance No</label>
                      <input type="text" class="form-control" id="validationCustomUsername" placeholder="Insurance No" ng-model="vregistrationnumber" ng-readonly="read2" required>
                      <div class="invalid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom02">Vehicle Category</label>
                      <select class="form-control" id="validationCustom02" placeholder="Vehicle Category" ng-model="cat" ng-change="category()" required>
                        <option value="" selected="true" disabled="disabled">Select Category</option>
                        <option value="CAB">CAB</option>
                        <option value="GOODS">GOODS</option>
                        <option value="BIKE">BIKE</option>
                      </select>
                      <div class="valid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom02">Vehicle Sub Category</label>
                      <select class="form-control" id="subid" placeholder="Vehicle Sub Category" ng-model="subcat" required>
                        <option ng-repeat="x in subcatop" ng-selected="subcat == x">{{x}}</option>
                      </select>
                      <div class="valid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom02">Driver Licence No</label>
                      <input type="text" class="form-control" id="validationCustom02" placeholder="Driver Licence No" ng-model="dlicence_number" required>
                      <div class="valid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="vpic">Vehicle Photo</label>
                      <input type="file" class="form-control" ng-model="vphoto" onchange="vehiclephoto(this)" required="true" id="vphoto">
                      <div class="valid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <canvas style="display: none;" ng-hide="canvas1" id="vehiclephoto_canvas"></canvas>
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustomUsername">Driver Licence Doc</label>
                      <input type="file" class="form-control" ng-model="dlicence_doc" onchange="dvlphoto(this)" required="true" id="ddoc">
                      <div class="invalid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <canvas style="display: none;" ng-hide="canvas2" id="drawdlphoto_canvas"></canvas>
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustomUsername">Insurance Photo</label>
                      <input type="file" class="form-control" ng-model="dimage" onchange="dpic(this)" required="true" id="dpp">
                      <div class="invalid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                    <canvas style="display: none;" ng-hide="canvas3" id="drawdpic_canvas"></canvas>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustomUsername">Driver Experience</label>
                      <input type="text" class="form-control" id="validationCustomUsername" onkeypress="return isNumber(event)" ng-model="dexperience" placeholder="Driver Experience" required>
                      <div class="invalid-feedback">
                        this filed is requred!
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-secondary" ng-click="reset()">Reset</button>
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
              </div>
            </div>
            <?php }?>
          </div>
      </div>
      </div>
    </section>
  </div>
</div>
</section>
</div>
</div>
</div>
<div class="modal" id="exampleModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <img src="<?= base_url()?>app-assets\images\agent\driver_photo\<?= $list[0]->dimage;?>" style="width: 100%;height: 100%;">
      </div>

    </div>
  </div>
</div>

<div class="modal" id="exampleModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <img src="<?= base_url()?>app-assets\images\agent\driver_doc\<?= $list[0]->dlicence_doc;?>" style="width: 100%;height: 100%;">
      </div>

    </div>
  </div>
</div>
<div class="modal" id="exampleModal4">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <img src="<?= base_url()?>app-assets\images\agent\vehicle_photo\<?= $list[0]->vphoto;?>" style="width: 100%;height: 100%;">
      </div>

    </div>
  </div>
</div>
<div class="modal" id="mapModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
      <div id="map" style="width: 100%;height: 100%;"></div>
      </div>

    </div>
  </div>
</div>
<script>
  // vehiclephoto
  function vehiclephoto(ele) {
  var img = new Image();
  img.onload = drawvehiclephoto;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function drawvehiclephoto() {
  var canvasv = document.getElementById('vehiclephoto_canvas');
  $(canvasv).show();
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
  vphotos=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
// vehiclephoto end
// dlphotso start
  function dvlphoto(ele) {
  var img = new Image();
  img.onload = drawdlphoto;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function drawdlphoto() {
  var canvasdl = document.getElementById('drawdlphoto_canvas');
  $(canvasdl).show();
if (this.width>500) 
{
    canvasdl.width = 500;
}
else
{
   canvasdl.width = this.width; 
}
 if (this.height>500) 
{
    canvasdl.height = 500;
}
else
{
   canvasdl.height = this.height; 
}
  var ctxdl = canvasdl.getContext('2d');
  ctxdl.drawImage(this, 0,0,canvasdl.width,canvasdl.height);
  var dataURL = canvasdl.toDataURL("image/png");
  dlphotos=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
//dlphoto end
//dpic start
function dpic(ele) {
  var img = new Image();
  img.onload = drawdpic;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function drawdpic() {
  var canvasdp = document.getElementById('drawdpic_canvas');
  $(canvasdp).show();
if (this.width>500) 
{
    canvasdp.width = 500;
}
else
{
   canvasdp.width = this.width; 
}
 if (this.height>500) 
{
    canvasdp.height = 500;
}
else
{
   canvasdp.height = this.height; 
}
  var ctxdp = canvasdp.getContext('2d');
  ctxdp.drawImage(this, 0,0,canvasdp.width,canvasdp.height);
  var dataURL = canvasdp.toDataURL("image/png");
  dp=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
function failed() {
  console.error("The provided file couldn't be loaded as an Image media");
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-gHE38DViTrpJpwjnj7fObqkbi0Z10dc&ca"></script>
<script>
function adhar_doc_can(ele) {
         var img2 = new Image();
  img2.onload = drawdocument;
  img2.onerror = failed;
  img2.src = URL.createObjectURL(ele.files[0]);
        }
 function drawdocument() {
  var canvas = document.getElementById('doc_canvas');
 // $(canvas).show();
 if (this.width>1366) 
{
    canvas.width = 1366;
}
else
{
   canvas.width = this.width; 
}
 if (this.height>768) 
{
    canvas.height = 768;
}
else
{
   canvas.height = this.height; 
}
  var ctx = canvas.getContext('2d');
  ctx.drawImage(this, 0,0,canvas.width, canvas.height);
  var dataURL = canvas.toDataURL("image/png");
  doc=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
  var vphotos="";
  var dlphotos ="";
  var dp="";
  var app = angular.module('agent', []);
  app.controller('myCtrl',function($scope,$http)
  {
    $scope.table = true;
    $scope.formm = true;
    $scope.msg = true;
    $scope.canvas1 = true;
    $scope.canvas2 = true;
    $scope.canvas3 = true;
    $scope.add = function(){
      $scope.table = !$scope.table;
      $scope.formm = !$scope.formm;
      $scope.statchange = 'Add Vehicles';
      var msgdiv =$("#msgdiv");
  msgdiv.hide();
  var errordiv =$("#errordiv");
  errordiv.hide();
      $scope.vname = null;
        $scope.vnumber = null;
        $scope.vregistrationnumber = null;
        $scope.vphoto = null;
        $scope.dname = null;
        $scope.demail = null;
        $scope.dmobile = null;
        $scope.dlicence_number = null;
        $scope.dlicence_doc = null;;
        $scope.dimage = null;
        $scope.dexperience = null;
         $scope.id = null;
         $scope.cat =null;
         $scope.subcat = null;
         $('#vphoto').attr('required',true);
      $('#ddoc').attr('required',true);
      $('#dpp').attr('required',true);
      $scope.read = false;
      $scope.read2 = false;
    }
    //update complete form
    $scope.completeform = function(){
        $("#overlay").fadeIn();
        $http({
      method:"POST",
      url:"<?= base_url() ?>agent/complete_form",
      data:{"adhar_no":$scope.adhar_no,"adhar_doc":doc,'address':$scope.address,"driverbio":$scope.driverbio},
    }).then(function(responce){
        $('#overlay').fadeOut();
        //alert(responce.data);
        if(!responce.data['status']){
            swal('Sorry!','Opration failed!','error',{button: 'Okay',});
        }else{
            swal('Successfully Added!','just refresh the page..','success',{button: 'Okay',}).then((value)=>{
        location.reload();
            })
        }
    });
    }
    //end update complete form
    $scope.get_location=function(id)
    {
      $("#overlay").fadeIn();
      $http({
      method:"POST",
      url:"<?= base_url() ?>agent/view_location",
      data:{"id":id},
    }).then(function(responce){
      $('#overlay').fadeOut();
      //alert(responce.data['id']);
      $("#mapModal").modal("show");

        const initialPosition = { lat: parseFloat(responce.data['vlatitude']),lng: parseFloat(responce.data['vlongitude']) };
const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: {
            lat: parseFloat(responce.data['vlatitude']),
            lng: parseFloat(responce.data['vlongitude']),
          },
        });

  const marker = new google.maps.Marker({ map, position: initialPosition });
  $("#map").attr("style","width:100%;height:50vh;");
    });
    }
    $scope.sub = function(){
      $scope.table = !$scope.table;
      $scope.formm = !$scope.formm;
      var msgdiv =$("#msgdiv");
  msgdiv.hide();
  var errordiv =$("#errordiv");
  errordiv.hide();
    }
    $scope.category = function(){
      if($scope.cat=='CAB'){
         $scope.subcatop = ["Macro", "Sedan", "SUV", "Auto"];
         $scope.subcat="Macro";
      }
      else if ($scope.cat=='GOODS')
      {
        $scope.subcatop = ["Light", "Normal ", "Heavey"];
        $scope.subcat="Light";
      }
      else if ($scope.cat=='BIKE'){
        $scope.subcatop = ["Regular"];
        $scope.subcat="Regular";
      }
      else if ($scope.cat=='BIKE'){
        $scope.subcatop = [];
      }
    }
    $scope.submitForm = function(){
      // alert($scope.id);      // 
      $('#overlay').fadeIn();
      if($scope.id === null){
  $http({
      method:"POST",
      url:"<?= base_url() ?>agent/addvehicle",
      data:{"vname":$scope.vname,"vnumber":$scope.vnumber,"vregistrationnumber":$scope.vregistrationnumber,"vphoto":vphotos,"dimage":dp,'dlicence_number':$scope.dlicence_number,'dlicence_doc':dlphotos,'dexperience':$scope.dexperience,'cat':$scope.cat,'subcat':$scope.subcat},
    }).then(function(responce){
      $('#overlay').fadeOut();
      if (!responce.data['status']) 
      {
 var errordiv =$("#errordiv");
  errordiv.show();
  errordiv.html(responce.data['message']);
  var meee=responce.data["message"];
   swal('Sorry!',meee,'error',{button: 'Okay',});
      }
      else{
        $scope.vname = null;
        $scope.vnumber = null;
        $scope.vregistrationnumber = null;
        $scope.vphoto = null;
        $scope.dname = null;
        $scope.demail = null;
        $scope.dmobile = null;
        $scope.dlicence_number = null;
        $scope.dlicence_doc = null;;
        $scope.dimage = null;
        $scope.dexperience = null;
         $scope.id = null;
         $scope.cat =null;
         $scope.subcat = null;
  var msgdiv =$("#msgdiv");
  msgdiv.show();
  msgdiv.html(responce.data['message']);
  swal('Successfully Added!','just refresh the page..','success',{button: 'Okay',}).then((value)=>{
        location.reload();
       })
      }
    });
}
else{
     $http({
      method:"POST",
      url:"<?= base_url() ?>agent/editvehicle",
      data:{"id":$scope.id,"vname":$scope.vname,"vnumber":$scope.vnumber,"vregistrationnumber":$scope.vregistrationnumber,"vphoto":vphotos,"dimage":dp,'dlicence_number':$scope.dlicence_number,'dlicence_doc':dlphotos,'dexperience':$scope.dexperience,'cat':$scope.cat,'subcat':$scope.subcat},
    }).then(function(responce){
           $('#overlay').fadeOut();
      if (!responce.data['status']) 
      {
        console.log(responce.data);
 var errordiv =$("#errordiv");
  errordiv.show();
  errordiv.html(responce.data['message']);
  var meee=responce.data["message"];
   swal('Sorry!',meee,'error',{button: 'Okay',});
      }
      else{
        swal('Successfully Updated!','just refresh the page..','success',{button: 'Okay',}).then((value)=>{
        location.reload();
       })
        var msgdiv =$("#msgdiv");
  msgdiv.show();
  msgdiv.html(responce.data['message']);
      }
    });
  }
};
    $scope.edit = function(id){
      $('#overlay').fadeIn();
      $http({
        method:"POST",
        url:"<?= base_url()?>/agent/getvehicle",
        data:{"id":id},
      }).then(function(responce){
        $('#overlay').fadeOut();
        $scope.statchange = 'Edit Vehicles';
        $scope.table = !$scope.table;
      $scope.formm = !$scope.formm;
        $scope.vname = responce.data[0].vname;
        $scope.vnumber = responce.data[0].vnumber;
        $scope.vregistrationnumber = responce.data[0].vregistrationnumber;
        $scope.vphoto = responce.data[0].vphoto;
        $scope.dname = responce.data[0].dname;
        $scope.demail = responce.data[0].demail;
        $scope.dmobile = responce.data[0].dmobile;
        $scope.dlicence_number = responce.data[0].dlicence_number;
        $scope.dlicence_doc = responce.data[0].dlicence_doc;;
        $scope.dimage = responce.data[0].dimage;
        $scope.dexperience = responce.data[0].dexperience;
         $scope.id = responce.data[0].id;
         $scope.cat = responce.data[0].cat;
         $('#vphoto').removeAttr("required");
      $('#ddoc').removeAttr("required");
      $('#dpp').removeAttr("required");
            $scope.subcatop = [responce.data[0].subcat];
            $scope.subcat = responce.data[0].subcat;
         $scope.read = true;
      $scope.read2 = true;
        // $scope.repassword.hide();
      })
    }
    $scope.reset = function(){
      $scope.vname = null;
        $scope.vnumber = null;
        $scope.vregistrationnumber = null;
        $scope.vphoto = null;
        $scope.dname = null;
        $scope.demail = null;
        $scope.dmobile = null;
        $scope.dlicence_number = null;
        $scope.dlicence_doc = null;;
        $scope.dimage = null;
        $scope.dexperience = null;
         $scope.id = null;
         $scope.cat =null;
         $scope.subcat = null;
    }
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