    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?=base_url(); ?>app-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
     <a class="navbar-brand" href="#"><img class="brand-logo" alt="logo" src="<?= base_url() ?>app-assets/assets/img/favicon/logo.jpg"/>
                        <h3 class="brand-text">Minitravel</h3></a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="navigation-background"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <?php
                 if(!empty($this->session->userdata('pilot'))){?>
                <li class=" nav-item"><a href="<?= base_url() ?>agent/"><i class="ft-grid"></i><span class="menu-title" data-i18n=""> Dashboard</a>
                </li>
<?php
if ($pilot->status=="free") {
  ?>
       <li class=" nav-item"><a href="<?= base_url() ?>pilot/ridefeed"><i class="la la-motorcycle"></i><span class="menu-title" data-i18n=""> Near By Ride</a></li>
    <li class=" nav-item"><a href="<?= base_url() ?>pilot/future_rides"><i class="ft-watch"></i><span class="menu-title" data-i18n=""> Future Rides</a></li>
<li <?php if ($pilot->alocal=="yes") {echo 'style="display:none;"';} ?> id="noalocal" class="nav-item">
 <a class="nav-link" href="#" ng-click="change_status('alocal','yes','#noalocal','#yesalocal')" role="button" >
  <i class="fas fa-toggle-off text-primary"></i>
  <span class="nav-link-text">Local Rides <i class="badge badge-info">No!</i></span>
  </a>
</li>
<li <?php if ($pilot->alocal=="no") {echo 'style="display:none;"';} ?> id="yesalocal" class="nav-item">
 <a class="nav-link" href="#" ng-click="change_status('alocal','no','#yesalocal','#noalocal')" role="button" >
  <i class="fas fa-toggle-on text-primary"></i>
  <span class="nav-link-text">Local Rides <i class="badge badge-success">Yes!</i></span>
  </a>
</li>
<li <?php if ($pilot->along=="yes") {echo 'style="display:none;"';} ?> id="noalong" class="nav-item">
 <a class="nav-link" href="#" ng-click="change_status('along','yes','#noalong','#yesalong')" role="button" >
  <i class="fas fa-toggle-off text-primary"></i>
  <span class="nav-link-text">Long Rides <i class="badge badge-warning">No!</i></span>
  </a>
</li>
<li <?php if ($pilot->along=="no") {echo 'style="display:none;"';} ?> id="yesalong" class="nav-item">
 <a class="nav-link" href="#" ng-click="change_status('along','no','#yesalong','#noalong')" role="button" >
  <i class="fas fa-toggle-on text-primary"></i>
  <span class="nav-link-text">Long Rides <i class="badge badge-success">Yes!</i></span>
  </a>
</li>
<li class=" nav-item"><a href="<?= base_url() ?>vehicle-status"><i class="ft-bar-chart"></i><span class="menu-title" data-i18n=""> Booking History</span></a></li>
<li class=" nav-item"><a href="<?= base_url() ?>Payment-Details"><i class="la la-arrows-h"></i><span class="menu-title" data-i18n=""> Payment Details</span></a></li>
<?php }
}
?>
<li class=" nav-item"><a href="<?= base_url() ?>agent/myvehicle"><i class="la la-cab"></i><span class="menu-title" data-i18n=""> My Vehicles </span></a>
                </li>
<li class=" nav-item"><a href="<?= base_url() ?>agent/wallet"><i class="la la-money"></i><span class="menu-title" data-i18n=""> My Wallet </span></a>
                </li>
<li class=" nav-item"><a href="<?= base_url() ?>agent/passbook"><i class="la la-book"></i><span class="menu-title" data-i18n="">Passbook</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->