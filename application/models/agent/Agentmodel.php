<?php
class Agentmodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function vehicleslist($var)
	{
		$query=$this->db->get_where('tbl_vehicle_master',array('aid='=>$var));
		return $query->result();
}
public function get_vechichal_location($value)
{
$query=$this->db->get_where('tbl_vehicle_master',array('id'=>$value->id));
return $query->row();
}
function getpendingreq()
{
return $this->db->query("SELECT * FROM `tbl_wallet_txn_master_agent` WHERE (rrid is null OR pon is null) AND `aid`='".$this->session->userdata('agent')->id."' AND `txntype`='req' and pid is null")->result();	
}
function getrecentreq()
{
return $this->db->query("SELECT * FROM `tbl_wallet_txn_master_agent` WHERE (con >'".date("Y-m-d",strtotime("-10 days"))."' OR pon >'".date("Y-m-d",strtotime("-10 days"))."') AND `aid`='".$this->session->userdata('agent')->id."' and `txntype`='req' ")->result();
}
function count_dash_data()
{
	    $query= "select count(*) as vtotal from tbl_vehicle_master where aid='".$this->session->userdata('agent')->id."'";
	   $dat['v']=$this->db->query($query)->result();
	   $query2= "SELECT count(*) as btotal FROM `tbl_ride_master` as a join tbl_vehicle_master as b on a.vid=b.id where b.id='".$this->session->userdata('agent')->id."' and a.cstatus='complete'";
	   $dat['b']=$this->db->query($query2)->result();
	   $query3="SELECT SUM(toagent) as tincome FROM tbl_agentpay_master where `aid`='".$this->session->userdata('agent')->id."'";
	   $dat['income']=$this->db->query($query3)->result();
		// $this->db->count_all_results('tbl_agent_master');
		// $dat['total_vehicles']=$this->db->count_all_results('tbl_vehicle_master');
		
		return $dat;
}
function addvehicles($data)
	{
		$return = array('status' => false,'message'=>"" );
		$check_data=$this->db->query("select * from tbl_vehicle_master where vnumber='".$data->vnumber."'");
		if($check_data->num_rows()>0)
		{
			$return['status']=false;
			$return['message']="This Vehicle is Already Exits!!";
		}
		else{
			$agent = $this->session->userdata('agent');
			$check_data2=$this->db->query("select * from tbl_vehicle_master where dmobile='".$agent->mobile."' OR demail='".$agent->email."' OR dlicence_number='".$data->dlicence_number."'");
			if($check_data2->num_rows()>0)
			{
				$return['status']=false;
			$return['message']="This Driver Already Associated!!";
			}
			else{
		if (!empty($data->vphoto) and !empty($data->dimage) and !empty($data->dlicence_doc)) {
		$img=$data->vphoto;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/agent/vehicle_photo/'.$fname;
		// dimg
		$img2=$data->dimage;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($img2);
		$fileName2 =  'app-assets/images/agent/driver_doc/'.$fname2;
		// dll
		$img3=$data->dlicence_doc;
		$fname3=uniqid().".jpeg";
		$fileData3 = base64_decode($img3);
		$fileName3 =  'app-assets/images/agent/driver_doc/'.$fname3;
$aid = $agent->id;
		if (file_put_contents($fileName, $fileData) && file_put_contents($fileName2, $fileData2) && file_put_contents($fileName3, $fileData3))
		{
$ardata = array('aid' => $aid,
	'vname' => $data->vname,
	'vnumber' => $data->vnumber,
	'vregistrationnumber' => $data->vregistrationnumber,
	'vphoto' => $fname,
	'demail' => $agent->email,
	'dimage' => $fname2,
	'dmobile'=> $agent->mobile,
	'dlicence_number'=> $data->dlicence_number,
	'dlicence_doc' => $fname3,
	'dexperience' => $data->dexperience,
	'dname' => $agent->name,
	'cat' => $data->cat,
	'subcat' => $data->subcat
);
$query=$this->db->insert('tbl_vehicle_master', $ardata);
if($this->db->affected_rows($query)>0){
$return['status']=true;
$return['message']="Added Successfully !!";
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
		}
		}

 return $return;
}
 function getvehicle($data){
 	$query=$this->db->get_where('tbl_vehicle_master',array('id='=>$data->id));
		return $query->result();
 }
 function editvehicle($data){
 	$return = array('status' => false,'message'=>"" );
 	$agent = $this->session->userdata('agent');
    $check_data2=$this->db->query("select * from tbl_vehicle_master where dmobile='".$agent->mobile."' OR demail='".$agent->email."' OR dlicence_number='".$data->dlicence_number."'");
			if($check_data2->num_rows()>1)
			{
				$return['status']=false;
			$return['message']="This Driver Already Associated!!";
			}
			else{
 	if (!empty($data->vphoto)){
		$img=$data->vphoto;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/agent/vehicle_photo/'.$fname;
		if(file_put_contents($fileName, $fileData)){
			$this->db->set('vphoto',$fname);
			$this->db->where('id',$data->id);
			$this->db->update('tbl_vehicle_master');
		}
 	}
 	if (!empty($data->dimage)){
		$img2=$data->dimage;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($img2);
		$fileName2 =  'app-assets/images/agent/driver_doc/'.$fname2;
		if(file_put_contents($fileName2, $fileData2)){
			$this->db->set('dimage',$fname2);
			$this->db->where('id',$data->id);
			$this->db->update('tbl_vehicle_master');
		}
 	}
 	if (!empty($data->dlicence_doc)){
		$img3=$data->dlicence_doc;
		$fname3=uniqid().".jpeg";
		$fileData3 = base64_decode($img3);
		$fileName3 =  'app-assets/images/agent/driver_doc/'.$fname3;
		if(file_put_contents($fileName3, $fileData3)){
			$this->db->set('dlicence_doc',$fname3);
			$this->db->where('id',$data->id);
			$this->db->update('tbl_vehicle_master');
		}
 	}
 	if (isset($data->password)){
			$this->db->set('password',md5($data->password));
			$this->db->where('id',$data->id);
			$this->db->update('tbl_vehicle_master');
 	}
 	$ddata = array('vname' => $data->vname,'dlicence_number' => $data->dlicence_number,'cat' => $data->cat,'subcat' => $data->subcat);
 	$this->db->where('aid',$agent->id);
 	$query = $this->db->update('tbl_vehicle_master',$ddata);
 	if($query){
 	$return['status']=true;
$return['message']="Updated Successfully !!";
}
else{
	$return['message']="Failed to Update";
}
}
return $return;
 }
 function reqwallet($amount)
 {
 $return=false;
 $agent=$this->db->query("SELECT * FROM tbl_agent_master WHERE `id`='".$this->session->userdata("agent")->id."'")->row_array();
 if ($agent['wallet']<$amount) {
 return $return;
 }
 else
 {
 $newamt=$agent['wallet']-$amount;
 $reqsql="INSERT INTO `tbl_wallet_txn_master_agent`(`aid`, `amount`, `description`, `txntype`, `accountnumber`, `ifsc`, `name`, `status`,`nwallet`) VALUES ('".$this->session->userdata('agent')->id."','-".$amount."','Withdrawel Request','req','".$agent['accountnumber']."','".$agent['ifsc']."','".$agent['name']."','pending','".$newamt."')";
 $agentupdate="UPDATE `tbl_agent_master` SET `wallet`='".$newamt."' WHERE `id`='".$this->session->userdata('agent')->id."'";
$this->db->query($agentupdate);
$this->db->query($reqsql);
return $return=true;
 }
}
 function edit_prof($data)
 {
 	$return = array('status' => false,'message'=>"" );
 	$agent = $this->session->userdata('agent');
 	if (!empty($data->photo)){
		$img=$data->photo;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/agent/profile/'.$fname;
		if(file_put_contents($fileName, $fileData)){
			$this->db->set('photo',$fname);
			$this->db->where('id',$agent->id);
			$this->db->update('tbl_agent_master');
		}
 	}
 	$ddata = array('name' => $data->name, 'mobile' => $data->mobile, 'email' => $data->email,'accountnumber'=>$data->accountnumber,"ifsc"=>$data->ifsc);
 	$this->db->where('id',$agent->id);
 	$query = $this->db->update('tbl_agent_master',$ddata);
 	if($query)
 	{
 		$return['message']="Updated Successfully !!";
 	}
 	else{
	$return['message']="Failed to Update";
}
return $return;
 }
 function change_pass($value)
 {
 	$return = array('status' => false,'message'=>"" );
	$query=$this->db->get_where('tbl_agent_master',array('id'=>$this->session->userdata("agent")->id));
	$agent=$query->row_array();	
	if ($agent['password']==md5($value->old)) {
$update = array('password' => md5($value->new));
$this->db->where('id', $this->session->userdata("agent")->id);
if ($this->db->update('tbl_agent_master', $update)) {
$return['status']=true;
$return['message']="Password Updated Successfully!!";
}
else
{
	$return['message']="Failed to update Password";
}	
	}
	else
	{
		$return['message']= "Old Password match failed!!";
	}
	return $return;
 }
 function view_vehicle_status($id)
 {
 	return $this->db->query("SELECT b.vname,b.dname,a.fromaddress,a.toaddress,a.bookdate,a.returndate,a.type,a.fair,a.payment,a.dstatus FROM `tbl_ride_master` AS a JOIN tbl_vehicle_master AS b ON a.vid=b.id WHERE b.aid='".$id."' ")->result();
 }
 public function payment_details($val)
 {
 	$query="SELECT *,a.id as paymentid FROM tbl_agentpay_master as a JOIN tbl_ride_master as b JOIN tbl_vehicle_master as v ON a.rid=b.id AND b.vid=v.id WHERE a.aid='".$val."' order by paystatus";
	return $this->db->query($query)->result();
 
 }
}