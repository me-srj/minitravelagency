<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Payment extends CI_Controller {
	
	 public function __construct()
	{
		parent::__construct();
		 // load form and url helpers
        $this->load->helper(array('form', 'url'));
        date_default_timezone_set('Asia/Kolkata');
         
        // load form_validation library
        $this->load->library('form_validation');
        $this->load->model('user/usermodel');
        $this->load->library("Sms_class");
        $this->load->library("FMC");
        if(isset($_GET['id']))
        	{
				$a=$_GET['id'];
if($this->session->userdata("booking_deatils")['booking_date']==null)
{
$booking_date=date('Y-m-d H:i:s');
}
else
{
	$booking_date=date('Y-m-d H:i:s',strtotime($this->session->userdata("booking_deatils")['booking_date']));
}
$carc_id=base64_decode($a);
if($bookings=$this->usermodel->check_book_server_side($carc_id,$booking_date))
{
	echo "<h1>OOps.Problem in booking this car....please try again later!! <a href='<?=base_url()?>'>Here</a></h1>";
}
$this->session->set_userdata('car_id',$a);
        	}
		
		$ses=$this->session->userdata("customer");
        	if(empty($ses))
		{
			redirect('customer-Login');
		}

	}

	public function index()
	{		
	    if(empty($this->session->userdata("booking_deatils"))){
	        redirect('customer-Login');
	    }else{
	        $script='';
	  $a=$this->session->userdata('car_id');
	  
		  $car_id=base64_decode($a);
		  $data['title']              = 'Checkout payment | Infovistar';  
        $data['callback_url']       = base_url().'user/callback';
        $data['surl']               = base_url().'user/success';;
        $data['furl']               = base_url().'user/failed';;
        $data['currency_code']      = 'INR';
		 $data['single_car']=$this->usermodel->get_single_car($car_id);
 $trip_type=$this->session->userdata('booking_deatils')['trip_type'];
$dis=$this->session->userdata('booking_deatils')['distance'];
		 if($trip_type=='outstation'){

	        if($this->session->userdata('booking_deatils')[0]=='')
                     {
                      $data['base_fair']=2*($dis*($data['single_car'][0]->rpkm/100*40));
                      $data['dallowence']=$data['single_car'][0]->dallowence;
            	   $data['brockarage']=$data['single_car'][0]->brockarage;
            	 $data['dis_price']=2*($dis*($data['single_car'][0]->rpkm/100*60));
            	 $data['fair']=$data['base_fair']+$data['dis_price'] + $data['brockarage'] + $data['dallowence'];
            	 $data['tax']=($data['fair'])/100*6;
            	 $data['payamt']=ceil($data['fair']+$data['tax']);
            	 $this->session->set_userdata('pcal',$data);
                     }
                     else 
                     {
                    $data['base_fair']=2*$dis*($data['single_car'][0]->rpkm/100*40);
                    $data['dallowence']=$data['single_car'][0]->dallowence;
            	   $data['brockarage']=$data['single_car'][0]->brockarage;
            	 $data['dis_price']=$dis*($data['single_car'][0]->rpkm/100*60);
            	 $data['fair']=$data['base_fair']+$data['dis_price'] + $data['brockarage'] + $data['dallowence'];
            	 $data['tax']=($data['fair'])/100*6;
            	 $data['payamt']=ceil($data['fair']+$data['tax']);
            	 $this->session->set_userdata('pcal',$data);
                    }
            	 }
            	 else
            	 {
            	   $data['base_fair']=$data['single_car'][0]->baseprice;
            	   $data['dallowence']=$data['single_car'][0]->dallowence;
            	   $data['brockarage']=$data['single_car'][0]->brockarage;
            	 $data['dis_price']=$dis*$data['single_car'][0]->rpkm;
            	 $data['fair']=$data['base_fair']+$data['dis_price'] + $data['brockarage'] + $data['dallowence'];
            	 $data['tax']=($data['fair'])/100*6;
            	  $data['payamt']=ceil($data['fair']+$data['tax']);
            	  $this->session->set_userdata('pcal',$data);
            	 }
            	 $data['script']='';
		$this->load->view('Home/h1_header.php',$data);
		$this->load->view('Home/h1_navbar.php');
	    $this->load->view('user/Book_car.php',$data);
		$this->load->view('Home/h1_footer.php');
	    }
	}
	public function caldays()
	{
		// day func
 $date = str_replace('/', '-', $this->session->userdata('booking_deatils')['booking_date'] );
   $newreservationDate = date("Y-m-d", strtotime($date));

    $date = str_replace('/', '-', $this->session->userdata('booking_deatils')[0] );
   $newreturnDate = date("Y-m-d", strtotime($date)); 

$date1=date_create($newreservationDate);
$date2=date_create($newreturnDate);
$diff=date_diff($date1,$date2);
return $days= $diff->format("%a");
	}
	/**
	 * This function creates order and loads the payment methods
	 */
	public function pay()
	{
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
		$form_data = json_decode(file_get_contents("php://input"));
		$name = $form_data->name;
		

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $form_data->amount * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$this->session->set_userdata('razorpay_order_id',$razorpayOrderId);
		 $data = $this->prepareData($amount,$razorpayOrderId,$name);
	print_r(json_encode($data));
		// $this->load->view('rezorpay',array('data' => $data));
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verifypay()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		try {
				$attributes = array(
					'razorpay_order_id' => $this->session->userdata('razorpay_order_id'),
					'razorpay_payment_id' => $form_data->razorpay_payment_id,
					'razorpay_signature' => $form_data->razorpay_signature
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
	$fair=$form_data->totalAmount;
	$type=$form_data->type;
	$pid=$form_data->razorpay_payment_id;
	$trip_type=$form_data->type;
	$payment=$form_data->payment;
	$ptype=$form_data->ptype;
	$merchant_order_id= 'BK-'.date('ymdhis');
	$cid = $this->session->userdata('customer')['id'];
	$vid = $form_data->vid;
	$coupanid=$form_data->coupanid;
	if ($form_data->usingwallet) {
	$user=$this->db->get_where("tbl_customer_master",array('id'=>$this->session->userdata("customer")['id']))->row_array();
	$data = array(
			'coupanid'=>$coupanid,
			'cid' => $cid,
			'vid' => $vid,
			'type'=>$trip_type,
			'payment' => $payment,
			'pid' => $pid,
			'ptype' => $ptype,
			'wallet_pay'=>$user['wallet']
		);
	$this->db->query("UPDATE `tbl_customer_master` SET `wallet`='".$form_data->newwalletamt."' WHERE `id`='".$this->session->userdata("customer")['id']."'");
$this->db->query("INSERT INTO `tbl_wallet_txn_master_customer`(`cid`, `amount`, `msg`, `description`,`txn_id`,`rid`,cby) VALUES ('".$this->session->userdata("customer")['id']."','-".$form_data->debitamt."','Paid For Trip!','Your account have been debited of &#8377 ".$form_data->debitamt." trip ID:".$form_data->id."','".$pid."','".$form_data->id."','".$form_data->trnsby."')");
	}
	else
	{
$data = array(
			'coupanid'=>$coupanid,
			'cid' => $cid,
			'vid' => $vid,
			'type'=>$trip_type,
			'payment' => $payment,
			'pid' => $pid,
			'ptype' => $ptype,
			'wallet_pay'=>0
		);
	}
		
		$result=$this->usermodel->save_booking_later($data,$form_data->id);
		// redirect(base_url().'register/success');
		if($result)
		{
		$this->session->unset_userdata('booking_deatils');
		$this->session->unset_userdata('booking_deatils');
		$this->session->unset_userdata('car_id');
		$this->session->unset_userdata('razorpay_order_id');
	   }
		
		echo "payment/success";
		 // redirect(base_url().'register/paymentFailed');
		}
		else 
		{
			echo "payment/paymentFailed";
		  // redirect(base_url().'register/paymentFailed');
		}
	}
	public function verify()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		


		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		try {
				$attributes = array(
					'razorpay_order_id' => $this->session->userdata('razorpay_order_id'),
					'razorpay_payment_id' => $form_data->razorpay_payment_id,
					'razorpay_signature' => $form_data->razorpay_signature
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
	$cid = $this->session->userdata('customer')['id'];
	$coupanid=$form_data->coupanid;
	$sorcelatitude= $this->session->userdata('booking_deatils')['origin_latitude'];
	$sorcelongitude= $this->session->userdata('booking_deatils')['origin_logitude'];
	$destinationlatitude= $this->session->userdata('booking_deatils')['destination_latitude'];
	$destinationlongitude= $this->session->userdata('booking_deatils')['destination_longitude'];
	 $fromaddress=$this->session->userdata('booking_deatils')['origin'];
	 $toaddress =$this->session->userdata('booking_deatils')['destination'];
	 $kms= $this->session->userdata('booking_deatils')['distance'];
	 $booking_date=$this->session->userdata('booking_deatils')['booking_date'];
	 $returndate=$this->session->userdata('booking_deatils')[0];
	 $trip_type=$form_data->type;
	 $fair=$this->session->userdata('pcal')['fair'];
	 $tax=$this->session->userdata('pcal')['tax'];
	 $payment=$form_data->payment;
	 $ptype=$form_data->ptype;
	 $pid=$form_data->razorpay_payment_id;
	 $rpkm=$this->session->userdata('pcal')['single_car'][0]->rpkm;
	 $brockarage=$this->session->userdata('pcal')['brockarage'];
	 $dallowence=$this->session->userdata('pcal')['dallowence'];
	 $base_fair=$this->session->userdata('pcal')['base_fair'];
	$subcat=$this->session->userdata('pcal')['single_car'][0]->subcategory;

	// $generator = "A1B2C3D4E5F6G7H8I9JKLMNPQRSTUVWXYZ"; 
 //    $otp ="";
  
    //  for ($i = 1; $i <= 4; $i++) { 
    //     $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    // }
		$data = array(
			'cid' => $cid,
			'coupanid' => $coupanid,
			'sorcelatitude' => $sorcelatitude,
			'sorcelongitude' => $sorcelongitude,
			'destinationlatitude' => $destinationlatitude,
			'destinationlongitude' => $destinationlongitude,
			'fromaddress' => $fromaddress,
			'toaddress'=>$toaddress,
			'kms' => $kms,
			'bookdate'=>$booking_date,
			'ridingon'=>$booking_date,
			'returndate' => $returndate,
			'type' => $trip_type,
			'fair' => $fair,
			'tax' => $tax,
			'payment' => $payment,
			'ptype' => $ptype,
			'pid' => $pid,
			'rpkm' => $rpkm,
			'brockarage' => $brockarage,
			'dallowence' => $dallowence,
			'baseprice' => $base_fair,
			'subcat' => $subcat
		);
		
		$result=$this->usermodel->save_booking($data);
		// redirect(base_url().'register/success');
		if($result)
		{
		$this->session->unset_userdata('booking_deatils');
		$this->session->unset_userdata('booking_deatils');
		$this->session->unset_userdata('car_id');
		$this->session->unset_userdata('razorpay_order_id');
	   }
		
		echo "payment/success";
		 // redirect(base_url().'register/paymentFailed');
		}
		else {
			echo "payment/paymentFailed";
		  // redirect(base_url().'register/paymentFailed');
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId,$name)
	{
		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => $name,
			"description" => "Learn To Code",
			"image" => "https://img.icons8.com/color/48/000000/car-sale.png",
			"notes"  => array(
				"address"  => "Hello World",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success()
	{
		$this->load->view('paymentsuccess');
	}
	/**
	 * This is a function called when payment failed,
	 * and shows the error message
	 */
	public function paymentFailed()
	{
		$this->load->view('error');
	}


	public function paylater()
	{
      
	$form_data = json_decode(file_get_contents("php://input"));
	$cid = $this->session->userdata('customer')['id'];
	$coupanid=$form_data->coupanid;
	$sorcelatitude= $this->session->userdata('booking_deatils')['origin_latitude'];
	$sorcelongitude= $this->session->userdata('booking_deatils')['origin_logitude'];
	$destinationlatitude= $this->session->userdata('booking_deatils')['destination_latitude'];
	$destinationlongitude= $this->session->userdata('booking_deatils')['destination_longitude'];
	 $fromaddress=$this->session->userdata('booking_deatils')['origin'];
	 $toaddress =$this->session->userdata('booking_deatils')['destination'];
	 $kms= $this->session->userdata('booking_deatils')['distance'];
	 $booking_date=$this->session->userdata('booking_deatils')['booking_date'];
	 $returndate=$this->session->userdata('booking_deatils')[0];
	 $trip_type=$form_data->type;
	 $fair=$this->session->userdata('pcal')['fair'];
	 $tax=$this->session->userdata('pcal')['tax'];
	 $payment=$form_data->payment;
	 $ptype=$form_data->ptype;
	 // $pid=$form_data->razorpay_payment_id;
	 $rpkm=$this->session->userdata('pcal')['single_car'][0]->rpkm;
	 $brockarage=$this->session->userdata('pcal')['brockarage'];
	 $dallowence=$this->session->userdata('pcal')['dallowence'];
	 $base_fair=$this->session->userdata('pcal')['base_fair'];
	$subcat=$this->session->userdata('pcal')['single_car'][0]->subcategory;

	// $generator = "A1B2C3D4E5F6G7H8I9JKLMNPQRSTUVWXYZ"; 
 //    $otp ="";
  
    //  for ($i = 1; $i <= 4; $i++) { 
    //     $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    // }
		$data = array(
			'cid' => $cid,
			'coupanid' => $coupanid,
			'sorcelatitude' => $sorcelatitude,
			'sorcelongitude' => $sorcelongitude,
			'destinationlatitude' => $destinationlatitude,
			'destinationlongitude' => $destinationlongitude,
			'fromaddress' => $fromaddress,
			'toaddress'=>$toaddress,
			'kms' => $kms,
			'bookdate'=>date('Y-m-d H:i:s'),
			'ridingon'=>$booking_date,
			'returndate' => $returndate,
			'type' => $trip_type,
			'fair' => $fair,
			'tax' => $tax,
			'payment' => $payment,
			'ptype' => $ptype,
			'rpkm' => $rpkm,
			'brockarage' => $brockarage,
			'dallowence' => $dallowence,
			'baseprice' => $base_fair,
			'subcat' => $subcat
		);
		
		$result=$this->usermodel->save_booking($data);
		// redirect(base_url().'register/success');
		if($result)
		{
		    $this->request_ride_notify($subcat,$sorcelatitude,$sorcelongitude);
		$this->session->unset_userdata('booking_deatils');
		$this->session->unset_userdata('pcal');
		$this->session->unset_userdata('car_id');
		$this->session->unset_userdata('car_id');
		$this->session->unset_userdata('razorpay_order_id');
		echo "payment/success";
	   }	
		else {
				echo "payment/paymentFailed";
			// redirect(base_url().'register/paymentFailed');
		}

	}

	public function add_money_to_wallet()
	{
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		$form_data = json_decode(file_get_contents("php://input"));
		$name = 'Mini Wallet';
		

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $form_data->amount * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$this->session->set_userdata('razorpay_order_id',$razorpayOrderId);
		 $data = $this->preparewalletData($amount,$razorpayOrderId,$name);
	print_r(json_encode($data));
		// $this->load->view('rezorpay',array('data' => $data));
	}

	public function wallet_money_verify()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		try {
				$attributes = array(
					'razorpay_order_id' => $this->session->userdata('razorpay_order_id'),
					'razorpay_payment_id' => $form_data->razorpay_payment_id,
					'razorpay_signature' => $form_data->razorpay_signature
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
		$get_balance=$this->usermodel->get_wallet_balance();
		 $add=$form_data->totalAmount;
		 $old=$get_balance[0]->wallet;
		 $msg='Money Added To wallet';
		 $msg2='Mini Wallet';
		 $desc='Rs '. $form_data->totalAmount. ' Successfully added To Your Wallet';
		  $new_wallet_balance= $old + $add;		
		$data=$this->usermodel->update_wallet_money($new_wallet_balance);
		$txn=array(
			'cid' => $this->session->userdata('customer')['id'],
			'amount'=> $form_data->totalAmount,
			'msg'=> $msg2,
			'description'=>$desc,
			'txn_id'=>$form_data->razorpay_payment_id
		);
		$data=$this->usermodel->save_txn($txn);
		$data= array(
			'userid' =>$this->session->userdata("customer")['id'] ,
			'pilotid'=>'',
			'amount'=> $form_data->totalAmount,
			'msg'=>$msg,
			'description'=>$desc,
			'url'=>'notification-details'

		 );
		$this->usermodel->save_notification($data);
		
	}
	else{

		echo "Failed To Add Money";

     }
     print_r(json_encode($data));
	}
	
	public function preparewalletData($amount,$razorpayOrderId,$name)
	{
		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => $name,
			"image" => "https://img.icons8.com/color/48/000000/car-sale.png",
			"notes"  => array(
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}
	public function get_amount()
	{
		
		$get_balance=$this->usermodel->get_wallet_balance();
		echo $get_balance[0]->wallet;

	}
	public function request_ride_notify($subcat,$rcvlat,$rcvlong){
     $data=$this->usermodel->request_ride_notifydata($subcat,$rcvlat,$rcvlong);
    $androidtoken=array();
    $webtoken=array();
    foreach($data as $ndata){
        if($ndata->dtype==='web'){
            array_push($webtoken,$ndata->fmctoken);
            
        }else{
             array_push($androidtoken,$ndata->fmctoken);
        }
    }
    $msg=[
    'title' => 'New Ride Near By You 🚗',
    'body' => 'Please accept your ride.',
    'icon' => 'https://minitravelagency.com/app-assets/assets/img/favicon/logo.jpg',
    'url' => 'pilot/ridefeed',
        ];
     $webkey=WEB_SERVER_KEY;
      $androidkey=ANDROID_PILOT_SERVER_KEY;
              //web
        $data1='data';
        $this->fmc->notify($webkey,$webtoken,$msg,$data1);
        // android
        $data2='notification';
        $this->fmc->notify($androidkey,$androidtoken,$msg,$data2);
}
}
