 <?php
$i=0;
  ?>
     <!DOCTYPE html>
     <html>
     <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Title -->
      <title>Mini Travels | A tour And Travel Company</title>
      <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
<meta name="description" content="MiniTravel's a new startup company providing a mobility platform for travelling and transporting goods across India. The MiniTravel app offers mobility solutions by connecting customers to drivers and a wide range of vehicles across bikes, auto-rickshaws, metered taxis, and cabs, enabling convenience and transparency for thousands of customers and driver-partners. MiniTravel's core target is to serve the customer as per their demand at affordable cost, Beginning from Jharkhand"/>
<meta name="keywords" content="Best service in ranchi,minitravel,minitravels minitravelagency,mini travel agency ,mini car in ranchi,car booking service,hire car in ranchi,car hiring,best cab service in ranchi,Car rentals jharkhnad, book cabs online, book taxi online, airport taxi jharkhnad, cabs in jharkhnad, taxi in jharkhnad, cabs services in jharkhnad, taxi services in jharkhnad, car rental services in jharkhnad, car rentals, taxi, cabs, hire, rent"/>
<meta name="author" content="A tour and Travel Company mini travel agency " />
<meta name="expires" content="never" />
<meta name="distribution" content="global" />
<meta name="copyright" content="https://www.minitravelagency.com/" />
<meta name="email" content="minitravelagency@gmail.com" />
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>app-assets/assets/img/favicon/minitravel.png">
      <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url()?>\app-assets\css\newmyrides.css">
       <style type="">
       #cab{
        height:14px;
       }
           @media only screen and (max-width:770px) {
  .bgimage {
    display:none;
  }
}
         </style>
     </head>

     <body>
         <!-- Preloading -->
    <div class="preloading">
      <div class="wrap-preload">
        <div class="cssload-loader"></div>
      </div>
    </div>
    <!-- .Preloading -->
         <header>
      <div class="toolbar">
        <a class="backBtn" href="<?= base_url()?>">
        <i class="fa fa-arrow-left"></i>
        </a>
        <div class="heading">Your Rides</div>

      </div>
    </header> 
         <div class="col-md-12">
        <div class="row"> 
  <div class="col-md-6 mt-5 myridesdiv" > 
          <?php
           foreach ($rides as $key) {
            ?>
  <a style="text-decoration: none;" href="<?=base_url().'my-ride?id='.base64_encode($key->id);?>">
        <div class="card bg-white">
        <div class="card-body">
            <div class="ride-row ptr disabled-false">
                <div class="left">
                    <div class="class-icon cab-icon">
                       <?php
                       $img='';
                       if($key->subcat==='Sedan')
                       {
                           $img='sedan.jpg';
                        }
                        elseif($key->subcat==='Macro')
                        {
                            $img='macro.jpg';
                        }
                        elseif($key->subcat==='SUV')
                        {
                            $img='suv.jpg';
                        }
                        elseif($key->subcat==='Regular')
                        {
                            $img='bike.png';
                        }
                        elseif($key->subcat==='Auto')
                        {
                            $img='tempu.png';
                        }
                        elseif($key->subcat==='Light')
                        {
                            $img='tempu.png';
                        }
                        elseif($key->subcat==='Normal')
                        {
                            $img='normal.jpg';
                        }
                        elseif($key->subcat==='Heavy'){
                            $img='truck.png';
                            
                        }?>
                         <img srcset="<?=base_url()?>app-assets\img\utemp\<?=$img;?>" alt="car image" width="35" height="15">
                    </div>
                </div>
                <div class="middle">
                    <div class="text value"><?=date('D M d, h:i A',strtotime($key->ridingon))?></div>
                    <div class="desc"><?=$key->type.'('.$key->ptype.')'; ?></div>
                    <div class="address-holder">                        
                            <div class="from dot"></div>
                            <div class="address desc"><?=$key->fromaddress;?></div>                        
                            <br>|<br>
                            <div class="to-address">
                                <div class="to dot"></div>
                                <div class="address desc"><?=$key->toaddress;?></div>
                            </div>                       
                                </div>
                            </div>
                            <div class="far-right">
                                <div class="status COMPLETED">
                                    <span>₹<?=$key->fair+$key->tax;?></span>
                                </div>                    
                                    <div class="right-driver-icon">
                                        <div >
                                        
                                            <img alt="driver" src="<?=base_url().'app-assets\img\utemp'?>\driver_placeholder.png">
                                            
                                        </div>
                                        <?php
                                        if ($key->cstatus=="cancel") {
                                        ?>
                                        <div class="booking_status text-danger">Canceled!</div>
                                      <?php
                                        }
                                        else
                                        {
 if(empty($key->dstatus))
                                         {
                                          ?>
                                        <div class="booking_status text-danger">Waiting...</div>
                                      <?php
                                       }
                                      else if($key->dstatus=='compteted'){?>
                                        <div class="booking_status text-sucess">Completed</div>
                                      <?php }
                                      else if($key->dstatus=='waiting'){?>
                                        <div class="booking_status text-info">Reached...</div>
                                      <?php }
                                      else if($key->dstatus=='accepted')
                                        {
                                          ?>
                                        <div class="booking_status text-success">Accepted!</div>
                                      <?php
                                       }
                                        }
                                       ?>
                                    </div>
                            </div>
                            </div>
                        </div>
                      </div>
                      </a>
                <?php 
              }
              if (empty($rides)) {
              ?>
<label class="form-control alert alert-info" style="text-align: center;padding: 8px;"><i>You Haven't travelled with US Till Now.</i></label>
              <?php
              }
               ?>
               </div>
        <div class="col-md-6 bgimage" style="padding-right: 0px; "> 
            <div class="img-cover">
        <img src="<?=base_url().'app-assets\img\utemp'?>\bg-cover.jpg"  class="img img-responsive">
        </div>   

        </div>
    </div>
     </div>
     <script>
    (function ($) {

  "use strict";
    $(window).on('load',function() { 
          $(".preloading").fadeOut("slow"); 
      });
    })(jQuery);
  </script>
     </body>
     </html>