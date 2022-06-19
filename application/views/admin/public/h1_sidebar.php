
  <!-- End Google Tag Manager (noscript) --><!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="<?= base_url() ?>admin">
         <img class="brand-logo" alt="logo" src="<?= base_url() ?>app-assets/assets/img/favicon/adminmini.png"/> 
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block active" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner"> 
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Home</span>
              </a>
              <div class="collapse" id="navbar-dashboards" style="">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/edit_profile/" class="nav-link">
                      <span class="sidenav-mini-icon"> E </span>
                      <span class="sidenav-normal"> Edit Profile </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/edit_password/" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Update Password </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>Manage-Gallery" class="nav-link">
                      <span class="sidenav-mini-icon"> G </span>
                      <span class="sidenav-normal"> Manage Gallery</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
<!--             <li class="nav-item">
              <a class="nav-link collapsed" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-black"></i>
                <span class="nav-link-text">Manage Dashboard</span>
              </a>
            <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                 
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/manage_About/" class="nav-link">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal">Manage About Us Contnet</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>admin/manage_car/" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-bus-front-12 text-orange"></i>
                <span class="nav-link-text">Manage Cars</span>
              </a>
         
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>admin/manage_Price/" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-bus-front-12 text-orange"></i>
                <span class="nav-link-text">Manage Price</span>
              </a>
         
            </li>
<!-- 
             <li class="nav-item">
              <a class="nav-link collapsed" href="#nav" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-bus-front-12 text-orange"></i>
                <span class="nav-link-text">Manage Price</span>
              </a>
            <div class="collapse" id="nav">
                <ul class="nav nav-sm flex-column">
                   <li class="nav-item">
                    <a href="<?= base_url() ?>admin/manage_price/" class="nav-link">
                       <i class="ni ni-pin-3 text-orange"></i>
                      <span class="sidenav-normal">Manage Price</span>
                    </a>
                  </li>

                    <li class="nav-item">
                    <a href="<?= base_url() ?>admin/manage_discount/" class="nav-link">
                       <i class="ni ni-pin-3 text-orange"></i>
                      <span class="sidenav-normal">Manage Discount %</span>
                    </a>
                  </li>

                 
                </ul>
              </div>
            </li> -->
            <li class="nav-item">
                    <a href="<?= base_url() ?>admin/coupans/" class="nav-link">
                       <i class="ni ni-headphones text-orange"></i>
                      <span class="sidenav-normal">Manage Coupans</span>
                    </a>
                  </li>           
          
             <li class="nav-item">
              <a class="nav-link" href="#booking" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-user-run text-red"></i>
                <span class="nav-link-text">Manage Customers</span>
              </a>
            <div class="collapse" id="booking">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/Customer_booking" class="nav-link">
                      <span class="sidenav-mini-icon"> N </span>
                      <span class="sidenav-normal"> Customer Booking </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/Customers" class="nav-link">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal">Customer Records</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>             
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>admin/agents">
                <i class="ni ni-trophy text-green"></i>
                <span class="nav-link-text">Manage Pilots</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>admin/rides">
                <i class="ni ni-bus-front-12 text-green"></i>
                <span class="nav-link-text">Manage Rides</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#assets" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-user-run text-red"></i>
                <span class="nav-link-text">Manage Payments</span>
              </a>
            <div class="collapse" id="assets">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/Payments" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Due Payments</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/PaymentsPaid" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Paid Payments</span>
                    </a>
                  </li>
                                    <li class="nav-item">
                    <a href="<?= base_url() ?>admin/wallettxn" class="nav-link">
                      <span class="sidenav-mini-icon"> W </span>
                      <span class="sidenav-normal">Wallet Txn</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin/ridetxn" class="nav-link">
                      <span class="sidenav-mini-icon"> R </span>
                      <span class="sidenav-normal">Ride Txn</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav><!-- Main content -->