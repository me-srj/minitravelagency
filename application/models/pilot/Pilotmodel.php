<?php
class Pilotmodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function change_status($type,$value)
	{
		$update=array($type=>$value);
		$this->db->where("id",$this->session->userdata("pilot")['id']);
		$this->db->update('tbl_vehicle_master',$update);
	} 
	public function accept_payment($id)
	{
	$update=array('payment'=>"paid",'ptype'=>"cash");
	$this->db->where('id',$id);
	if ($this->db->update("tbl_ride_master",$update)) 
	{
	return true;
	}
	else
	{
		return false;
	}
	}
	public function check_end_otp($id,$otp)
	{
$query=$this->db->get_where('tbl_ride_master',array('id'=>base64_decode($id)));
		$res=$query->row_array();
		if ($res['endotp']==$otp && $res['payment']=="paid") {
$update=array('dstatus'=>"compteted",'cstatus'=>"complete");
$this->db->where("id",base64_decode($id));
$this->db->update("tbl_ride_master",$update);
		$updatepilot=array('status'=>'free','currid'=>NULL,'alocal'=>'yes');
$this->db->where("id",$this->session->userdata("pilot")['id']);
$this->db->update('tbl_vehicle_master', $updatepilot);
$adm=$this->db->query("SELECT * FROM tbl_admin_master WHERE id='1'")->row_array();
$agent=$this->db->query("SELECT * FROM tbl_agent_master WHERE id='".$this->session->userdata("agent")->id."'")->row_array();
if ($res['ptype']=="cash") 
{
$tax=$res['tax'];
$margin=($res['fair']/100)*$adm['brokerage'];
$wallet=$res['wallet_pay'];
$amt=-1*($tax+$margin-$wallet);
}
else
{
$amt=(($res['fair']/100)*(100-$adm['brokerage']));
}
$newamt=floatval($agent['wallet'])+floatval($amt);
$this->db->query("UPDATE `tbl_agent_master` SET `wallet`='".$newamt."' WHERE `id`='".$this->session->userdata("pilot")['aid']."'");
$this->db->query("INSERT INTO `tbl_wallet_txn_master_agent`(`aid`, `amount`, `description`, `txntype`, `rrid`, `nwallet`,`admb`,`status`) VALUES ('".$this->session->userdata("pilot")['aid']."','".$amt."','Ride Amount Adjustment','ride','".$res['id']."','".$newamt."','".$adm['brokerage']."','success')");
			return true;
		}
		else
		{
return false;
		}
	}
	public function check_start_otp($id,$otp)
	{
	$query=$this->db->get_where('tbl_ride_master',array('id'=>base64_decode($id)));
		$res=$query->row_array();
		if ($res['otp']==$otp) {
	$generator = "1234567890"; 
    $otp =""; 
    for ($i = 1; $i <= 6; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
$update=array('endotp'=>$otp,'dstatus'=>"accepted",'cstatus'=>"riding");
$this->db->where("id",base64_decode($id));
$this->db->update("tbl_ride_master",$update);
			return true;
		}
		else
		{
return false;
		}
	}
	public function getride($id,$currid)
	{
	$query="SELECT *,a.id as arid FROM `tbl_ride_master` AS a JOIN tbl_customer_master AS b on a.cid = b.id WHERE a.vid='".$id."' AND a.id='".$currid."'";
//	print_r($this->db->query($query)->result());
//	die;
	return $this->db->query($query)->result();
	}
	
	public function in_use($rid)
	{
		$updatepilot=array('status'=>'inuse','alocal'=>'no','along'=>'no','currid'=>$rid);
$this->db->where("id",$this->session->userdata("pilot")['id']);
$this->db->update('tbl_vehicle_master', $updatepilot);		
	}
	public function reached_to_pickup($rid)
	{
		$updateride=array('dstatus'=>"waiting");
		$id=$this->session->userdata("pilot")['id'];
$this->db->where('id', $rid);
$this->db->update('tbl_ride_master', $updateride);
$this->in_use($rid);
return true; 
	}
	public function get_future_active_ride()
		{
		$id=$this->session->userdata("pilot")['id'];
		$currenttime=date("Y-m-d");
//$query="SELECT * FROM tbl_ride_master WHERE `vid`='".$id."' AND `ridingon`< '".$currenttime."'";
$query="SELECT *,a.id as arid FROM `tbl_ride_master` AS a JOIN tbl_customer_master AS b on a.cid= b.id WHERE a.vid='".$id."' AND a.ridingon > '".$currenttime."' AND (a.dstatus='waiting' AND a.dstatus='accepted') ORDER BY a.ridingon";
return $this->db->query($query)->result();
		}	
	public function get_future_rides()
		{
			$id=$this->session->userdata("pilot")['id'];
		$currenttime=date("Y-m-d");
//$query="SELECT * FROM tbl_ride_master WHERE `vid`='".$id."' AND `ridingon`< '".$currenttime."'";
$query="SELECT *,a.id as arid FROM `tbl_ride_master` AS a JOIN tbl_customer_master AS b on a.cid= b.id WHERE a.vid='".$id."' AND a.ridingon > '".$currenttime."' AND (a.dstatus='accepted' AND a.cstatus='waiting') ORDER BY a.ridingon";
return $this->db->query($query)->result();
		}	
	public function check_cookies($logincookie,$logincookiepass)
	{ 
$query=$this->db->get_where('tbl_vehicle_master',array('logincookie'=>$logincookie));
		$res=$query->row_array();
		if (!empty($res)) {
				if ($res['logincookiepass']==$logincookiepass) {
			$this->session->set_userdata("pilot",$res);
			return true;
		}
		else
		{
		delete_cookie('logincookie');
		delete_cookie('logincookiepass');
return false;
		}
		}
	}
public function acceptride($rid)
{
$ride=$this->db->query("SELECT * FROM `tbl_ride_master` WHERE `id`=".$rid." AND vid IS NULL");
 $ride=$ride->row_array();
 $return['status']=false;
 $return['message']="Failed to Find Ride!!";
 if(!empty($ride))
 {
 	$generator = "1234567890"; 
    $otp =""; 
    for ($i = 1; $i <= 6; $i++) { 
        $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
$update = array('vid' => $this->session->userdata("pilot")['id'],'dstatus'=>'accepted','otp'=>$otp);
$this->db->where('id', $rid);
if ($this->db->update('tbl_ride_master',$update)) 
{	
$return['status']=true;
$return['message']="Ride Accepted Successfully!! Find it in future rides. <a href='".base_url()."pilot/future_rides'>here</a>";
}
 }
 return $return;
}
	public function get_ride_feed()
	{
		$cname='';
$pilotq=$this->db->get_where("tbl_vehicle_master",array('id'=>$this->session->userdata("pilot")['id']));
$pilot=$pilotq->row_array();
// Search parameters
$lat = $pilot['vlatitude'];
$lng = $pilot['vlongitude'];
$radius = 20;
 
// Constants related to the surface of the Earth
$earths_radius = 6371;
$surface_distance_coeffient = 111.320;

$distance_formula = "$earths_radius * ACOS(SIN(RADIANS(sorcelatitude)) * SIN(RADIANS($lat)) + COS(RADIANS(sorcelongitude - $lng)) * COS(RADIANS(sorcelatitude)) * COS(RADIANS($lat)) )";
// Create a bounding box to reduce the scope of our search
$lng_b1 = $lng - $radius / abs(cos(deg2rad($lat)) * $surface_distance_coeffient);
$lng_b2 = $lng + $radius / abs(cos(deg2rad($lat)) * $surface_distance_coeffient);
$lat_b1 = $lat - $radius / $surface_distance_coeffient;
$lat_b2 = $lat + $radius / $surface_distance_coeffient;
 $sql =$this->db->query("SELECT c.*,a.*, ($distance_formula) AS distance,a.id as rideid,c.id as cusid FROM `tbl_ride_master` AS a LEFT JOIN `tbl_customer_master` as c on a.cid=c.id WHERE (sorcelatitude BETWEEN $lat_b1 AND $lat_b2) AND (sorcelongitude BETWEEN $lng_b1 AND $lng_b2) AND DATE(a.bookdate)>=CURDATE() AND cstatus='waiting' AND vid is null AND a.subcat='".$this->session->userdata('pilot')['subcat']."' ORDER BY a.kms");
     //return $sql->result();
$return="";
if (empty($sql->result())) {
$return="<div class='col-md-12 card alert alert-warning p-4 text-center'><h4 class='text-white'>Please Wait for a customer to book a ride !!</h4></div>";
return $return;
}
     foreach ($sql->result() as $rides) {
 $return.="<div id='ridediv".$rides->rideid."' class='col-md-12'><font>";
if (empty($rides->name)) {
$cname= "Customer";
}
else
{
$cname=$rides->name;
}
if ($rides->type=='oneway') {
$ridetype="<b class='badge badge-success'>Local</b>";
}
else
{
$ridetype="<b class='badge badge-danger'>Outstation</b>";	
}
$return.='<div class="card" style="padding:5px;box-shadow:red;">
                 <div class="card-header">
                <h4 class="card-title">'.$cname.'</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements" style="top: 25px;">
                    '.date("D,jS M,Y h:i A",strtotime($rides->ridingon)).'
                </div>
            </div>               
                <div class="card-content">
                    <div class="card-body">
                        <div class="col-12 timeline-left" id="activity">
                            <div class="timeline">
                                <ul class="base-timeline activity-timeline" style="margin-left:0px;">
                                  <li>
                                        <div class="timeline-icon bg-danger">
                                            <i class="ft-map-pin font-medium-1 text-white"></i>
                                        </div>
                                        
                                        <div class="base-timeline-info">
                                            <a href="#" class="text-danger">'.$rides->fromaddress.'</a>
                                        </div>
                                       
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-success">
                                            <i class="ft-map font-medium-1 text-white"></i>
                                        </div>
                                        
                                        <div class="base-timeline-info">
                                            <a href="#" class="text-success">'.$rides->toaddress.'</a>
                                        </div>
                                       
                                    </li>

                                </ul>

                        </div>
                    </div>
                    <div class="ml-0">
                    <h6><i class="la la-road font-medium-4 mt-3 "> </i> Ride Type : - <b> '.$ridetype.'</b></h6>
                        <h6><i class="la la-road font-medium-4 "> </i> Distance : - <b> '.$rides->kms.'</b></h6>
                        <h6><i class="la la-money font-medium-4"> </i> Total : - <b> ₹'.round($rides->fair+$rides->tax).'</b></h6>
                    </div>
                    <div class="text-center mt-3">

                       <a type="button" href="tel:+91'.$call=$rides->mobile.'" class="btn btn-success round mr-1"><i class="ft-phone"></i></a>
                       <button type="button" class="btn btn-bg-gradient-x-orange-yellow round mr-1" onclick="accept('.$rides->rideid.')">Accept</button>
                                    
                                </div></div>
                </div>
                </div>';
     }
     return $return;
              // print_r($sql->result());
              // die;
	}
public function getearning($date)//date("Y-m-d")
{
	$return="<tr><td colspan='5' class='alert alert-info'>No Records Found On (".$date.")</td></tr>";
	$rows=$this->db->query("SELECT * FROM tbl_wallet_txn_master_agent WHERE con like '%".$date."%' AND `aid`='".$this->session->userdata('agent')->id."'")->result();
	if (!empty($rows)) {
	$return="";
	foreach ($rows as $key) {
$ftd="<td class='text-dark'><b>---</b></td>";
if (!empty($key->rrid)) {
$ride=$this->db->query("SELECT * FROM tbl_ride_master WHERE id='".$key->rrid."'")->result();
$margin=($ride[0]->fair/100)*$key->admb;
$ftd="<td class='calcu'>(<b class='text-info'>".$ride[0]->fair."</b>+<b class='text-warning'>".$ride[0]->tax."</b>) / <b class='text-danger'>".$margin."</b>(".$key->admb.")</td>";
}
if ($key->amount<0) 
{
if ($key->status=="pending") 
{
$pid="<i class='badge badge-warning'>Pending</i>";
}
else
{
$pid="<i class='badge badge-info badge-sm txnid'>".$key->pid."</i>";
}
if (!empty($key->rrid)) {
$pid="<i class='badge badge-success badge-sm'>Trip: ".$key->rrid."</i>";
}
$return.="<tr>".$ftd."<td>".$pid."</td><td class='text-success'><b>---</b></td><td class='text-danger ditbit'>".$key->amount."</td><td class='bdate'>".$key->nwallet."<br>".date("M d",strtotime($key->con))."</td></tr>";
}
else
		{
$return.="<tr>".$ftd."<td><b>---</b></td><td class='text-success ditbit'>".$key->amount."</td><td class='text-danger'>---</td><td class='bdate'>".$key->nwallet."<br>".date("M d",strtotime($key->con))."</td></tr>";
		}
	}
	}
	return $return;
	}
	public function get_pilot($email_token,$id)
	{
$query=$this->db->get_where('tbl_vehicle_master',array('demail'=>$email_token,'id'=>$id));
		return $query->row();		
	}
public function check_session($email_token,$id)
	{

$query=$this->db->get_where('tbl_vehicle_master',array('demail'=>$email_token));
		$res=$query->row_array();
		return $res['id']==$id;
	}
	public function logout()
	{
		$id=$this->session->userdata("pilot")->id;
$query=$this->db->get_where('tbl_vehicle_master',array('id'=>$id));
		$res=$query->row_array();
if ($res['status']=="inuse") {
	return false;
}
else
{
$update = array('status' => '0','logincookie' => null,'logincookiepass'=>null);
$this->db->where('logincookie', get_cookie('logincookie'));
if ($this->db->update('tbl_vehicle_master', $update)) 
{	

$this->session->unset_userdata('pilot');
		delete_cookie('logincookie');
		delete_cookie('logincookiepass');
	return true;
}
}
	}
	function login($var)
	{
	$return = array('status' => false,'message'=>"");
$query="SELECT * FROM tbl_vehicle_master WHERE `demail`='".$var->username."' OR `dmobile`='".$var->username."' AND `status`!='blocked'";
$res=$this->db->query($query)->row_array();
if (!empty($res)) 
{
if ($res['password']==md5($var->password)) 
{
		$logincookie=md5(uniqid().$res['id']);
	$logincookiepass=md5(uniqid().$res['vnumber']);
$update = array('logincookie' => $logincookie,'logincookiepass'=>$logincookiepass,'status'=>'free');
$this->db->where('id', $res['id']);
if ($this->db->update('tbl_vehicle_master', $update)) 
{
$this->session->set_userdata("pilot",$res);
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
$return['status']=true;
$return['message']="login Successfull!!";
}
else
{
	$return['message']="Failed to Set cookie and session";
}
}
else
{
	$return['message']="Incorrect Password";
}
}
else
{
$return['message']="User not available";
}
return $return;
}
function getdash_income(){
 return $query=$this->db->query("SELECT SUM(toagent) AS totalincome FROM `tbl_agentpay_master` WHERE aid='".$this->session->userdata('agent')->id."' ")->row();
}
function getdash_booking(){
 return $query=$this->db->query("SELECT COUNT(*) AS totalbooking FROM `tbl_ride_master` as a LEFT JOIN `tbl_vehicle_master` AS b on a.`vid`=b.`id` WHERE b.`aid`='".$this->session->userdata('agent')->id."' AND a.`dstatus`='completed' ")->row();
}
function getdash_feature_booking(){
 return $query=$this->db->query("SELECT COUNT(*) AS totalfbooking FROM `tbl_ride_master` as a LEFT JOIN `tbl_vehicle_master` AS b on a.`vid`=b.`id` WHERE b.`aid`='".$this->session->userdata('agent')->id."' AND a.`dstatus`='accepted' ")->row();
}
 function udateWebToken($token){
     if(!empty($this->session->userdata("pilot"))){
     $update = array('fmctoken' => $token,'dtype'=>'web');
     $this->db->where("id",$this->session->userdata("pilot")['id']);
	 $res=$this->db->update('tbl_vehicle_master',$update);
	 if($res){
	     return "token Saved!";
	 }else{
	  return "token doesn't Save!";   
	 }
     }else{
         return "vehicle not added!";
     }
 }
 function sendnotifydata($rid){
     $sql=$this->db->query("SELECT a.fmctoken,a.dtype FROM `tbl_customer_master` AS a LEFT JOIN `tbl_ride_master` AS b ON a.id=b.cid WHERE b.id='".$rid."'");
     return $sql->row_array();
 }
}
