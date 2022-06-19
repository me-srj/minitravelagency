<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
public function __construct()
	{
		parent::__construct();
		 // load form and url helpers
        $this->load->helper(array('form', 'url'));
        date_default_timezone_set('Asia/Kolkata');
         
        // load form_validation library
        $this->load->library('form_validation');
        $this->load->model('user/usermodel');
//        $this->load->library("Sms_class");	
	}
	public function walletcashpaydel()
	{
	$form_data=json_decode(file_get_contents("php://input"));
		$this->usermodel->cashwalletpaydel($form_data);
	}
	public function walletcashpay()
	{
	$form_data=json_decode(file_get_contents("php://input"));
	$generator = "0123456789"; 
    $otp =""; 
    for ($i = 1; $i <= 4; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
	$this->usermodel->cashwalletpay($form_data,$otp);
	}
	public function allpaywallet()
	{
	$return = array('status' => false,'message'=>"initial");
	$form_data = json_decode(file_get_contents("php://input"));
if ($this->usermodel->allpayw($form_data)) {
	$return['status']=true;
	$return['message']="Payment Recieved";
}
else
{
	$return['message']="Failed To Pay with Wallet!!";
}
json_encode(print_r($return));
	}
	public function myride()
	{
		if (!empty($_GET['id'])) {
	$id=base64_decode($_GET['id']);
$data['ride']=$this->usermodel->getride($id);
$data['useramount']=$this->usermodel->useramount();
$data['adminamount']=$this->usermodel->adminamount();
$data['walletaccess']=$this->usermodel->walletaccess();
$this->load->view('user/myride/index.php',$data);
		}
		else
		{
			redirect(base_url());
		}
	}
	public function myrides()
	{
	if (empty($this->session->userdata("customer"))) {
		redirect(base_url()."customer-Login");
		}
	 $data['rides']=$this->usermodel->getrides();
	    $this->load->view('user/myrides/index.php',$data);
	}
public function profile()
{
	$id = $this->session->userdata("customer")['id'];
	    $data['customer']=$this->usermodel->getdetails($id);
	    $this->load->view('user/user_profile/profile.php',$data);
}

	public function find_car()
	{
		$origin_latitude=$this->input->post('lat');
	   $origin_logitude=$this->input->post('long');
		 $destination_latitude=$this->input->post('lat2');
		 $destination_longitude=$this->input->post('long2');
		 $booking_date=$this->input->post('booking_date');
		 $address=$this->input->post('address');
	     $destination=$this->input->post('destination');
		 $distance=$this->input->post('distance');
		 $travel_time=$this->input->post('travel_time');
		 $trip_type=$this->input->post('trip_type');
		  $data['booking_details']=array(
             'origin'=>$address,
             'destination'=>$destination,
             'origin_latitude'=>$origin_latitude,
             'origin_logitude'=>$origin_logitude,
             'destination_latitude'=>$destination_latitude,
             'destination_longitude'=>$destination_longitude,

             // 'booking_date'=>$booking_date,
             'distance'=>$distance,
             'travel_time'=>$travel_time,
             'trip_type'=>$trip_type
              );
		if($trip_type=='outstation')
		{
			//booting date
			$booking_date1=date('Y-m-d H:i:s',strtotime($booking_date));
			$data['booking_details']['booking_date']=$this->input->post('booking_date1');
			//return date
			if(!empty($this->input->post('return_date'))){
		 $data['booking_details'][0]=date('Y-m-d H:i:s',strtotime($this->input->post('return_date')));
			}
			else{
				$data['booking_details'][0]='';
			}
		//  echo $data['booking_details'][0];
		//  die;
		 $this->session->set_userdata('booking_deatils',$data['booking_details']);	 
		  $return_date=$data['booking_details'][0];
		 $data['car_list']=$this->usermodel->find_car($origin_latitude,$origin_logitude,$booking_date,$return_date,$trip_type);
		}
		else
		{
			if($booking_date==null)
		 {
		 	$booking_date=date('Y-m-d H:i:s', time());
		 }
		 else
		 {
		 	$booking_date=date('Y-m-d H:i:s',strtotime($booking_date));
		 	
		 } 
		$data['booking_details']['booking_date']=$booking_date;
        $return_date=''; 
         array_push($data['booking_details'],$return_date);
         $this->session->set_userdata('booking_deatils',$data['booking_details']);
         $ddd=$this->session->userdata('booking_deatils');
         
		$data['car_list']=$this->usermodel->find_car($origin_latitude,$origin_logitude,$booking_date,$return_date,$trip_type);
		//category pricing
}
    $data['pricing']=$this->usermodel->cate_pricing($trip_type,$distance);
	//$this->load->view('Home/h1_header.php');
	    // $this->load->view('Home/h1_navbar.php');
	    $this->load->view('user/car_list.php',$data);
	    // $this->load->view('Home/h1_footer.php');
	}
	
	public function send_otp()
	{
	$result=array('status'=>false,'message'=>"");
	$form_data = json_decode(file_get_contents("php://input"));
	if (!empty($form_data->username)) {
		$type="none";
	if (preg_match("/^[6-9][0-9]{9}$/", $form_data->username)) {
		$type="mobile";
	}
	else
	{   
		$result['message']="Invalid Username!!";
		print_r(json_encode($result));
		die;
	}
	$generator = "0123456789"; 
    $otp =""; 
    for ($i = 1; $i <= 4; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
   
     $res=$this->usermodel->checkuserlogin($form_data->username,$otp);
    if($res)
    {
     $this->session->set_userdata('user_otp',$otp);
    $this->session->set_userdata('username',$form_data->username);
    $result['status']=true;
    // $result['message']=$otp;	
	$result['message']="OTP sended successfully!!";
	}
	}
	else
	{
		$result['message']="Failed to get mobile number!!";
	}
print_r(json_encode($result));
	}

	public function check_otp()
	{
	$result=array('status'=>false,"message"=>"");
	$form_data = json_decode(file_get_contents("php://input"));
	if (!empty($form_data->otp)) {
		if ($this->session->userdata("user_otp")==$form_data->otp) {
	if ($this->usermodel->setusercookie($this->session->userdata("username"))) 
	{
	$result['status']=true;
    $result['message']="Login Successfull!!";
	}
	else
	{
		$result['message']="Failed to start session.";
	}
	}
	else
	{
	$result['message']="OTP Mis-match!!";			
	}	
	}
	else
	{
		$result['message']="Failed to get mobile number!!";
	}
	//print_r($result);
	//die;
print_r(json_encode($result));
	}

public function editprofile()
{
	 $form_data = json_decode(file_get_contents("php://input"));
	//print_r($form_data);
	//echo "hii";
	 $result=$this->usermodel->editprofilemodal($form_data);
	 print_r(json_encode($result));
}

public function check_coupoun()
{
	
	$form_data = json_decode(file_get_contents("php://input"));
	// print_r($form_data);
	$result=$this->usermodel->check_coupoun($form_data);
	if (!empty($result)) {
	print_r(json_encode($result));
	}
	
}

public function walletview()
{	
  $this->load->view('wallet/header');
 $this->load->view('wallet/index.php');
 $this->load->view('wallet/footer');

}
public function user_transaction_view()
{
$txns['today']=$this->usermodel->today_txn();
$txns['yesterday_txn']=$this->usermodel->yesterday_txn();
$txns['all_txn']=$this->usermodel->all_txn();
  $this->load->view('wallet/header');
 $this->load->view('wallet/user-transaction.php',$txns);
 $this->load->view('wallet/footer');
}
public function user_profile_view()
{
	$id = $this->session->userdata("customer")['id'];
	$data['customer']=$this->usermodel->getdetails($id);
 $this->load->view('wallet/header');
 $this->load->view('user/user_profile/user-profile.php',$data);
 $this->load->view('wallet/footer');	
}
public function user_notification()
{
$data['notifications']=$this->usermodel->get_user_notification();

$this->load->view('wallet/header');
 $this->load->view('user/notification/user-notification.php',$data);
 $this->load->view('wallet/footer');
}
public function count_notification()
{
	$data=$this->usermodel->count_notification();


}
public function read_notification()
{
	$data=$this->usermodel->read_notification();
}
public function seen_notification()
{   $form_data = json_decode(file_get_contents("php://input"));
    print_r($form_data);

	$data=$this->usermodel->seen_notification($form_data->id);
	print_r(json_encode($data));
}
public function notification_details()
{
	 $id=base64_decode($_GET['id']);
	$data['details']=$this->usermodel->get_notification_details($id);
	$this->load->view('wallet/header');
 $this->load->view('user/notification/notification_details.php',$data);
 $this->load->view('wallet/footer');

}
public function delete_notification()
{
	$form_data = json_decode(file_get_contents("php://input"));
	$data=$this->usermodel->delete_notification($form_data->id);
	print_r(json_encode($data));
}



public function view_txns()
{
	 $data= $this->usermodel->get_txns();
	 //print_r($data);

     print_r(json_encode($data));

}

	public function saveWebToken(){
	    if(isset($_POST['token'])){
    $token=$_POST['token'];
    $res=$this->usermodel->udateWebToken($token);
    print_r($res);
	    }
	}
	
	public function edit_name()
{
	$form_data = json_decode(file_get_contents("php://input"));
	$data=$this->usermodel->change_name($form_data);
	//print_r($form_data);
  print_r(json_encode($data));

}
public function edit_email()
{
	$form_data = json_decode(file_get_contents("php://input"));
	$data=$this->usermodel->change_email($form_data);
	//print_r($form_data);
  print_r(json_encode($data));

}
public function edit_aadhar()
{
	$form_data = json_decode(file_get_contents("php://input"));
	$data=$this->usermodel->change_aadhar($form_data);
	//print_r($form_data);
  print_r(json_encode($data));

}
public function edit_profile_photo()
{
	$form_data = json_decode(file_get_contents("php://input"));
	$data=$this->usermodel->editprofilemodal($form_data);
	//print_r($form_data);
  print_r(json_encode($data));

}
public function sorry_ride(){
    $form_data = json_decode(file_get_contents("php://input"));
 	$data=$this->usermodel->sorry_ride_model($form_data);
	if(!empty($data['fmc']) && !empty($data['dtype'])){
	   if($data['dtype']==='web'){
        $key=WEB_SERVER_KEY;
        $dataw='data';
    }
    else{
        $key=ANDROID_PILOT_SERVER_KEY;
        $dataw='notification';
    }
    $tok=$data['fmc'];
    $utoken=array($tok);
    $msg=[
    'title' => 'Ride Canceled 🚫',
    'body' => ' this ride has been canceled.',
    'icon' => 'https://minitravelagency.com/app-assets/assets/img/favicon/logo.jpg',
    'url' => 'my-rides',
        ];
  $this->fmc->notify($key,$utoken,$msg,$dataw);
	}
  print_r(json_encode($data['status']));
}
}
