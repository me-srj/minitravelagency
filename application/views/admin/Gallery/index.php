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
                  <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- Card stats -->
<div class="container-fluid mt--6" ng-app="myapp" ng-controller="myCtrl">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
             <div class="alert alert-info alert-dismissible text-center" ng-hide="msgdiv">
                  <button type="button" class="close" ng-click="msghide()">&times;</button>
          <p class="mt-3">{{messagediv}}</p></div>
                <div ng-hide="errordiv" class="alert alert-danger alert-dismissible text-center">
          <button type="button" class="close" ng-click="msghide()">&times;</button>
          <p class="mt-3">{{messagediv}}</p></div>
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Gallery</h3>
              <p class="text-sm mb-0">
              </p>
              <div class="float-right">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">+</button>
                    </div>
            </div>

            <div class="table-responsive py-4">
              <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Photo</th>
                    <th>View</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($gallery_photos as $key => $value) {
                  ?>
               
                    <tr>
                      <td><?=++$i;?></td>
                       <td><img src="<?=base_url()?>app-assets/images/gallery/<?= $value->file_name?>" style="height: 55px; width: 55px;" class="rounded-circle img-thumbnail"></td>
                        <td><i class="fa fa-eye"> </i></td>
                        <td class="text-danger" ng-click="delete(<?=$value->id;?>)"><i class="fa fa-trash fa-2x"></i></td>
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
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Photos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url()?>admin/save_gallery"  enctype="multipart/form-data">
        <label class="control-label">Name</label>
        <input type="file" name="userfile[]" multiple="multiple" class="form-control">
       
  <br>
  <center><input type="submit" name="submit" value="Add" class="btn btn-success btn-sm"></center>
      </form>
      </div>
    </div>
  </div>
</div>
 <!-- Delete The Modal -->
  <div class="modal fade" id="deletemodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h5>Delete This Row </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <center><i class="fa fa-trash fa-5x text-danger"></i></center>
          <br/>
          <center><h2>Are You Sure ?</h2></center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" ng-click="deleterow()">Confirm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<script type="text/javascript">
  var app = angular.module('myapp', []);
app.controller('myCtrl', function($scope, $http) {
  $scope.errordiv = true;
  $scope.msgdiv = true;
  $scope.delete = function(id)
  {
   $("#deletemodel").modal("show"); 
   $scope.deleterow = function()
   {
    $http({
      method:"POST",
      url:"<?= base_url() ?>admin/delete_manage_gallery",
      data:{'id':id},
    }).then(function(response)
    {
      if(response.data=='true')
      {
        $scope.msgdiv = false;
  $scope.messagediv = 'Photo Edit Deleted Successfully !';
  $("#deletemodel").modal("hide");
      }
      else{
        $scope.errordiv = false;
        $scope.messagediv = 'Techinical Error !'
        $("#deletemodel").modal("hide");
      }
    })
   }
  }
});
</script>