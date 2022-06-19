<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Agent extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('agent/Agentmodel');
		$this->load->model('pilot/pilotmodel');
		$this->load->model('agent/registrationmodel');
		$agent=$this->session->userdata('agent');
		if(!empty($agent)){}
			else{
				redirect("welcome/agentlogout");
			}
	}
	public function view_location()
	{
				$form_data = json_decode(file_get_contents("php://input"));
if (!empty($form_data)) {
	print_r(json_encode($this->Agentmodel->get_vechichal_location($form_data)));
}
	}
	public function index()
	{ 
		redirect('pilot');
	}
	public function passbook()
	{
	$agent=$this->session->userdata('agent');
	$data['adm']=$this->db->get_where('tbl_agent_master',array('id =' => $agent->id))->result();
$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
$data['earnings']=$this->pilotmodel->getearning(date("Y-m-d"));
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/passbook/passbook.php',$data);
		$this->load->view('agent/public/h1_footer.php');
	}
	public function getearningonmonth()
	{
		$form_data = json_decode(file_get_contents("php://input"));
	$date=$form_data->date;
	$month=$form_data->month;
	$year=$form_data->year;
	$rdate=$year."-".$month;
echo	$this->pilotmodel->getearning($rdate);
	}
	public function getearningon()
	{
	$form_data = json_decode(file_get_contents("php://input"));
	$date=$form_data->date;
	$month=$form_data->month;
	$year=$form_data->year;
//	echo $year."-".$month."-".$date;
	$rdate=date("Y-m-d",strtotime($year."-".$month."-".$date));
echo	$this->pilotmodel->getearning($rdate);
	}
	public function walletreq()
{
	$amount=$this->input->post("amount");
	if ($this->Agentmodel->reqwallet($amount)) 
	{
	echo "<script>alert('Request Submitted Successfully!!');window.location='".base_url()."agent/wallet/';</script>";
	}
	else
	{
	echo "<script>alert('Failed to request!!');window.location='".base_url()."agent/wallet/';</script>";
	}
}
	public function wallet()
	{
		$agent=$this->session->userdata('agent');
		$data['adm']=$this->db->get_where('tbl_agent_master',array('id =' => $agent->id))->result();
$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
$data['pending']=$this->Agentmodel->getpendingreq();
$data['recent']=$this->Agentmodel->getrecentreq();
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/wallet/index.php',$data);
		$this->load->view('agent/public/h1_footer.php');
	}
	public function edit_profile()
	{

		$agent=$this->session->userdata('agent');
		$data['adm']=$this->db->get_where('tbl_agent_master',array('id =' => $agent->id))->result();
$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/edit_profile/index.php',$data);
		$this->load->view('agent/public/h1_footer.php');
	}
	public function edit_pro()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		// print_r($form_data);
  $res=$this->Agentmodel->edit_prof($form_data);
  print_r(json_encode($res));
	}
	public function edit_password()
	{
$agent=$this->session->userdata('agent');
$var=$agent->id;
$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/update_password/index.php');
		$this->load->view('agent/public/h1_footer.php');
	}
	public function change_pass()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		// print_r($form_data);
  $res=$this->Agentmodel->change_pass($form_data);
  print_r(json_encode($res));
	}
	public function myvehicle()
	{
		$agent=$this->session->userdata('agent');
			$var=$agent->id;
			$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
			if(!empty($data['pilot'])){
		if ($data['pilot']->status=="inuse") 
		{
		$data['current_ride']=$this->pilotmodel->getride($this->session->userdata("pilot")['id']);
		}
		else
		{
			$data['current_ride']=(object)  array();
		}
	}
			$data['list']=$this->Agentmodel->vehicleslist($var);
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/myvehicle/index.php',$data);
		$this->load->view('agent/public/h1_footer.php');
	}
	public function addvehicle()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		// print_r($form_data);
  $res=$this->Agentmodel->addvehicles($form_data);
  print_r(json_encode($res));
	}
	public function getvehicle()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		// print_r($form_data);
  $res=$this->Agentmodel->getvehicle($form_data);
    print_r(json_encode($res));
	}
	public function editvehicle()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		
		$res=$this->Agentmodel->editvehicle($form_data);
    print_r(json_encode($res));
	}
	public function view_vehicle_status()
	{ 
		$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		if ($data['pilot']->status=="inuse") 
		{
		$data['current_ride']=$this->pilotmodel->getride($this->session->userdata("pilot")['id']);
		}
		else
		{
			$data['current_ride']=(object)  array();
		}
		$var=$this->session->userdata('agent')->id;
		$data['list']=$this->Agentmodel->view_vehicle_status($var);
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/view_vehicle_status/index.php',$data);
		$this->load->view('agent/public/h1_footer.php');
	}

	public function Payment_Details()
	{
		$data['pilot']=$this->pilotmodel->get_pilot($this->session->userdata("pilot")['demail'],$this->session->userdata("pilot")['id']);
		if ($data['pilot']->status=="inuse") 
		{
		$data['current_ride']=$this->pilotmodel->getride($this->session->userdata("pilot")['id']);
		}
		else
		{
			$data['current_ride']=(object)  array();
		}
	    $var=$this->session->userdata('agent')->id;
		$data['list']=$this->Agentmodel->payment_details($var);
		$this->load->view('agent/public/h1_header.php');
		$this->load->view('agent/public/h1_sidebar.php',$data);
		$this->load->view('agent/public/h1_topnavbar.php');
		$this->load->view('agent/Payment_details/index.php',$data);
		$this->load->view('agent/public/h1_footer.php');
	}
	public function complete_form(){
	    $form_data = json_decode(file_get_contents("php://input"));
		// print_r($form_data);
  $res=$this->registrationmodel->complete_form($form_data);
    print_r(json_encode($res));
	}

}
