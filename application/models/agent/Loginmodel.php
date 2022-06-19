<?php
class Loginmodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		public function get_coupans()
	{
		$query=$this->db->get_where('tbl_coupon_master',array('status='=>"1"));
		return $query->result();
	}
	public function loginthroughapp($var)
	{
$query="SELECT * FROM tbl_agent_master WHERE `email`='".$var->username."' OR `mobile`='".$var->username."'";
$res=$this->db->query($query)->row();
if (!empty($res)) 
{
if ($res->password==md5($var->password)) 
{
$car=$this->db->query("SELECT * FROM tbl_vehicle_master WHERE aid='".$res->id."'")->row();
$cararr=$this->db->query("SELECT * FROM tbl_vehicle_master WHERE aid='".$res->id."'")->row_array();
if(!empty($car))
{
$this->session->set_userdata("pilot",$cararr);
$logincookie=md5(uniqid().$car->id);
$logincookiepass=md5(uniqid().$car->vnumber);
$update = array('logincookie' => $logincookie,'logincookiepass'=>$logincookiepass,"fmctoken"=>$var->FMCtoken,"dtype"=>"app");
$this->db->where('aid', $res->id);
$this->db->update('tbl_vehicle_master', $update);
$logincookie = array(
                        'name'   => 'logincookie',
                        'value'  => $logincookie,                            
                        'expire' => 86400 * 30,                                                                                   
                        'secure' => TRUE
                        );
$logincookiepass=array(
                        'name'   => 'logincookiepass',
                        'value'  => $logincookiepass,                            
                        'expire' => 86400 * 30,                                                                                   
                        'secure' => TRUE
                        );
$this->input->set_cookie($logincookie);
$this->input->set_cookie($logincookiepass);
}
$this->session->set_userdata('agent',$res);
echo "<script>window.location.href='".base_url()."agent';</script>";
}
else
{
echo "Opps!!It's look like password have been changed please clear all the cache from the App and Sing In Again.";
}
}
else
{
echo "Opps!!It's look like cookies have been changed please clear all the cache from the App and Log In Again.";
}
	}
	public function androidagentregistrationmodel($name,$email,$mobile,$password)
	{
		$return=new stdClass;
$return->status = false;
$return->message="Initializer";
$ardata=array('name'=>$name,'email'=>$email,'mobile'=>$mobile,'password'=>md5($password));
$query=$this->db->insert('tbl_agent_master', $ardata);
if($this->db->affected_rows($query)>0)
{
	$return->status=true;
	$return->message="Regestration Successfull.Please login to continue!!";
}
else
{
	$return->message="Failed to Register!!Please check your credentials!!";
}
return $return;
	}
function login($var)
{
    //android part don't touch for web
$return=new stdClass;
$return->status = false;
$return->message="Initializer";
$query="SELECT * FROM tbl_agent_master WHERE `email`='".base64_decode($var->username)."' OR `mobile`='".base64_decode($var->username)."'";
$res=$this->db->query($query)->row();
if (!empty($res)) 
{
if ($res->password==md5(base64_decode($var->password))) 
{
    $cararr=$this->db->query("SELECT * FROM tbl_vehicle_master WHERE aid='".$res->id."'")->row_array();
    $this->session->set_userdata('agent',$res);
    $this->session->set_userdata("pilot",$cararr);
     $return->status = true;
	 $return->message="Found User";
}
else
{
	$return->message="Incorrect Password!!";
}
}
else
{
$return->message="User Not Found";
}
 return $return;
}
	function loginWeb($var)
	{
$return = array('status' => false,'message'=>"");
$query="SELECT * FROM tbl_agent_master WHERE `email`='".$var->username."' OR `mobile`='".$var->username."'";
$res=$this->db->query($query)->row();
if (!empty($res)) 
{
if ($res->password==md5($var->password)) 
{
    $cararr=$this->db->query("SELECT * FROM tbl_vehicle_master WHERE aid='".$res->id."'")->row_array();
    $this->session->set_userdata('agent',$res);
    $this->session->set_userdata("pilot",$cararr);
    $return['status']=true;
	 $return['message']="Found User";
}
else
{
	$return['message']="Incorrect Password!!'".base64_decode($res->password)."'";
}
}
else
{
$return['message']="User Not Found";
}
 return $return;
}
}