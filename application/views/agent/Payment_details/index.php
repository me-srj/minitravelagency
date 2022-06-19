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
                    <th>S.no</th>
                    <th>Ride Details</th>
                    <th>Profit</th>
                    <th>Amount</th>
                    <th>GST</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=0;
                   foreach($list as $key=>$value){?>
                 <tr>
                      <td><?=++$i;?></td>
                       <td>From:<?= $value->fromaddress ?><br>
                         To:<?= $value->toaddress ?><br>
                         ON:<?= $value->ridingon ?>,Type:<?= $value->cat ?><br>
                         Vehicle:<?= $value->vname ?>,<?= $value->vnumber ?><br>
                         Total:<i class="badge badge-danger"><?= $value->fair+$value->tax ?> ₹</i>
                       </td>
                       <td><?= $value->toagent ?> ₹</td>
                        <td><?= $value->toadmin ?> ₹</td>
                        <td><?= $value->tax ?> ₹</td>
                        
                        <td><i class="badge badge-info"><?= $value->ptype ?>
                                                    <?php
                          if ($value->ptype=="cash") {
                            ?>
                            <i class="badge badge-info">Give <?= $value->toadmin ?>+ <?= $value->tax ?> ₹ To Admin</i>
                           
                            <?php
                          }
                          else
                          {
                          ?>
                           <i class="badge badge-info">Take <?= $value->toadmin ?>  ₹ From Admin</i>
                            
                            <?php
                          }
                          ?>
                        </i></td>
                        <td>
                          <?php
if ($value->paystatus=="due") {
  ?>
<i class="badge badge-danger">DUE</i>
  <?php
}
else
{
  ?>
<i class="badge badge-success">SENDED</i>
  <?php
}
                          ?>
                        </td>
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
