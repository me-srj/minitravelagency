 <!-- Breadcromb Area Start -->
      <section class="gauto-breadcromb-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcromb-box">
                     <h3>Gallery</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="<?= base_url();?>welcome/">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Gallery</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcromb Area End -->
       
       
      <!-- Gallery Area Start -->
      <section class="gauto-gallery-area section_70">
         <div class="container">
           
             

            <div class="row" id="lightgallery">

               <?php
               foreach ($gallery as $key => $value)
                {
              ?>


                  <div class="col-lg-4" data-src="<?=base_url()?>app-assets/images/gallery/<?= $value->file_name?>">
                  <div class="single-gallery">
                     <div class="img-holder">
                        <img src="<?=base_url()?>app-assets/images/gallery/<?= $value->file_name?>" alt="gallery 1" />
                        <div class="overlay-content">
                          
                        </div>
                        <div class="link-zoom-button">
                          
                           <div class="single-button col-md-12">
                              <a class="zoom lightbox-image" href="<?=base_url()?>app-assets/images/gallery/<?= $value->file_name?>">
                              <span class="fa fa-search"></span>Zoom
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php
            }
               ?>
                             
                         
            </div>
           
           
         </div>
      </section>
      <!-- Gallery Area End --> <!-- Footer Area Start -->