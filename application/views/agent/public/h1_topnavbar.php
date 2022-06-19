    <!-- BEGIN: Header-->
    <?php $agent=$this->session->userdata('agent');?>
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-semi-light fixed-top">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" data-toggle="tooltip" data-placement="bottom" title="Full Screen" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                       <!--  <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell bell-shake" id="notification-navbar-link"></i><span class="badge badge-pill badge-sm badge-danger badge-up badge-glow">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <div class="arrow_box_right">
                                    <li class="dropdown-menu-header">
                                        <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
                                    </li>
                                    <li class="scrollable-container media-list w-100">
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-share info font-medium-4 mt-2"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading info">New Order Received</h6>
                                                    <p class="notification-text font-small-3 text-muted text-bold-600">Lorem ipsum dolor sit amet!</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">3:30 PM</time></small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-save font-medium-4 mt-2 warning"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading warning">New User Registered</h6>
                                                    <p class="notification-text font-small-3 text-muted text-bold-600">Aliquam tincidunt mauris eu risus.</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">10:05 AM</time></small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-repeat font-medium-4 mt-2 danger"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading danger">New Purchase</h6>
                                                    <p class="notification-text font-small-3 text-muted text-bold-600">Lorem ipsum dolor sit ametest?</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Yesterday</time></small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-shopping-cart font-medium-4 mt-2 primary"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading primary">New Item In Your Cart</h6><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="ft-heart font-medium-4 mt-2 info"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading info">New Sale</h6><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                                </div>


public function for_store_minimum_alert()
{
    $sql = "SELECT * FROM `tbl_godawn_product_master` ";
    $x = mysqli_query($this->con,$sql);
    while($y = mysqli_fetch_assoc($x))
        {
         
         if($y['minimum_alert'] >= $y['quantity'])
         {
            echo "<pre>";print_r($y);
            $res = $y;
         }
        }
} -->




                                                
                                          <!--  </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item info text-right pr-1" href="javascript:void(0)">Read all</a></li>
                                </div>
                            </ul>
                        </li> -->
                        <li class="dropdown dropdown-user nav-item">
                            <?php if(empty($agent->photo)){$imgname='default.png';}else{$imgname=$agent->photo;}?>
                          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="<?= base_url() ?>app-assets/images/agent/profile/<?=$imgname;?>" alt="avatar" style="height:40px;width:48px;"></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="<?= base_url() ?>app-assets/images/agent/profile/<?=$imgname;?>" alt="" style="height:40px;width:48px;><span class="user-name text-bold-700 ml-1"> <?=$agent->name;?></span></span></a>
<div class="dropdown-divider"></div>

<a class="dropdown-item" href="<?= base_url() ?>agent/edit_profile/"><i class="ft-user"></i>My Profile</a>
<a class="dropdown-item" href="<?= base_url() ?>agent/edit_password/"><i class="ft-lock"></i>Change Password</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url() ?>welcome/agentlogout/"><i class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

 