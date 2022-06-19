<style type="text/css">
    body{
        background-color:#fff;
    }
</style>
<!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="<?= base_url()?>notification" class="headerButton goBack">
               <i class=" fa fa-arrow-left"></i>
            </a>
        </div>
        <div class="pageTitle">
            Notification Detail
        </div>
        <div class="right">
            <a href="javascript:;" class="headerButton text-danger" ng-click="delete_notification()">
              <i class='fa fa-trash-o'></i>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section">

            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                       <i class="fa fa-arrow-down"></i>
                    </div>
                </div>
                <h3 class="text-center mt-2">Payment Received</h3>
            </div>
           
                 <ul class="listview simple-listview no-space mt-3">
                <li>
                    <span>Transaction id </span>
                    <strong><?= $details[0]->txn_id?></strong>
                </li>
                <li>
                    <span>Bank Name</span>
                    <strong>Mini Wallet</strong>
                </li>
                <li>
                    <span>Date</span>
                    <strong><?php $dt=new DateTime($details[0]->con);
                                echo $dt->format('M  d,  Y');?> <?php echo $dt->format('h:i:A');?></strong>
                </li>
                <li>
                    <span>Amount</span>
                    <strong>₹ <?= $details[0]->amount;?></strong>
                </li>
            </ul>


        </div>

    </div>
    <!-- * App Capsule -->

     <script type="text/javascript">
        
         var app=angular.module('plunker',[]);
  app.controller('MainCtrl',function($scope,$http){

  $scope.delete_notification=function()
  {
    id=<?= $details[0]->id?>
    
    $http({
        method: 'POST',
        url: '<?= base_url() ?>user/delete_notification',
        data: {'id' :id},
      }).then(function(responce){
        //console.log(responce.data.message);
       // window.location="<?=base_url()?>notification";
        

})

  }   
    
  });
    </script>
