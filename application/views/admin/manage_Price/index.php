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
                  <li class="breadcrumb-item active" aria-current="page">Set Your Price</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  
          <!-- Card stats -->
          <div class="container-fluid mt--6" ng-app="myapp" ng-controller="myCtrl">
          <div class="row">
          <div class="col-md-12 card">
            <div class="card-header">
              <h3 class="mb-0">Set Price</h3>
              <p class="text-sm mb-0">
              </p>
              <div class="float-right">
                <!-- <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#myModal">Set Price</button> -->
              </div>
            </div>
            <div class="table-responsive mt-3">
<center>              <div class="dabge col-md-12" style="color:green;font-size:16px;font-weight:Bolder;" id="messagediv"><?=$this->session->flashdata('Msg')?></div></center>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success bg-lighten-4">
        <h4 class="modal-title">Pricing</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="<?= base_url()?>save_price">
      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
      <label class="control-label">Choose vechile category</label>
    <select name="vcat" class="form-control">
    <option value="Small" >Small</option>
    <option value="Medium" >Medium</option>
    <option value="Large" >Large</option>
    <option value="Regular" >Regular</option>
    <option value="Standard" >Standard</option>
    <option value="Light" >Light</option>
    <option value="Normal" >Normal</option>
    <option value="Heavy" >Heavy</option>
  </select>
  </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
    <label class="control-label">Ride Type </label>
    <select name="rtype" class="form-control" onchange="getval(this);">
    <option value="local" >Local Ride</option>
    <option value="outstation" >Outstation</option>
   
  </select>
  </div>
  </div>
      <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Rate Per Km</label>
        <input type="text" name="rpkm" placeholder="Price Per Km" class="form-control"  onkeypress="return isNumber(event)" />
        </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label>Driver Allowance</label>
        <input type="text" name="d_allowance" placeholder="Driver Allowance" class="form-control" onkeypress="return isNumber(event)" />
        </div></div>

     <div class="col-md-6">
     <div class="form-group">
        <label>Booking Fee</label>
        <input class="form-control" type="number" step="0.01" name="booking_fee"  onkeypress="return isNumber(event)" />
        </div>
      </div>
      
      <div class="col-md-6" id="base_price">
      <div class="form-group">
        <label>Base Price</label>
        <input class="form-control" type="number" step="0.01" name="base_price"  onkeypress="return isNumber(event)" />
        <h6>Set Your Base price in Local Ride only In Case Of Outstation It will automatically calculated on Fair Ratio of 60% And 40%</h6>
        </div>
        

      </div>
      </div>
      </div>
  <center><input type="submit" name="sub" value="Add" class="btn btn-success mb-3"></center>
      </form>
      </div>
    </div>
  </div>
</div>
              <table class="table file-export text-center align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Vechile Category</th>
                    <th>Ride Type</th>
                    <th>Rate Per Km</th>
                    <th>Driver Allowance</th>
                    <th>Booking Fee</th>
                    <th>Base Fare</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
$i=1;
foreach ($price as $price) {
 ?>
<tr>
  
  <td><?= $i++; ?></td>
  <td><?=$price->subcategory?></td>
  <td><?php if($price->ridetype=='local'){
    echo '<span class="badge badge-pill" style="color:#fff;background-color:#DC3545;">Local</span>';
  }else{
    echo '<span class="badge badge-pill badge-dark text-white">Outstation</span>';
  }?></td>
  <td><?=$price->rpkm?></td>
  <td><?=$price->dallowence?></td>
  <td><?=$price->brockarage?></td>
  <td><?php
  if($price->baseprice==0)
  {
      echo '---';
  }
  else{
      echo $price->baseprice;
  }
  ?></td>
  <td><a href="#" class="btn btn-primary btn-sm ft-edit-2 user_update" value="" data-toggle="modal" data-target="#edit<?php echo $price->id;?>"></a></td>
  
 
  </form>
</tr>

<div class="modal fade text-left" id="edit<?php echo $price->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-danger bg-lighten-4">
<h4 class="modal-title text-white" id="myModalLabel17">Edit Pricing</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?= base_url()?>Edit-price">
<div class="modal-body">
<div class="row">
      <div class="col-md-6">
      <div class="form-group">
      <label class="control-label">Choose vechile category</label>
    <select name="vcat" class="form-control">
    <option selected value="<?= $price->subcategory;?>" ><?= $price->subcategory;?></option>
  </select>
  </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
    <label class="control-label">Ride Type </label>
    <select name="rtype" class="form-control" onchange="getval2(this);">
    <option selected value="<?=$price->ridetype?>"><?=$price->ridetype?></option>   
  </select>
  </div>
  </div>
      <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Rate Per Km</label>
        <input type="text" name="rpkm" placeholder="Price Per Km" class="form-control" value="<?=$price->rpkm?>"  onkeypress="return isNumber(event)" />
        </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label>Driver Allowance</label>
        <input type="text" name="d_allowance" placeholder="Driver Allowance" value="<?=$price->dallowence?>" class="form-control" onkeypress="return isNumber(event)" />
        </div></div>

     <div class="col-md-6">
     <div class="form-group">
        <label>Booking Fee</label>
        <input class="form-control" type="number" step="0.01" name="booking_fee" value="<?=$price->brockarage?>"  onkeypress="return isNumber(event)" />
        </div>
      </div>
    <?php if ($price->ridetype=="local"){?>
      <div class="col-md-6" id="base_price2">
      <div class="form-group">
        <label>Base Price</label>
        <input class="form-control" type="number" step="0.01" name="base_price" value="<?= $price->baseprice;?>"  onkeypress="return isNumber(event)" />
        <h6>Set Your Base price in Local Ride only In Case Of Outstation It will automatically calculated on Fair Ratio of 60% And 40%</h6>
        </div>
      </div>
    <?php }?>
      </div>
<input type="hidden" name="id" class="form-control" value="<?php echo$price->id; ?>">
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Update</button>
</form>
</div>
</div>
</div>
<!-- model to edit category ends here -->





  <?php
}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
<script>

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
function getval(sel)
{
    if(sel.value=='local')
    {     
        
        $('#base_price').show(200);

    }
    else{
        
        $('#base_price').hide(200);

    }
}
function getval2(sel)
{
    if(sel.value=='local')
    {     
        
        $('#base_price2').show(200);

    }
    else{
        
        $('#base_price2').hide(200);

    }
}
</script>
