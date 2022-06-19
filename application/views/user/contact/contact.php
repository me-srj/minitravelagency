     <!-- Breadcromb Area Start -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      <section class="gauto-breadcromb-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcromb-box">
                     <h3>Contact Us</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="<?= base_url()?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Contact Us</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcromb Area End -->

<section class="gauto-contact-area section_70">
         <div class="container">
            <div class="row">
<?php
if (!empty($this->session->flashdata("mailtoadmin"))) {
 ?>
 <div class="alert alert-info"><?= $this->session->flashdata("mailtoadmin") ?></div>
 <?php
}

?>
               <div class="col-lg-7">
                  <div class="contact-left">
                     <h3>Get in touch</h3>
                     <form method="POST" action="<?= base_url() ?>Contact-US">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="single-contact-field">
                                 <input type="text" placeholder="Your Name" required="" name="name">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="single-contact-field">
                                 <input type="email" placeholder="Email Address" name="email" required="">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="single-contact-field">
                                 <input type="text" placeholder="Subject" name="subject" required="">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="single-contact-field">
                                 <input type="tel" placeholder="Phone Number" name="mobile" required="">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="single-contact-field">
                                 <textarea placeholder="Write here your message" name="msg" required=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="single-contact-field">
                                 <button name="submit" type="submit" class="gauto-theme-btn"><i class="fa fa-paper-plane"></i> Send Message</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-5">
                  <div class="contact-right">
                     <h3>Contact information</h3>
                     <div class="contact-details">
                        <p><i class="fa fa-map-marker"></i>Ashok Nagar, Ranchi Jharkhand, 834002 </p>
                        <div class="single-contact-btn">
                           <h4>Email Us</h4>
                           <a href="#">care@minitravelagency.com</a>
                        </div>
                        <div class="single-contact-btn">
                           <h4>Call Us</h4>
                           <a href="tel:+919798796646">+91-9798796646</a>
                        </div>
                        <div class="single-contact-btn">
                           <h4>Call Us</h4>
                           <a href="tel:+917209352217">+91-7209352217</a>
                        </div>

                        <div class="social-links-contact">
                           <h4>Follow Us:</h4>
                 
                           <ul>
                              <li><a href="https://www.facebook.com/Minitravelagency/"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="https://instagram.com/_mini_travels?igshid=23fjen5xrh1"><i class="fa fa-instagram"></i></a></li>
                             <!--  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                              <li><a href="#"><i class="fa fa-skype"></i></a></li>
                              <li><a href="#"><i class="fa fa-vimeo"></i></a></li> -->
                           </ul>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>