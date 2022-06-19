<?php
class Common extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		 $this->load->library("Sms_class");
	}
	
		public function androiduserlogin($username,$FMC,$password)
	{
	$sql="SELECT * FROM tbl_customer_master WHERE (`mobile`='".$username."' or `email`='".$username."') AND `password`='".md5($password)."' AND status='1'";		
	$query=$this->db->query($sql);
	$crow= $query->row_array();
	$cookie=md5(uniqid());
	$cookie_pass=md5(uniqid().$crow['id']);
$update = array('dtype'=>'android','fmctoken'=>$FMC,'cookie' => $cookie,'cookie_pass'=>$cookie_pass);
$this->db->where('id', $crow['id']);
if ($this->db->update('tbl_customer_master', $update)) 
{
$this->session->set_userdata("customer",$crow);
$cookie = array(
                        'name'   => 'cookie',
                        'value'  => $cookie,                            
                        'expire' => 86400 * 3,                                                                                   
                        'secure' => TRUE
                        );
$cookie_pass=array(
                        'name'   => 'cookie_pass',
                        'value'  => $cookie_pass,                            
                        'expire' => 86400 * 3,                                                                                   
                        'secure' => TRUE
                        );
$this->input->set_cookie($cookie);
$this->input->set_cookie($cookie_pass);
echo "<script>window.location.href='".base_url()."';</script>";
}
else
{
echo "<script>window.location.href='".base_url()."';</script>";
}
	}
		public function send_reset_otpandroid($uname)
	{
		$return=array('status'=>false,'message'=>"Initial!!");
		$this->db->from('tbl_customer_master');
		$this->db->where('mobile', base64_decode($uname));
		$this->db->or_where('email', base64_decode($uname));		
		$query=$this->db->get();
		$crow= $query->row_array();
		if (!empty($crow)) 
		{
		$generator = "1234567890"; 
    $otp =""; 
    for ($i = 1; $i <= 4; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    	}
		$update=array('password'=>md5($otp));
		$this->db->where('email',base64_decode($uname));
		$this->db->or_where('mobile',base64_decode($uname));
		$this->db->update("tbl_customer_master",$update);
		$subject="Reset Password!!";
		$message="Hello Your OTP To Reset Your account's password is: ".$otp;
		$this->sms_class->login_otp_newc($otp,base64_decode($uname));
		//mail($crow['email'],$subject,$message);
		$return['status']=true;
		$return['message']= "OTP Sended Successfully!!";
		$return['cotp']=$otp;
		}
		else
		{
		$generator = "1234567890"; 
    $otp =""; 
    for ($i = 1; $i <= 4; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    	}
		$data=array('mobile'=>base64_decode($uname),'password'=>md5($otp));
		$this->db->insert("tbl_customer_master",$data);
		$return['status']=true;
		$return['message']= "OTP Sended Successfully!!";
		$return['cotp']=$otp;
		$this->sms_class->login_otp_newo($otp,base64_decode($uname));
		}
		return $return;
	}
	public function send_reset_otp($form_data)
	{
	$this->db->from(base64_decode($form_data->type));
		$this->db->where('mobile', $form_data->username);
		$this->db->or_where('email', $form_data->username);		
		$query=$this->db->get();
		$crow= $query->row_array();
		if (!empty($crow)) 
		{
				$generator = "1234567890"; 
    $otp =""; 
    for ($i = 1; $i <= 6; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
		$update=array('fotp'=>$otp);
		$subject="Reset Password!!";
		$message="Hello Your OTP To Reset Your account's password is: ".$otp;
		//$this->Sms_class->reset_password($otp,$number);
		//mail($crow['email'],$subject,$message);
		$this->db->where('email',$form_data->username);
		$this->db->or_where('mobile',$form_data->username);
		$this->db->update(base64_decode($form_data->type),$update);
		return "OTP Sended Successfully Reset <a href='".base_url()."welcome/forgot_password'>Here!!</a>";
		}
		else
		{
			return "Please Provide A Valid Username!!!";
		}

	}

public function send_agent_reset_otp($form_data)
	{
		$return = array('status' => false,'message'=>"" );
		$this->db->from('tbl_agent_master');
		$this->db->where('mobile', $form_data->username);
		$this->db->or_where('email', $form_data->username);		
		$query=$this->db->get();
		$crow= $query->row_array(); 

		if (!empty($crow)) 
		{
				$generator = "0123456789"; 
    $otp =""; 
    for ($i = 1; $i <= 6; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
		$update=array('fotp'=>$otp);
		$subject="Reset Password!!";
		$message="Hello Your OTP To Reset Your account's password is: ".$otp;
		$this->sms_class->reset_password($otp,$crow['mobile']);
		mail($crow['email'],$subject,$message);
		$this->db->where('email',$form_data->username);
		$this->db->or_where('mobile',$form_data->username);
		$this->db->update(base64_decode($form_data->type),$update);
		$return['status']=true;
		$return['message']="Otp Sended Successfully.Please check Spam if mail not delivered!";
		return $return;
		}
		else
		{
			$return['message']="Email Or Mobile Does'nt Exists.";
			return $return;
		}


	}
function check_forgot_password_otp($otp)
{      
        $table='tbl_agent_master';
		$query=$this->db->get_where($table,array('fotp'=>$otp));
	    $crow=$query->row(); 
		$crow= $query->row_array();
		if (!empty($crow)) 
		{	
			
		if ((strtotime(date('Y-m-d h-m-i'))-strtotime($crow['uon']))<600) {
		// $update=array('fotp'=>null,'password'=>md5($pass));
		// $this->db->where("fotp",$otp); 
		$return['message']="Otp Verfied Successfully";
		$return['status']=true;
		return $return;
		}
		else
		{
			$return['message']="OTP Expired!!";
			$return['status']=false;
            return $return;
		}
		}
		else
		{
			$return['message']="Please Provide A Valid OTP!!!";
			$return['status']=false;
			return $return;
		}
}

public function change_agent_password($form_data){
	    $this->db->from('tbl_agent_master');
		$this->db->where('mobile', $form_data->username);
		$this->db->or_where('email', $form_data->username);		
		$query=$this->db->get();
		$crow= $query->row_array();
		if(!empty($crow))
		{
			$data=array('password'=>md5($form_data->password));
			$this->db->set($data);
			$this->db->where('email',$crow['email']);
			$this->db->update('tbl_agent_master');
			$return['message']="password Changed Successfully";
			$return['status']=true;
			return $return;

		}

		

}
}