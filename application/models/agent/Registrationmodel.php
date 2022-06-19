<?php
class Registrationmodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function register($data)
	{
		$return = array('status' => false,'message'=>"" );
		$checke=$this->db->get_where('tbl_agent_master',array('email' => $data->email));
		$checkm=$this->db->get_where('tbl_agent_master',array('mobile' => $data->mobile));
		$checka=$this->db->get_where('tbl_agent_master',array('adhar_no' => $data->adhar_no));
		if($checke->num_rows()>0)
		{
			$return['message']="This Email is already Registered.";
		}
		elseif ($checkm->num_rows()>0) {
			$return['message']="This Mobile no is already Registered.";
		}
		else if ($checka->num_rows()>0)
		{
			$return['message']="Addhar no is already Registered.";
		}
		else{
		$img=$data->photo;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/agent/profile/'.$fname;
		$img2=$data->adhar_doc;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($img2);
		$fileName2 =  'app-assets/images/agent/adhar_doc/'.$fname2;
		if (file_put_contents($fileName, $fileData) && file_put_contents($fileName2, $fileData2)) 
		{
$ardata = array('name' => $data->name,'email' => $data->email,'password' => md5($data->password),'mobile' => $data->mobile,'adhar_no' => $data->adhar_no,'adhar_doc' => $fname2,'photo' => $fname,'address'=>$data->address,'driver_bio'=>$data->driverbio);
$query=$this->db->insert('tbl_agent_master', $ardata);
if($this->db->affected_rows($query)>0){
$return['status']=true;
$return['message']="Registeration Successfully !!";
}
else
{
	$return['message']="Failed to Register";
}
		}
		else
		{
			$return['message']="failed to upload Image";
		}
		}
 return $return;
	}

	function get_photo()
	{
		$query=$this->db->get('manage_gallery');
		return $query->result();
	}
	function complete_form($data){
	    $return = array('status' => false,'message'=>"" );
 	    $agent = $this->session->userdata('agent');
	    $img2=$data->adhar_doc;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($img2);
		$fileName2 =  'app-assets/images/agent/adhar_doc/'.$fname2;
		if (file_put_contents($fileName2, $fileData2)) 
		{
		    $arrdata= array('adhar_no' => $data->adhar_no,'adhar_doc' => $fname2,'address' => $data->address ,'driver_bio' => $data->driverbio);
		    $this->db->where('id',$agent->id);
 	$query = $this->db->update('tbl_agent_master',$arrdata);
 	if($query)
 	{
 	    $qyt=$this->db->get_where('tbl_agent_master',array('id='=>$agent->id))->row();
 	    $this->session->set_userdata('agent',$qyt);
 	    $return['status']=true;
 		$return['message']="Added Successfully !!";
 		return $return;
 	}
 	else{
	$return['message']="Failed to Add";
	return $return;
 	}
	}
	}
	
}