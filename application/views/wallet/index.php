

    <div class="appHeader text-light">
        <div class="left ml-2">
            <a href="<?=base_url()?>" class="headerButton text-dark">
               <i class="fa fa-arrow-left">  </i>
            </a>
        </div>
        <div class="pageTitle text-dark">
            My Wallet
        </div>
       
        <div class="right">
            <a href="" class="headerButton text-primary notification-link" ng-click="update_notification()">
                <i class="fa fa-bell"></i>
                <span class="badge badge-danger notification"></span>
            </a>
            <a href="<?= base_url()?>user-profile" class="headerButton">
                <?php
                if(!empty($this->session->userdata('customer')['image']))
                {?>
                 <img src="<?=base_url()?>app-assets/images/user/profile/<?=$this->session->userdata('customer')['image']?>" alt="image" class="imaged w32" title="<?=$this->session->userdata('customer')['name'];?>">
               <?php 
           }
               else
                {?>
            <img src="<?=base_url()?>app-assets/walletassets/img/sample/avatar/default.png" alt="image" class="imaged w32">
                <?php
            }
                ?>
        
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" >
        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Balance</span>
                        <h1 class="total"></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-toggle="modal" data-target="#depositActionSheet">
                           <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->             
            </div>
        </div>
        <!-- Wallet Card -->

        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance to Mini Wallet</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <!--  <div class="wallet-card"> -->
                <!-- Wallet Footer -->
                <!-- <div class="wallet-footer"> -->
                    <!-- <div class="item"> -->
                        <!-- <a href="#" data-toggle="modal" data-target="#withdrawActionSheet">
                            <div class="icon-wrapper bg-white">
                               <img src="https://img.icons8.com/color/48/000000/paytm.png"/>
                            </div>
                            <strong>Paytm</strong>
                        </a> -->
                    <!-- </div> -->
                   <!--  <div class="item">
                        <a href="#" data-toggle="modal" data-target="#sendActionSheet">
                            <div class="icon-wrapper bg-white">
                              <img src="assets/img/phonepay.png"/>
                            </div>
                            <strong>Phone Pay</strong>
                        </a>
                    </div> -->
                    <!-- <div class="item">
                        <a href="app-cards.html">
                            <div class="icon-wrapper bg-white">
                                 <img src="assets/img/debit.png"/>
                            </div>
                            <strong>Click Here To Add Money</strong>
                        </a>
                    </div> -->
                    <!-- <div class="item"> -->
                        <!-- <a href="#" data-toggle="modal" data-target="#exchangeActionSheet">
                            <div class="icon-wrapper bg-white">
                                 <img src="assets/img/debit.png"/>
                            </div>
                            <strong>Debit Card</strong>
                        </a> -->
                  <!--   </div> -->

               <!--  </div> -->
                <!-- * Wallet Footer -->
            <!-- </div> -->
                            <form ng-submit="FormSubmit()">
                             <div class="form-group basic">

                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input2">₹</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" value="" ng-model="amount_field" maxlength="5" onkeypress="return isNumber(event)">

                                    </div>
                                    <span id="errormsg" style="font-size:11px;font-weight:600;color:red;"></span>
                                </div>


                                <div class="form-group basic">
                                    <button data-dismiss="" type="submit" class="btn deposit btn-primary btn-block btn-lg">Deposit
                                    
                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->

        <!-- Alert Success Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetAlertSuccess" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <div class="iconbox text-success">
                                <i class="fa fa-check"> </i>
                            </div>
                            <div class="text-center p-2">
                                <h3>Successfull</h3>
                                <p id="smsg"></p>
                            </div>
                            <a href="#" class="btn btn-success btn-lg btn-block" data-dismiss="modal">Done</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Alert Success Action Sheet -->
      <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">Transactions</h2>
                <a href="<?=base_url()?>user-transaction" class="link">View All</a>
            </div>
            <div class="transactions">
               
            </div>
        </div>
         



    </div>
    <!-- * App Capsule --> 
     <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
         var app=angular.module('plunker',[]);
  app.controller('MainCtrl',function($scope,$http){
    $scope.get_wallet=function(e)
    {
        $http({
        url: '<?= base_url() ?>payment/get_amount',
      }).then(function(responce){
        $('.total').text(responce.data);       
        
})
    }
    $scope.count_notification=function(e)
    {
        $http({
        url: '<?= base_url() ?>user/count_notification',
      }).then(function(responce){
        if(responce.data=='0')
        {
            $('.notification').text('');
        }
        else{
        $('.notification').text(responce.data);  
        $('.notification-link').attr('href','<?=base_url()?>notification');
        }     
        
})

    }

    $scope.txns=function(e)
      {
        $http({
        url: '<?= base_url() ?>user/view_txns',
      }).then(function(responce){
       // alert(responce.data);
    console.log(responce);
       var res=responce.data[0];
       var i=0;
       var length=responce.data.length;
       for (i = 0; i < length; i++) 
       {
        if (responce.data[i]['amount']<0) 
        {
            $('.transactions').append('<a  class="item"> <div class="detail"><div><strong>Amazon</strong><p>Shopping</p></div></div><div class="right"><div class="price text-danger"> &#8377 '+Math.trunc(responce.data[i]['amount'])+'</div></div></a>');

        }
        else
        {

        }
            //alert( responce.data[i]['amount']);
$('.transactions').append('<a  class="item"> <div class="detail"><div><strong>'+responce.data[i]['msg']+'</strong><p>'+responce.data[i]['description']+'</p></div></div><div class="right"><div class="price text-success">+ &#8377 '+Math.trunc(responce.data[i]['amount'])+'</div></div></a>');
//console.log(btoa(responce.data[i]['amount']));
        }
       // alert(responce.data.length);
        // if(responce.data=='0')
        // {
        //     $('.notification').text('');
        // }
        // else{
        // $('.notification').text(responce.data);  
        // $('.notification-link').attr('href','<?=base_url()?>notification');
        // }     
        
})
        
      }
      $scope.txns();
       $scope.get_wallet();
       $scope.count_notification();
         
       


  $scope.update_notification=function()
  {
   $http({
        url: '<?= base_url() ?>user/read_notification',
      }).then(function(responce){     
       
  })
}
   $scope.FormSubmit=function(e)
   {
   
     if($scope.amount_field==null)
     {
       $('#errormsg').html('Enter Amount To Add');
     }
     else if($scope.amount_field<10)
     {
       $('#errormsg').html('Amount Must Be Greater Than Rs 10');
     }
     else
     {
        $('#errormsg').hide();
        // alert($scope.tamount);
        $('.deposit').html("Please Wait... <span class='spinner-grow spinner-grow-sm '></span> ");

      $http({
        method: 'POST',
        url: '<?= base_url() ?>payment/add_money_to_wallet',
        data: {'amount' : $scope.amount_field},
      }).then(function(responce){
        //alert(responce.data);
        //var razorpayOrderId = responce.data;
        //console.log(responce.data);
        var options = responce.data;
        options.handler = function (response){
    $http({
            method: 'POST',
            url: '<?= base_url() ?>payment/wallet_money_verify',
            data: {'razorpay_payment_id': response.razorpay_payment_id ,'razorpay_signature': response.razorpay_signature, 'totalAmount' : $scope.amount_field }
                }).then(function(responce){
                  //alert(responce.data['status']);
                  //console.log(responce.data['message']);
                  if(responce.data['status']=true)
                  {
                    $scope.amount_field=null;
                    $('.deposit').html("Deposit");
                    $('#smsg').text('Money Added To Your Wallet');
                    $('#depositActionSheet').modal('toggle');
                    $('#actionSheetAlertSuccess').modal('toggle');
                    $scope.get_wallet();
                    $scope.count_notification();

                  }
             
        })

        
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
})
     }
    }
 
});

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


        
     
      </script>
   