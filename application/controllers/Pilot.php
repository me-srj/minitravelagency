<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilot extends CI_Controller {


function __construct()
	{ 
		parent::__construct();
		$this->load->model('pilot/pilotmodel');
		$this->load->library("FMC");
		 $email=$this->session->userdata('pilot')['demail'];
		 $id=$this->session->userdata("pilot")['id'];
		 if ($email==null||$id==null)  
		 {
		 	// redirect("pilot-login");
		 }
		  else
		  { 
		  	if ($this->pilotmodel->check_session($email,$id)) {
		  	$future_rides=$this->pilotmodel->get_future_active_ride();
		  	if (!empty($future_rides)) {
		  	//$this->pilotmodel->in_use();
		  	}
		  	}
		  	else
		  	{
		  	redirect("welcome/agentlogout");
		  	}
		  }
	}
	public function changestat()
	{
	$result = array('status' => true, 'message'=>'');
	$form_data = json_decode(file_get_contents("php://input"));		
	$this->pilotmodel->change_status($form_data->type,$form_data->value);
	//print_r($form_data);
	print_r(json_encode($result));
	}
	public function accept_payment()
	{
		$result=array('status'=>false,'message'=>"");
	$form_data = json_decode(file_get_contents("php://input"));
	if (!empty($form_data->id)) {
	if ($this->pilotmodel->accept_payment($form_data->id)) {
		$result['status']=true;
		$result['message']="Payment Recieved!!";
	}
	else
	{
		$result['message']="Failed to accept";
	}
	}
//	print_r($result);
	print_r(json_encode($result));
	}
	public function complete_ride_otp()
	{
	$id=$this->input->post("id");
	$otp=$this->input->post("otp");
	if (!empty($id)&&!empty($otp)) {
	if ($this->pilotmodel->check_end_otp($id,$otp)) {
	$this->session->set_flashdata('otp_message','OTP verification Successfull.');
		redirect("pilot");
	}
	else
	{
		$this->session->set_flashdata('otp_message','Failed To Verify OTP OR PAYMENT,Please try again.');
		redirect("pilot");
	}
	}
	else
	{
	$this->session->set_flashdata('otp_message','Failed To Get DATA.');
		redirect("pilot");
	}
}
	public function accept_otp()
	{
		$id=$this->input->post("id");
	$otp=$this->input->post("otp");
	if (!empty($id)&&!empty($otp)) {
	if ($this->pilotmodel->check_start_otp($id,$otp)) {
	$this->session->set_flashdata('otp_message','OTP verification Successfull.');
		redirect("pilot");
	}
	else
	{
		$this->session->set_flashdata('otp_message','Failed To Verify OTP,Please try again.');
		redirect("pilot");
	}
}
	else
	{
		redirect("pilot");
	}
	}
	public function reachedtopickup()
	{
if (!empty($_GET['id'])) {
$rid=base64_decode($_GET['id']);
if ($this->pilotmodel->reached_to_pickup($rid)) {
	redirect("pilot");
}
else
{
	redirect("pilot/future_rides");
}
}
else
{
	redirect("pilot");
}
	}
	public function accept_ride()
	{
	$rid=$this->input->post("id");
	$data=$this->pilotmodel->acceptride($rid);
	if($data['status']){
	    $this->sendnotify($rid);
	}
  echo json_encode($data);
	}
	public function get_ride_feed()
	{
echo	$this->pilotmodel->get_ride_feed();
	}
		public function ridefeed()
	{
		$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		$this->load->view('agent/public/h1_header');
		$this->load->view("agent/public/h1_sidebar",$data);
		$this->load->view("agent/public/h1_topnavbar",$data);
		$data['ridefeeds']=$this->pilotmodel->get_ride_feed();
		$this->load->view("agent/newsfeed/index",$data);
		$this->load->view("agent/public/h1_footer");	
	}
	public function future_rides()
	{
		$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		$this->load->view('agent/public/h1_header');
		$this->load->view("agent/public/h1_sidebar",$data);
		$this->load->view("agent/public/h1_topnavbar",$data);
$data['future_rides']=$this->pilotmodel->get_future_rides();
		$this->load->view("agent/future_rides/index",$data);
		$this->load->view("agent/public/h1_footer");
	}
	public function change_position()
	{
$form_data = json_decode(file_get_contents("php://input"));
if ($form_data->lattitude==""||$form_data->longitude=="") {
	die;
}
$update = array('vlatitude' => $form_data->lattitude,'vlongitude' => $form_data->longitude);
$this->db->where('logincookie', get_cookie('logincookie'));
if ($this->db->update('tbl_vehicle_master', $update)) 
{
//print_r($form_data);
}
	}
// 	public function logout()
// 	{
// if ($this->pilotmodel->logout()) {
// 		redirect("pilot-login");
// }
// else
// {
// 	redirect("pilot");
// }
// 	}
	public function index()
	{
		if(!empty($this->session->userdata('pilot'))){
		$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		if ($data['pilot']->status=="inuse") 
		{
		$data['current_ride']=$this->pilotmodel->getride($this->session->userdata("pilot")['id'],$data['pilot']->currid);
		}
		else
		{
			$data['current_ride']=(object)  array();
		}
		$data['get_income']=$this->pilotmodel->getdash_income();
		$data['get_booking']=$this->pilotmodel->getdash_booking();
		$data['get_fbooking']=$this->pilotmodel->getdash_feature_booking();
		$this->load->view('agent/public/h1_header');
		$this->load->view("agent/public/h1_sidebar",$data);
		$this->load->view("agent/public/h1_topnavbar",$data);
		$this->load->view("agent/dashboard/index",$data);
		$this->load->view("agent/public/h1_footer");
	}else{
		redirect("agent/myvehicle");
	}
}
	public function pilot_privacy()
	{
	   $this->load->view('agent/pilot_privacy.php');
	    
	}
	public function saveWebToken(){
	    if(isset($_POST['token'])){
    $token=$_POST['token'];
    $res=$this->pilotmodel->udateWebToken($token);
    print_r($res);
	    }
	}
public function sendnotify($rid){
    $name=$this->session->userdata('pilot')['dname'];
    $res=$this->pilotmodel->sendnotifydata($rid);
    if($res['dtype']==='web'){
        $key=WEB_SERVER_KEY;
        $data='data';
    }
    else{
        $key=ANDROID_SERVER_KEY;
        $data='notification';
    }
    $tok=$res['fmctoken'];
    $utoken=array($tok);
    $msg=[
    'title' => 'Your ride is accepted 😃',
    'body' => ''.$name.' accepted your ride.',
    'icon' => 'https://minitravelagency.com/app-assets/assets/img/favicon/logo.jpg',
    'url' => 'my-rides',
        ];
   $this->fmc->notify($key,$utoken,$msg,$data);
}
}
