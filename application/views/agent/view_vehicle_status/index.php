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

<section id="horizontal">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-arrows-v"></i> Vehicles Status</h4>
                    <div class="heading-elements mt-0.5">
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table display nowrap table-striped table-bordered scroll-horizontal">

                <thead class="">
                  <tr>
                    <th>Serial No</th>
                    
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Book On</th>
                    <th>Return On</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>Status</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                  $i=0;
                   foreach($list as $key){?>
                  <tr>
                    <td><?= ++$i;?></td>                
                    
                    <td><?= $key->fromaddress;?></td>
                    <td><?= $key->toaddress;?></td>
                    <td><?= $key->bookdate;?></td>
                    <td><?= $key->returndate;?></td>
                    <td><?= $key->type;?></td>
                    <td><i class="la la-rupee"></i><?= $key->fair;?></td>
                    <td><?= $key->payment;?></td>
                    <td>
                          <?php
if ($key->dstatus=='waiting') {
?>
<a class="btn btn-warning btn-sm buttonAnimation" data-animation="rubberBand"  href>Waiting</a>
<?php
}
else if($key->dstatus=='accepted')
{
?>
<a class="btn btn-sm btn-info buttonAnimation" data-animation="tada" href>Accepted</a>
<?php
}
else
{
  ?>
<a class="btn btn-success btn-sm buttonAnimation" data-animation="rubberBand" href>Completed</a>
  <?php
}
    ?>
                    </td>
                  </tr>
                  <?php
                };?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
<script type="text/javascript">
  var app = angular.module('agent', []);
  app.controller('myCtrl',function($scope,$http)
  {
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
