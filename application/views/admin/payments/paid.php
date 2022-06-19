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
                  <li class="breadcrumb-item active" aria-current="page">Paid Payments</li>
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
                    <th>Payment</th>
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
                    <td><?= $value->name."<br>".$value->mobile.",".$value->email ?></td>
                    <td> &#8377; <?= -($value->amount) ?></td>
                    <td><?= "Account/UPI: ".$value->accountnumber."<br>IFSC: ".$value->ifsc ?></td>
                    <td>TXN ID: <?= $value->rrid ?><br>On :<?= date('l jS \of F Y h:i:s A',strtotime($value->pon)) ?></td>
                    <td><?= date('l jS \of F Y h:i:s A',strtotime($value->pcon)) ?></td>
                    </tr>
                   <?php
                     }
                ?>                                 
                </tbody>
              </table>
            </div>
          </div>
          </div>
        