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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url()?>app-assets/preloader/preloader.css">
   <link rel="stylesheet" type="text/css" href="<?=base_url()?>\app-assets\css\newmyrides.css">
 
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
        <div class="heading">Choose Rides</div>

      </div>
    </header> 
         <div class="col-md-12">
        <div class="row"> 
  <div class="col-md-6 text-center pt-2  mt-5 myridesdiv" > 
   <button id="cabbtn" onclick="showdivs(this.id)" style="background-color: #337AB7;color: #fff;border:1px solid #000; width: 33%;float: left;"class="btn btn-lg"><i class="fa fa-cab"></i></button>
   <button id="bikebtn" onclick="showdivs(this.id)" style="background-color: #fff;border:1px solid #000; width: 33%;float: left;margin-left: 2px;"class="btn btn-lg"><i class="fa fa-motorcycle"></i></button>
   <button id="truckbtn" onclick="showdivs(this.id)" style="background-color: #fff;border:1px solid #000; width: 33%;"class="btn btn-lg"><i class="fa fa-truck"></i></button>
   <script type="text/javascript">
     function showdivs(id) {
       if (id=="cabbtn") {
        $("#truckbtn").css({"background-color": "#fff", "color": ""});
        $("#bikebtn").css({"background-color": "#fff", "color": ""});
        $("#cabbtn").css({"background-color": "#337AB7", "color": "#fff"});
        $("#cabdiv").slideDown();
        $("#truckdiv").slideUp();
        $("#bikediv").slideUp();
       }
       if (id=="truckbtn") 
       {
        $("#cabbtn").css({"background-color": "#fff", "color": ""});
        $("#bikebtn").css({"background-color": "#fff", "color": ""});
        $("#truckbtn").css({"background-color": "#337AB7", "color": "#fff"});
        $("#cabdiv").slideUp();
        $("#truckdiv").slideDown();
        $("#bikediv").slideUp();
       }
       if (id=="bikebtn") 
       {
        $("#cabbtn").css({"background-color": "#fff", "color": ""});
        $("#truckbtn").css({"background-color": "#fff", "color": ""});
        $("#bikebtn").css({"background-color": "#337AB7", "color": "#fff"});
        $("#cabdiv").slideUp();
        $("#truckdiv").slideUp();
        $("#bikediv").slideDown();
       }
     }
   </script>
          <?php
          $small='(unavilable)';
          $medium='(unavilable)';
          $large='(unavilable)';
          $auto='(unavilable)';
          $regular='(unavilable)';
          $light='(unavilable)';
          $normal='(unavilable)';
          $heavy='(unavilable)';
          //href
          $small_herf='#';
          $medium_herf='#';
          $large_herf='#';
          $auto_herf='#';
          $regular_herf='#';
          $light_herf='#';
          $normal_herf='#';
          $heavy_herf='#';
          foreach ($car_list as $key) {
            if($key->subcat === 'Macro'){
              $small='';
              $small_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'Sedan') {
              $medium='';
              $medium_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'SUV') {
              $large='';
              $large_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'Auto') {
              $auto='';
              $auto_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'Regular') {
              $regular='';
              $regular_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'Light') {
              $light='';
              $light_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'Normal') {
              $normal='';
              $normal_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
            elseif ($key->subcat === 'Heavy') {
              $heavy='';
              $heavy_herf=base_url().'Book-Car?id='.base64_encode($key->vecid);
            }
          }
          // base_url().'Book-Car?id='.base64_encode($key->vecid)
          //  echo'<pre>';
          // print_r($car_list);
          // die;
          $status='unavilable';
          $dis= $this->session->userdata('booking_deatils')['distance'];
          $round= $this->session->userdata('booking_deatils')[0];
            ?>
              <div id="cabdiv" class="cab">
              <div class="row alert alert-warning">Cabs near By...</div>
             <!--  echo $small; -->
             <a style="text-decoration: none;color: #000;" href="<?=$small_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets\img\utemp\macro.jpg" alt="small" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">MACRO <span > <?=$small?> </span></div>
                  <p style="color: #6c757d">Swift,Wagonr,Indica.</p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[0]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
             <!--  echo $medium; -->
             <a style="text-decoration: none;color: #000;" href="<?=$medium_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets\img\utemp\sedan.jpg" alt="sedan" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">SEDAN <span> <?=$medium?></span></div>
                  <p style="color: #6c757d">Dzire,Zest,Indigo,Xcent.</p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[1]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              <!-- echo $large; -->
              <a style="text-decoration: none;color: #000;" href="<?=$large_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets\img\utemp\suv.jpg" alt="suv" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">SUV<span>  <?=$large?></span></div>
                  <p style="color: #6c757d">Bolero,Scorpio</p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[2]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              <!-- echo $auto; -->
              <a style="text-decoration: none;color: #000;" href="<?=$auto_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets\img\utemp\tempu.png" alt="auto" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">AUTO <span> <?=$auto?></span></div>
                  <p style="color: #6c757d">Auto-Rikshaw,E-Rikshaw.</p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[4]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              </div>
              <div id="bikediv" style="display: none;">
              <div class="row alert alert-info">Bikes near By...</div>
              <!-- echo $regular; -->
              <a style="text-decoration: none;color: #000;" href="<?=$regular_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets/img/utemp/bike.png" alt="bike" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">BIKE <span><?=$regular?></span></div>
                  <p style="color: #6c757d">Pulsar,DIscover,Hero,Honda Etc.</p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[3]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              </div>
              <div id="truckdiv" class="truck" style="display: none;">
              <div class="row alert alert-success">Goods Vechicle Near By...</div>
              <!-- echo $light; -->
              <a style="text-decoration: none;color: #000;" href="<?=$light_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets\img\utemp\tempu.png" alt="small" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">LIGHT <span><?=$light?></span></div>
                  <p style="color: #6c757d"></p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[5]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              <!-- echo $normal; -->
              <a style="text-decoration: none;color: #000;" href="<?=$normal_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">
                        <img srcset="<?=base_url()?>app-assets\img\utemp\normal.jpg" alt="small" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">NORMAL <span><?=$normal?></span></div>
                  <p style="color: #6c757d"></p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[6]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              <!-- echo $heavy; -->
              <a style="text-decoration: none;color: #000;" href="<?=$heavy_herf;?>">
                <div class="card">
        <div class="card-body mt-0">
            <div class="ride-row mb-0">
                <div class="left2">
                    <div class="class-icon cab-icon">

                        <img srcset="<?=base_url()?>app-assets\img\utemp\truck.png" alt="small" width="50" height="30">
                    </div>
                </div>
                <div class="middle2 text-left">
                  <div class="subcatname">HEAVY <span><?=$heavy?></span></div>
                  <p style="color: #6c757d"></p>
                </div>
                <div class="far-right2">
                  <h5 class="text-right"><span class="fa fa-inr"></span><?=ceil($pricing[7]->price);?></h5>
                </div>
              </div>
            </div>
          </div>
              </a>
              </div>
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