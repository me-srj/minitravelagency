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
                  <li class="breadcrumb-item active" aria-current="page">Pending Payments</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- Card stats -->
          <div class="container-fluid mt--6">
          <div class="row">
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
              <table class="table file-export align-items-center">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Agent Name</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Action</th>
                    <th>on</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach ($payments as $key => $value) {
                  ?>
                    <tr>
                      <td><?=++$i;?></td>
                    <td><?= $value->name.",".$value->mobile.",".$value->email ?></td>
                    <td> &#8377; <?= -($value->amount) ?></td>
                    <td><?= "Account/UPI: ".$value->accountnumber."<br>IFSC: ".$value->ifsc ?></td>
                    <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deletemodel">Mark as Sended</button></td>
                    <td><?= date('l jS \of F Y h:i:s A',strtotime($value->pcon)) ?></td>
                    </tr>
                   <?php
                     }
                ?>                 
          
 <!-- The Modal -->
  <div class="modal fade" id="deletemodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h5>Mark as sended </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>admin/acceptpayment/">
          <center><h2>Please Enter TXN ID</h2></center>
          <input type="hidden" value="<?= $value->amount ?>" name="amount">
          <input type="hidden" value="<?= $value->agentid ?>" name="aid">
          <input type="hidden" value="<?= $value->payid ?>" name="payid">
<input required="" type="text" name="txnid" class="form-control" placeholder="Enter a TXN ID:">
<br><center><input type="submit" value="Mark as accepted" class="btn btn-warning btn-sm" name="submit"></center>
        </form>
        </div>
    </div>
    </div>
  </div>
                
                </tbody>
              </table>
            </div>
          </div>
          </div>
        