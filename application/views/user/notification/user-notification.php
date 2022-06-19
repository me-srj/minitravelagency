 <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= base_url()?>Wallet" class="headerButton goBack">
               <i class="fa fa-arrow-left"></i>
            </a>
        </div>
        <div class="pageTitle">
            Notifications
        </div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section full">

            <ul class="listview image-listview flush">
               
               <?php               
               foreach ($notifications as $value) {  
                             
                ?>             
               
                <li class="<?php if($value->readstatus!='seen'){ echo 'active';}?>">
                    <a href="<?php if(empty($value->url)){ echo '#';} else{ echo base_url().$value->url.'?id='.base64_encode($value->id); };?>" class="item" ng-click=seen_function(<?=$value->id;?>)>
                        <?php
                        if($value->msg=='Password Changed')
                        {
                        ?>
                           <div class="icon-box bg-danger">
                             <i class="fa fa-key"></i>
                        </div>
                       <?php
                        }
                        else if($value->msg=='Money Added To wallet')
                        {
                        ?>
                           <div class="icon-box bg-primary">
                             <i class="fa fa-arrow-down"></i>
                        </div>
                       <?php }
                        else{
                            ?>
                            <div class="icon-box bg-success">
                             <i class="fa fa-check"></i>
                        </div>
                       
                       <?php
                        }
                        ?>
                        
                        
                          <div class="in">
                            <div>
                                <div class="mb-05"><strong><?= $value->msg; ?></strong></div>
                                <div class="text-small mb-05"><?=$value->description;?></div>
                                <div class="text-xsmall"><?php $dt=new DateTime($value->con);
                                echo $dt->format('d-m-Y   ');?> &nbsp;&nbsp; <?php echo $dt->format('h:i:A');?></div>
                            </div>
                            <?php if($value->readstatus!='seen')
                            {
                            ?>
                               <span class="badge badge-danger badge-empty"></span> 
                            <?php
                            }
                            ?>
                           
                        </div>
                       
                    </a>
                </li>
                <?php
                }
               ?>
                
            </ul>

        </div>

    </div>
    <!-- * App Capsule -->
    <script type="text/javascript">
        
         var app=angular.module('plunker',[]);
  app.controller('MainCtrl',function($scope,$http){
    
    
$scope.seen_function=function(id)
{
  
   $http({
        method: 'POST',
        url: '<?= base_url() ?>user/seen_notification',
        data: {'id' :id},
      }).then(function(responce){  
        // alert(responce.data);
      console.log(responce.data.message); 
      

       
  })

}
  });
    </script>