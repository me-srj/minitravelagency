  <!-- Slider Area Start -->
       <!-- vsGoogleAutocomplete -->
    <script src="<?= base_url()?>app-assets/location/vs-google-autocomplete.js"></script>
    
    <script src="<?= base_url()?>app-assets/location/app.js"></script>
    <?php date_default_timezone_set('Asia/Kolkata');
        $current_date= date('Y-m-d\TH:i');
        $max_date= date('Y-m-d\TH:i', strtotime($current_date. ' + 30 days'));
        ?>
      <section class="gauto-slider-area fix">
         <div class="gauto-slide owl-carousel">
          <?php

foreach ($coupans as $key) {
if ($key->id%2==0) {
  ?>
              <div class="gauto-main-slide slide-item-2">
               <div class="gauto-main-caption">
                  <div class="gauto-caption-cell">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="slider-text">
                                 <p>Use "<?= $key->name ?>" @ <?= round($key->discount) ?> % OFF</p>
                                 <h2><?= $key->description; ?></h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
<?php
}
else
{
?>
<div class="gauto-main-slide slide-item-1">
               <div class="gauto-main-caption">
                  <div class="gauto-caption-cell">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="slider-text">
                                 <p>Use "<?= $key->name ?>" @ <?= round($key->discount) ?> % OFF</p>
                                 <h2><?= $key->description; ?></h2>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
<?php
}
}
          ?>
         </div>
      </section>
      <!-- Slider Area End -->
      <!-- Find Area Start -->
      <section class="gauto-find-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="find-box">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="find-text">
                              <h3>Search Your Best Deals.</h3>
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="row">
<div class="col-md-12 badge badge-danger"  style="display:none;"></div>
               <div class="col-md-12">
                  <div class="offer-tabs">
                     <ul class="nav nav-tabs" id="offerTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="all-tab" data-toggle="tab" href="#local" role="tab" aria-controls="all" aria-selected="true">Local Trip</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="nissan-tab" data-toggle="tab" href="#round" role="tab" aria-controls="nissan" aria-selected="false">Outstation</a>
                        </li>
                        
                     </ul>
                     <div class="tab-content" id="offerTabContent">
                        <!-- All Tab Start -->
                        <div class="tab-pane fade show active" id="local" role="tabpanel" aria-labelledby="all-tab">
                               <div class="find-form">
                              <form method="post" action="<?= base_url()?>find-car">
                                 
                                 <div class="row">
                                    <div class="col-md-6">                 

                                       <div class="input-group mb-3">
                                      <input vs-google-autocomplete                 
                                     ng-model="address.name"                
                                     vs-latitude="address.components.location.lat"
                                     vs-longitude="address.components.location.long"            
                                     type="text" 
                                     name="address"
                                     id="address"
                                     class="form-control" 
                                     placeholder="Enter address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append currentlocdiv">
                      <span class="input-group-text btn btn-sm" id="basic-addon2" ng-click="currentlocation()"><i class="fa fa-crosshairs text-danger"></i></span>
                                    </div>
                                    </div>
                 <input type="text" name="lat" id="lat" value="{{address.components.location.lat}}" required hidden>
                 <input type="text" name="long" id="long" value="{{address.components.location.long}}" required hidden>
                                    </div>
                                   
                                    <div class="col-md-6">                                      
                                     <input vs-google-autocomplete                 
                                     ng-model="address2.name"                                                    
                                     vs-latitude="address2.components.location.lat"
                                     vs-longitude="address2.components.location.long"                 
                                     type="text" 
                                     name="destination"
                                     id="address2"
                                     class="form-control" 
                                     placeholder="Enter destination">
                                <input type="text" name="lat2" id="lat2" value="{{address2.components.location.lat}}" required hidden>
                                <input type="text" name="long2" id="long2" value="{{address2.components.location.long}}" required hidden>
                                <input type="text" name="distance" id="distance" value="" required hidden>
                                <input type="text" name="travel_time" id="travel_time" value="" required hidden>
                                   </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <p class="text-center mb-3">
                                          <a href type="button" style="color:#ec3323;" ng-click="later_booking_fuC()" ng-show="later_booking">Book For Later..?</a>
                                          <div ng-hide="local_datetime">
                                      <label id="date_time_box_label">Select Pickup Date & Time</label>
                                      <input  type="datetime-local" class="form-control" name="booking_date" value="<?=$current_date;?>"
                                          min="<?=$current_date;?>" max="<?=$max_date;?>"/>
                                        </div>
                                      <input type="text" name="trip_type" value="local" hidden>
                                      <label id="show_time"></label>
                                       </p>
                                    </div>
                                      <div class="col-md-3"></div>                                   
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12" style="display:none;" id="locationmsg">
                                        <button type="button" class="gauto-theme-btn" onclick="getLocation();">Make Sure !! Your Device Location Is On ?</button>
                                    </div>
                                    <div class="col-md-4">
                                       
                                    </div>
                                     <div class="col-md-4 mt-3" id="findbtn">
                                     <button type="submit" id="local_btn" class="gauto-theme-btn"> Find Car <i class="fa fa-car"></i></button>
                                     </div>
                                      
                                 </div>
                              </form>
                           </div>
      
                          
                        </div>
                        <!-- All Tab End -->
                         
                        <!-- Nissan Tab Start -->
                        <div class="tab-pane fade" id="round" role="tabpanel" aria-labelledby="nissan-tab">
                            <div class="find-form">
                              <form action="<?= base_url()?>find-car" method="post">
                                 
                                 <div class="row">
                                    <div class="col-md-6">
                                      
                                   <div class="input-group mb-3">
                                      <input vs-google-autocomplete                 
                                     ng-model="address.name"                
                                     vs-latitude="address.components.location.lat"
                                     vs-longitude="address.components.location.long"                 
                                     type="text" 
                                     name="address"
                                     id="address3"
                                     class="form-control" 
                                     placeholder="Enter address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append currentlocdiv">
                        <span class="input-group-text btn btn-sm" id="basic-addon2" ng-click="currentlocation()"><i class="fa fa-crosshairs text-danger"></i></span>
                                    </div>
                                    </div>
                                  <input type="text" name="lat" id="lat3" value="{{address.components.location.lat}}" required hidden>
                                  <input type="text" name="long" id="long3" value="{{address.components.location.long}}" required hidden>
                                    </div>
                 
                                       
                                  
                                    <div class="col-md-6">
                                      
                                      <input vs-google-autocomplete                 
                                     ng-model="address4.name"                
                                     vs-latitude="address4.components.location.lat"
                                     vs-longitude="address4.components.location.long"                 
                                     type="text" 
                                     name="destination"
                                     id="address4"
                                     class="form-control" 
                                     placeholder="Enter address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <input type="text" name="lat2" id="lat4" value="{{address4.components.location.lat}}" required hidden>
                                <input type="text" name="long2" id="long4" value="{{address4.components.location.long}}" required hidden>
                                    <input type="text" name="distance" id="Outstation" required hidden>
                                    <input type="text" name="travel_time" id="travel_time2"required hidden>
                      
                                    </div>
                                   
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                       <p>
                                          <label class="control-label"> Select Journey Date & Time</label>
                                          <input type="datetime-local" name="booking_date" value="<?=$current_date;?>"
                                          min="<?=$current_date;?>" max="<?=$max_date;?>" required="" ng-change="dateFunc(ev)" ng-model="dateVal">
                                       </p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                       <p>
                                           <label class="control-label"> Select Return Date & Time</label>
                                          <input type="datetime-local" name="return_date" value="{{ retun_dmin }}" min="{{ retun_dmin }}" max="{{ retun_d }}"  />
                                          <input type="text" name="trip_type" value="outstation" hidden>
                                       </p>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="container-fluid">
                                       <div id="googleMap">

                                       </div>
                                   </div>
                                    </div>
                                    <div class="col-md-12 mt-3" style="display:none;" id="locationmsg2">
                                        <button type="button"  class="gauto-theme-btn" onclick="getLocation();">Make Sure !! Your Device Location Is On ?></button>
                                        </div>
                                    <div class="col-md-4">

                                      </div>
                                    
                                     <div class="col-md-4 mt-3" id="findbtn2">
                                     <button type="submit" id="fcar" class="gauto-theme-btn" >Find Car</button>
                                     </div>
                                      
                                 </div>
                              </form>
                           </div>
                        </div>
                        <!-- Nissan Tab End -->
                      
                     </div>
                                       <div id="output">

                                       </div>
                  </div>
               </div>
            </div>

                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Find Area End -->   
       
      
       
       
      <!-- Service Area Start -->
      <section class="gauto-service-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="site-heading">
                     <h4>see our</h4>
                     <h2>Latest Services</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="service-slider owl-carousel">
                     <div class="single-service">
                        <span class="service-number">01 </span>
                        <div class="service-icon">
                            <i class="fa fa-car fa-3x" style="color:#ec3323"></i>
                        </div>
                        <div class="service-text">
                           <a href="#">
                              <h4>City Transfer With Car</h4>
                           </a>
                           
                        </div>
                     </div>
                     <div class="single-service">
                        <span class="service-number">02 </span>
                        <div class="service-icon">
                           <i class="fa fa-motorcycle fa-3x" style="color:#ec3323"></i>
                        </div>
                        <div class="service-text">
                           <a href="#">
                              <h4>Wander with Bike</h4>
                           </a>
                           
                        </div>
                     </div>
                     <div class="single-service">
                        <span class="service-number">03 </span>
                        <div class="service-icon">
                           <i class="fa fa-truck fa-3x" style="color:#ec3323"></i>
                        </div>
                        <div class="service-text">
                           <a href="#">
                              <h4>Book For Luggage</h4>
                           </a>
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Service Area End -->
       
       
      <!-- Promo Area Start -->
      <section class="gauto-promo-area mb-3">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="promo-box-left">
                     <img src="<?= base_url()?>app-assets/assets/img/toyota-offer-2.png" alt="promo car" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="promo-box-right">
                     <h3>Do You Want To Earn With Us?</h3>
                     <div class="row">
                     <div class="col-md-6">
                        <a href="https://play.google.com/store/apps/details?id=mini.travel.pilot" class="gauto-btn">Become a Pilot</a>
                      </div>
                      
                  </div>
                     </div>
                     
                      </div>
                    
               </div>
            </div>
      </section>
      <!-- Promo Area End -->
       
       
     
       
    <!-- About Area Start -->
      <section class="gauto-about-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="about-left">
                     <h4>about us</h4>
                     <h2>Welcome to Mini <span style="color: #ec3323;">Travel's</span></h2>
                     <p>MiniTravel's a new startup company  providing a mobility platform for travelling and transporting goods across India. The MiniTravel app offers mobility solutions by connecting customers to drivers and a wide range of vehicles across bikes, auto-rickshaws, metered taxis, and cabs, enabling convenience and transparency for thousands of customers and driver-partners.

