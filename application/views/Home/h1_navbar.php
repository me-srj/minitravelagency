<body ng-controller="MainCtrl">    
<!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->
    <!-- Mainmenu Area End -->
       <div class="mobile-menu">
         <ul class="bottom-navbar-nav">
            <li class="bottom-nav-item active">
               <a href="<?= base_url()?>" class="bottom-nav-link">
               <i class="fa fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            
        
            <li class="bottom-nav-item">
               <a href="<?= base_url()?>my-rides" class="bottom-nav-link">
               <i class="fa fa-motorcycle"></i>
               <span>MY Rides</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <?php
if (!empty($this->session->userdata("customer"))) {
   ?>
            <a href="<?= base_url()."user-profile" ?>" class="bottom-nav-link">
               <i class="fa fa-user-circle"></i>
               <span>Account</span>
               </a>
   
   <?php
}
else
{
?>
            <a href="<?= base_url()."customer-Login" ?>" class="bottom-nav-link">
               <i class="fa fa-user-circle"></i>
               <span>Account</span>
               </a>
<?php
}
               ?>
            </li>

             <?php
if (!empty($this->session->userdata("customer"))) {
   ?>

            <li class="bottom-nav-item">
               <a href="<?= base_url() ?>Wallet/" class="bottom-nav-link">
               <i class="fa fa-inr"></i>
               <span>Wallet</span>
               </a>
            </li>
<?php
}
else
{
?>
            <li class="bottom-nav-item">
               <a href="<?=base_url()?>About" class="bottom-nav-link">
               <i class="fa fa-info-circle"></i>
               <span>About</span>
               </a>
               <?php
}
               ?>
            </li>

                  
            
         </ul>
      </div>     
     <!--Main Header Area Start -->
      <header class="gauto-main-header-area">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <img src="<?= base_url()?>app-assets/assets/img/favicon/logo.jpg" class="logo p-2 mb-2" border="0" alt="Mini Travel's" />
                  <div class="site-logo"">
                     <a href="<?= base_url();?>">
                <img src="https://www.animatedimages.org/data/media/67/animated-car-image-0021.gif" border="0" alt="animated-car-image-0150" / style="">
                     <h1 style="position:absolute;top:2px;">Mini<span style="color:#ec3323;">Travel's</span> </h1>
                     </a>
                  </div>
               </div>
               <div class="col-lg-6 col-sm-9">
                  <div class="header-promo">
                     <div class="single-header-promo">
                        <div class="header-promo-icon">
                           <img src="<?= base_url();?>/app-assets/assets/img/globe.png" alt="globe" />
                        </div>
                        <div class="header-promo-info">
                           <h3>Ranchi(834002)</h3>
                           <p>Jharkhand</p>
                        </div>
                     </div>
                     <div class="single-header-promo">
                        <div class="header-promo-icon">
                           <img src="<?= base_url();?>/app-assets/assets/img/clock.png" alt="clock" />
                        </div>
                        <div class="header-promo-info">
                           <h3>24 x 7</h3>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="header-action">
                     <a href="tel:+918789882539"><i class="fa fa-phone"></i> Request a call</a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Main Header Area End -->
       
       
      <!-- Mainmenu Area Start -->
      <section class="gauto-mainmenu-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-9">
                  <div class="mainmenu">
                     <nav>
                        <ul id="gauto_navigation">
                           <li class="active"><a href="<?= base_url();?>welcome/">home</a></li>
                           <li><a href="<?=base_url()?>About">about</a></li>
                           <li><a href="<?= base_url();?>Gallery/">gallery</a></li>
                           <li><a href="<?= base_url();?>/Contact">contact</a></li>
                            <li><a href="<?= base_url();?>/Privacy/">Privacy & Policy</a></li>

                           <?php
                            if(empty($this->session->userdata('customer'))){
                              ?>
                              <li>  <a href="<?= base_url()?>customer-Login">Account</a></li>

                          <?php }
                           else{
                              ?>
                               <li>
                              <a href="#">MY Account</a>
                              <ul>
                                 <li><a href="<?= base_url()?>my-rides">My Rides</a></li>
                                 <li><a href="<?= base_url()?>user-profile">My Profile</a></li>
                                 <li><a href="<?= base_url()?>user-logout">Log Out</a></li>
                              </ul>
                           </li>

                       
                       <?php
                           }

                           ?>
                           
                        </ul>
                     </nav>
                  </div>
               </div>
              
         </div>
      </section>
      <!-- Mainmenu Area End -->