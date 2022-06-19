<!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?=base_url()?>Wallet" class="headerButton text-dark goBack">
                <i class="fa fa-arrow-left"> </i>
            </a>
        </div>
        <div class="pageTitle">
            Transactions
        </div>
        
    </div>
    <!-- * App Header -->



    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">Today</div>
            <div class="transactions">
                
                <?php
                if($today===null)
                {?>
                    <!-- item -->
                <a href="app-transaction-detail.html" class="item">
                    <div class="detail">
                        
                        <div>
                            <strong>No Transactions For Today</strong>
                            
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"></div>
                    </div>
                </a>
                <!-- * item --> 
               <?php }
                else
                {
                foreach($today as $d)
                {
                    
                ?>
                     
                <a href="#" class="item">
                    <div class="detail">
                      
                        <div>
                            <strong><?= $d->msg;?></strong>
                            <p><?= $d->description;?></p>
                        </div>
                    </div>
                    <div class="right">
                        <?php
                        if($d->amount<0)
                        {?>
                          <div class="price text-danger"> <?= $d->amount;?></div>  
                        <?php
                        }
                        else
                        {?>
                           <div class="price text-success">+<?= $d->amount;?></div> 
                       <?php }
                        ?>
                        
                    </div>
                </a>
               
               <?php 
                }
                }
                ?>
                <!-- item -->
               
               
            </div>
        </div>
        <!-- * Transactions -->

        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">Yesterday</div>
            <div class="transactions">
              <?php
                if($yesterday_txn===null)
                {?>
                    <!-- item -->
                <a href="#" class="item">
                    <div class="detail">
                        
                        <div>
                            <strong>No Transactions For yesterday</strong>
                            
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"></div>
                    </div>
                </a>
                <!-- * item --> 
               <?php }
                else
                {
                foreach($yesterday_txn as $dd)
                {
                    
                ?>
                     
                <a href="#" class="item">
                    <div class="detail">
                      
                        <div>
                            <strong><?= $dd->msg;?></strong>
                            <p><?= $dd->description;?></p>
                        </div>
                    </div>
                    <div class="right">
                        <?php
                        if($dd->amount<0)
                        {?>
                          <div class="price text-danger"> <?= $dd->amount;?></div>  
                        <?php
                        }
                        else
                        {?>
                           <div class="price text-success">+<?= $dd->amount;?></div> 
                       <?php }
                        ?>
                        
                    </div>
                </a>
               
               <?php 
                }
                }
                ?>
            </div>
        </div>
        <!-- * Transactions -->

        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">All Transacations</div>
            <div class="transactions">
                
               <?php 
                
                foreach($all_txn as $ddd)
                {
                    
                ?>
                     
                <a href="#" class="item">
                    <div class="detail">
                      
                        <div>
                            <strong><?= $ddd->msg;?></strong>
                            <p><?= $ddd->description;?></p>
                        </div>
                    </div>
                    <div class="right">
                        <?php
                        if($ddd->amount<0)
                        {?>
                          <div class="price text-danger"> <?= $ddd->amount;?></div>  
                        <?php
                        }
                        else
                        {?>
                           <div class="price text-success">+<?= $ddd->amount;?></div> 
                       <?php }
                        ?>
                        
                    </div>
                </a>
               
               <?php 
                }
                
                ?>
                <!-- * item -->
            </div>
        </div>
        <!-- * Transactions -->

     
       


    </div>
    <!-- * App Capsule -->