MiniTravel's core target is to serve the customer as per their demand at affordable cost, Beginning from Jharkhand #Ek Nayi Suruwat. <a href="<?=base_url()?>About" style="color: #ec3323;">Read More</a></p>
                     <!--<div class="about-list">-->
                     <!--   <ul>-->
                     <!--      <li><i class="fa fa-check"></i>We are a trusted name</li>-->
                     <!--      <li><i class="fa fa-check"></i>we deal in have all brands</li>-->
                     <!--      <li><i class="fa fa-check"></i>have a larger stock of vehicles</li>-->
                     <!--      <li><i class="fa fa-check"></i>we are at Complete Jharkhand </li>-->
                     <!--   </ul>-->
                     <!--</div>-->
                     <div class="about-signature">
                        
                       
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="about-right">
                     <img src="<?= base_url()?>app-assets/assets/img/about.png" alt="car" />
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- About Area End -->
       
     
       
       
      <!-- Call Area Start -->
      <section class="gauto-call-area mb-3">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="call-box">
                     <div class="call-box-inner">
                        <h2>With Over <span>150+</span> Partners Locations</h2>
                        
                        <div class="call-number">
                           <div class="call-icon">
                              <i class="fa fa-phone"></i>
                           </div>
                           <div class="call-text">
                              <p>need any help?</p>
                              <h4><a href="tel:+917209352217">+917209352217</a></h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
        <!-- Frame Local Modal Top Info-->
        <div class="modal fade top modal-content-clickable" id="frameModalTopInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                        <div class="row px-4">

                            <p class="pt-1 pr-2"><strong> Cross Limit (40KM)</strong> You're Looking For Long Route Ride. Please, Switch for Outstation. <i class="fa fa-smile"></i></p>
                            <ul class="nav nav-tabs" id="" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link" id="nissan-tab" data-toggle="tab" href="#round" role="tab" aria-controls="nissan" aria-selected="false" data-dismiss="modal">Continue Booking</a>
                        </li>
                        
                     </ul>
                            <a type="button" class="btn btn-outline-secondary-modal waves-effect" id="decline2" data-dismiss="modal">No, thanks</a>
                        </div>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Frame Modal Bottom Success-->
        <!-- Frame Outstation Modal Top Info-->
        <div class="modal fade top modal-content-clickable" id="frameModalTopInfoDemo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                        <div class="row px-4">

                            <p class="pt-1 pr-2"><strong> Minimum Distance  (40KM) Required</strong> You're Looking for Vehicle in Local , Please Switch for Local Ride . <i class="fa fa-smile"></i></p>
                            
                            <ul class="nav nav-tabs" id="" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link" id="all-tab" data-toggle="tab" href="#local" role="tab" aria-controls="all" aria-selected="false" data-dismiss="modal">Continue Booking</a>
                        </li>                        
                     </ul>
                            <a type="button" id="decline" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">No, thanks</a>
                        </div>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Frame Modal Bottom Success-->
      <!-- Call Area End -->
//       <script>
//           $( document ).ready(function() {
              
//               $('#decline').click(function(){
//                   location.reload();
                  
//               });
//               $('#decline2').click(function(){
//                   location.reload();
                  
//               });
              
             
    
// });

//   </script>
