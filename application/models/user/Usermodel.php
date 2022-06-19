<?php
class Usermodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library("Sms_class");
		$this->load->library("FMC");
	}
	public function cashwalletpaydel($form_data)
	{
	$update=array('wcotp'=>NULL);
	$this->db->where('id',$form_data->rid);
	$this->db->update('tbl_ride_master',$update);
	}
	public function cashwalletpay($form_data,$otp)
	{
$update=array('wcotp'=>$otp);
$this->db->where('id',$form_data->rid);
$this->db->update('tbl_ride_master',$update);
	}
	function editprofilepicture($data)
{
	$return = array('status' => false,'message'=>"" );
 	if (!empty($data->photo)){
		$img=$data->photo;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/user/profile/'.$fname;
		if(file_put_contents($fileName, $fileData))
		{
			$this->db->set('image',$fname);
			$this->db->where('id',$data->id);
			if ($this->db->update('tbl_customer_master')) {
				$return['status']=true;
			$return['message']="Image Uploaded Successfully!!";
			}
			else
			{
		$return['message']="Failed To Update Photo";		
			}
		}
		else
		{
			$return['message']="Failed To Upload image";
		}
}
return $return;
}
public	function allpayw($form_data)
	{
		$return=false;
	$ride=$this->db->get_where("tbl_ride_master",array('id'=>$form_data->rid))->row_array();
	$user=$this->db->get_where("tbl_customer_master",array('id'=>$this->session->userdata("customer")['id']))->row_array();
	if (($ride['fair']+$ride['tax'])<=$user['wallet']) {
	$nwallet=$user['wallet']-($ride['fair']+$ride['tax']);
	$amt=$ride['fair']+$ride['tax'];
	$this->db->query("UPDATE `tbl_customer_master` SET `wallet`='".$nwallet."' WHERE id='".$this->session->userdata("customer")['id']."'");
	$this->db->insert("tbl_wallet_txn_master_customer",array('cid'=>$this->session->userdata("customer")['id'], 'amount'=>"-".$amt, 'msg'=>"Used For Trip : ".$ride['id'], 'description'=>"Your wallet is debited of &#8377 ".$amt." for Trip:".$ride['id'], 'rid'=>$ride['id']));
	$this->db->query("UPDATE `tbl_ride_master` SET `payment`='paid',`ptype`='online',`wallet_pay`='".$amt."' WHERE id='".$ride['id']."'");
	return true;
	}
return	$return;
	}
		public function check_book_server_side($id,$bdate)
	{
		$rdate=date('Y-m-d H:i:s',strtotime($bdate)+864000);
		$bookings=$this->db->query("SELECT * FROM `tbl_ride_master` where `vid`='".$id."' AND (`bookdate` BETWEEN '".$bdate."' AND '".$rdate."' OR `returndate` BETWEEN '".$bdate."' AND '".$rdate."')")->result();
//print_r($bookings);
$return=false;
$tmbd=strtotime($bdate);
foreach($bookings as $book)
{
	$tmb=strtotime($book->bookdate);
	$tmr=strtotime($book->returndate);
	if($tmbd>$tmb && $tmbd<$tmr)
	{
		$return=true;
		$this->session->set_userdata("rcar_id",$book->id);
	}
return $return;
}
}
public function cancel_ride($id,$return)
{
$ride=$this->db->query("SELECT * FROM `tbl_ride_master` WHERE id='".$id."' AND vid is null AND payment='unpaid'")->result();
if (empty($ride)) {
$return['message']="Failed to cancel the ride!!";
}
else
{
$update=array('cstatus'=>'cancel');
$this->db->where('id',$id);
if ($this->db->update('tbl_ride_master',$update)) {
	$return['status']=true;
		$return['message']="You Cancelled The Ride!!";
}
else
{
	$return['message']="Failed To Cancel The Ride!!";
}
}
return $return;
}
public function today_txn()
{
    $sql="SELECT * from tbl_wallet_txn_master_customer WHERE DATE(con)=CURRENT_DATE AND cid='".$this->session->userdata("customer")['id']."' ORDER by id desc";
     return $res=$this->db->query($sql)->result();
}

public function yesterday_txn()
{
  $sql="SELECT * from tbl_wallet_txn_master_customer WHERE DATE(con)=CURRENT_DATE - 1 AND cid='".$this->session->userdata("customer")['id']."' ORDER by id desc";
     return $res=$this->db->query($sql)->result();  
}

public function all_txn()
{
  $sql="SELECT * from tbl_wallet_txn_master_customer WHERE cid='".$this->session->userdata("customer")['id']."' ORDER by id desc";
     return $res=$this->db->query($sql)->result();  
}
	public function getride($id)
	{
$ride=$this->db->query("SELECT * FROM `tbl_ride_master` WHERE id='".$id."'")->result();
if ($ride[0]->vid=="") 
{
$vechicle[0]=new stdClass();
$vechicle[0]->id="";
}
else
{
$vechicle=$this->db->query("SELECT * FROM tbl_vehicle_master WHERE `id`='".$ride[0]->vid."'")->result();
}	
return $return = array('ride' => $ride,'vechicle'=>$vechicle);
	}
	public function getrides()
	{
$query=$this->db->query("SELECT * FROM `tbl_ride_master` WHERE cid='".$this->session->userdata("customer")['id']."' ORDER BY ridingon DESC");
	return $query->result();
	}
	public function check_cookies($logincookie,$logincookiepass)
	{
$query=$this->db->get_where('tbl_customer_master',array('cookie'=>$logincookie));
		$res=$query->row_array();
		if (!empty($res)) {
		if ($res['cookie_pass']==$logincookiepass) 
		{
			$this->session->set_userdata("customer",$res);
			
		 
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
	public function setusercookie($username)
	{
		$this->db->from('tbl_customer_master');
		$this->db->where('mobile', $username);
		$this->db->or_where('email', $username);		
		$query=$this->db->get();
		$crow= $query->row_array();
		$cookie=md5(uniqid());
		$cookie_pass=md5(uniqid().$crow['id']);
$update = array('cookie' => $cookie,'cookie_pass'=>$cookie_pass);
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
return true;
}
else
{
	return false;
}

		}	
	public function checkuserlogin($username,$otp)
	{
		$this->db->from('tbl_customer_master');
		$this->db->where('mobile', $username);
		$query=$this->db->get();
		$crow= $query->row_array();
		if (empty($crow['id'])) 
		{
		$rss=$this->db->insert('tbl_customer_master',array('mobile'=>$username));
 		$cid=$this->db->insert_id();
		$txn=array(
		    'cid'=>$cid,
		    'amount'=>'100',
		    'msg'=>'New Registration',
		    'description'=>'Rs 100 Successfully credited In your wallet',
		    'cby'=>'ADMIN'
		    );
		       $notification=array(
		    'userid'=>$cid,
		    'amount'=>'100',
		    'msg'=>'New Registration',
		    'description'=>'Rs 100 Successfully credited In your wallet'
		        );
		    $this->db->insert('tbl_notification_master',$notification);
		    $this->db->insert('tbl_wallet_txn_master_customer',$txn);
		$this->sms_class->login_otp_newc($otp,$username);
		return true;
		}	
		else
		{
		$this->sms_class->login_otp_newo($otp,$username);
		return true;
		}	
	}
	
function find_car($origin_latitude,$origin_logitude,$booking_date,$return_date,$trip_type)
	{ 
		$ltyp='';
		$origin_latitude= $origin_latitude;
		  $origin_longitude=$origin_logitude;

		if($trip_type=='local')
		{
			$ltyp="a.alocal='yes'";
		}
		else{
			$ltyp="a.along='yes'";
		}

// Search parameters
$lat = $origin_latitude;
$lng = $origin_longitude;
$radius = 6;
 
// Constants related to the surface of the Earth
$earths_radius = 6371;
$surface_distance_coeffient = 111.320;
 
// Spherical Law of Cosines
$distance_formula = "$earths_radius * ACOS( SIN(RADIANS(vlatitude)) * SIN(RADIANS($lat)) + COS(RADIANS(vlongitude - $lng)) * COS(RADIANS(vlatitude)) * COS(RADIANS($lat)) )";
 
// Create a bounding box to reduce the scope of our search
$lng_b1 = $lng - $radius / abs(cos(deg2rad($lat)) * $surface_distance_coeffient);
$lng_b2 = $lng + $radius / abs(cos(deg2rad($lat)) * $surface_distance_coeffient);
$lat_b1 = $lat - $radius / $surface_distance_coeffient;
$lat_b2 = $lat + $radius / $surface_distance_coeffient;
		if(!empty($return_date))
		{
$sql =$this->db->query("SELECT *, ($distance_formula) AS distance,c.id AS vecid FROM `tbl_vehicle_master` AS a LEFT JOIN `tbl_ride_master` AS b ON a.id=b.vid JOIN `tbl_vehicle_cat_master` AS c ON a.subcat=c.subcategory WHERE (b.bookdate NOT BETWEEN '".$booking_date."' AND '".$return_date."' OR b.returndate NOT BETWEEN '".$booking_date."' AND '".$return_date."') AND (vlatitude BETWEEN $lat_b1 AND $lat_b2) AND (vlongitude BETWEEN $lng_b1 AND $lng_b2) AND a.along='yes' AND c.ridetype='".$trip_type."' GROUP BY subcategory HAVING distance < $radius ORDER BY distance ASC");
              return $sql->result();
		}
		else
		{
// 		$return_date=date('Y-m-d H:i:s',strtotime($booking_date)+5400);		
// $sql =$this->db->query("SELECT *, ($distance_formula) AS distance,c.id AS vecid FROM `tbl_vehicle_master` AS a LEFT JOIN `tbl_ride_master` AS b ON a.id=b.vid JOIN `tbl_vehicle_cat_master` AS c ON a.subcat=c.subcategory WHERE (b.bookdate NOT BETWEEN '".$booking_date."' AND '".$return_date."' OR b.returndate NOT BETWEEN '".$booking_date."' AND '".$return_date."') AND (vlatitude BETWEEN $lat_b1 AND $lat_b2) AND (vlongitude BETWEEN $lng_b1 AND $lng_b2) AND ".$ltyp." AND c.ridetype='".$trip_type."' GROUP BY subcategory HAVING distance < $radius ORDER BY distance ASC");
//              if($sql->num_rows()>0) {
//                  return $sql->result();
//              }
//              else{
                $sql2 =$this->db->query( "SELECT a.subcat,($distance_formula) AS distance,c.id AS vecid FROM tbl_vehicle_cat_master as c LEFT JOIN `tbl_vehicle_master` AS a ON a.subcat=c.subcategory WHERE (vlatitude BETWEEN $lat_b1 AND $lat_b2) AND (vlongitude BETWEEN $lng_b1 AND $lng_b2) AND ".$ltyp." AND c.ridetype='".$trip_type."'  GROUP BY c.subcategory HAVING distance < $radius ORDER BY distance ASC");
                return $sql2->result();
             // }
		}
		 
 
// Construct our sql statement


    
}

public function cate_pricing($trip_type,$distance){
	if($trip_type==='outstation'){$hole=2;}else{$hole=1;}
    return $sql=$this->db->query("SELECT $hole*((rpkm * ".$distance." + dallowence + brockarage + baseprice) + ((rpkm * ".$distance." + dallowence + brockarage + baseprice)/100*6)) AS price,subcategory FROM `tbl_vehicle_cat_master` WHERE ridetype='".$trip_type."' ORDER BY id ")->result();
}

public function get_single_car($car_id)
{
	 $this->db->where('id',$car_id);
     $res =$this->db->get('tbl_vehicle_cat_master')->result();
     return $res;

}
function getdetails($id)
{
	$query=$this->db->get_where('tbl_customer_master',array('id='=>$id));
		return $query->result();
}
function editprofilemodal($data)
{
	$return = array('status' => false,'message'=>"Failed to upload profile" );
 	if (!empty($data->photo)){
		$img=$data->photo;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/user/profile/'.$fname;
		if(file_put_contents($fileName, $fileData))
		{
			$this->db->set('image',$fname);
			$this->db->where('id',$data->id);
			$this->db->update('tbl_customer_master');
			 	$return['status']=true;
           $return['message']="Updated Successfully !!";
		}
}
return $return;
}

function check_coupoun($var){
	$this->db->where('name',$var->name);
	$this->db->where('status','1');
     $res =$this->db->get('tbl_coupon_master')->result();
     if (!empty($res)) {
     if ($res[0]->type=="ONETIME") {
    $this->db->where('cid',$this->session->userdata("customer")['id']);
    $this->db->where('coupanid',$var->name);
    $user=$this->db->get("tbl_ride_master")->result();
    if (empty($user)) {
    return $res;
    }
    }
    else if ($res[0]->type=="SONETIME") {
    $this->db->where('cid',$this->session->userdata("customer")['id']);
    $user=$this->db->get("tbl_ride_master")->result();
    if (empty($user)) {
    return $res;
    }
    }
    else if($res[0]->type=="SEASONAL")
    {
//    	print_r($res);
     return $res;
    }
     }
    }
   function save_booking_later($data,$id)
    {
      $this->db->where('id',$id);
 $query= $this->db->update('tbl_ride_master',$data);
 if($query){
 	return true;
}
else{
return false;
}
//    	return true;
    
        }
function save_booking($data){
	$query=$this->db->insert('tbl_ride_master',$data);
	if($query){
	return true;
}
else{
	return false;
}
}


function get_wallet_balance()
{
	 $this->db->where('id',$this->session->userdata("customer")['id']);
     $res =$this->db->get('tbl_customer_master')->result();
     return $res;
}
function update_wallet_money($new_wallet_balance)
{
	$ddata = array('wallet' =>$new_wallet_balance);
        $this->db->where('id',$this->session->userdata("customer")['id']);
 $query= $this->db->update('tbl_customer_master',$ddata);
 if($query){
 	$return['status']=true;
$return['message']="Money Addes to Your Wallet";
}
else{
	$return['message']="Failed To Add Money";
}
return $return;

}
function save_txn($txn)
{
	$this->db->insert('tbl_wallet_txn_master_customer',$txn);
}

function save_notification($data)
{
	$this->db->insert('tbl_notification_master',$data);
}

function count_notification()
{
	
   $this->db->where('readstatus','0');
$query = $this->db->get('tbl_notification_master');
echo $query->num_rows();

 
}
function read_notification()
{ 
 $ddata = array('readstatus' =>'1');
     $this->db->where('readstatus','0');
	return $query= $this->db->update('tbl_notification_master',$ddata);

}
function seen_notification($id)
{ 

 $ddata = array('readstatus' =>'seen');
     $this->db->where('id',$id);
    $query= $this->db->update('tbl_notification_master',$ddata);
	 if($query){
 $return['status']=true;
$return['message']="Notification seen";
}
else{
	$return['message']="Failed to update";
}
return $return;

}
function get_user_notification()
{
	$this->db->where('userid',$this->session->userdata("customer")['id']);
	$this->db->order_by("con", "desc");
     $res =$this->db->get('tbl_notification_master')->result();
     return $res;

}
function get_notification_details($id)
{
    $sql="SELECT a.*,b.txn_id FROM `tbl_notification_master` AS a JOIN `tbl_wallet_txn_master_customer` AS b ON b.cid=a.userid WHERE a.userid='".$this->session->userdata("customer")["id"]."' AND a.id='".$id."'";
      $res=$this->db->query($sql)->result();
     return $res;	
}
function delete_notification($id)
{

	$sql="DELETE FROM `tbl_notification_master` WHERE id='".$id."' ";
      $res=$this->db->query($sql);
 if($res){
 $return['status']=true;
$return['message']="Notification Deleted";
}
else{
	$return['message']="Failed to delete";
}
return $return;	
}

function get_txns()
{
$sql="SELECT * FROM `tbl_wallet_txn_master_customer` where cid='".$this->session->userdata('customer')['id']."'  ORDER BY id DESC limit 5";
     return $res=$this->db->query($sql)->result();
//  if($res){
//  $return['status']=true;
// $return['message']="Data Accessed";
// }
// else{
// 	$return['message']="Failed to Access";
// }
// return $return;	
}	
function udateWebToken($token){
     if(!empty($this->session->userdata("customer"))){
     $update = array('fmctoken' => $token,'dtype'=>'web');
     $this->db->where("id",$this->session->userdata("customer")['id']);
	 $res=$this->db->update('tbl_customer_master',$update);
	 if($res){
	     return "token Saved!";
	 }else{
	  return "token doesn't Save!";   
	 }
     }else{
         return "vehicle not added!";
     }
 }
 function request_ride_notifydata($subcat,$rcvlat,$rcvlong){
	// Search parameters
	 $origin_latitude=$rcvlat;
	$origin_longitude=$rcvlong;
$lat = $origin_latitude;
$lng = $origin_longitude;
$radius = 6;
 
// Constants related to the surface of the Earth
$earths_radius = 6371;
$surface_distance_coeffient = 111.320;
 
// Spherical Law of Cosines
$distance_formula = "$earths_radius * ACOS( SIN(RADIANS(vlatitude)) * SIN(RADIANS($lat)) + COS(RADIANS(vlongitude - $lng)) * COS(RADIANS(vlatitude)) * COS(RADIANS($lat)) )";
 
// Create a bounding box to reduce the scope of our search
$lng_b1 = $lng - $radius / abs(cos(deg2rad($lat)) * $surface_distance_coeffient);
$lng_b2 = $lng + $radius / abs(cos(deg2rad($lat)) * $surface_distance_coeffient);
$lat_b1 = $lat - $radius / $surface_distance_coeffient;
$lat_b2 = $lat + $radius / $surface_distance_coeffient;

 $sql=$this->db->query("SELECT a.fmctoken,a.dtype, ($distance_formula) AS distance FROM tbl_vehicle_cat_master as c LEFT JOIN `tbl_vehicle_master` AS a ON a.subcat=c.subcategory WHERE (vlatitude BETWEEN $lat_b1 AND $lat_b2) AND (vlongitude BETWEEN $lng_b1 AND $lng_b2) AND a.fmctoken!=null OR a.fmctoken!='' AND a.subcat = '".$subcat."' GROUP BY a.id HAVING distance < $radius ORDER BY distance ASC");
 return $sql->result();
}

function change_name($form_data)
{
	
	$sql="UPDATE `tbl_customer_master` SET `name`='".$form_data->name."' WHERE id='".$form_data->id."' ";
      $res=$this->db->query($sql);
 if($res){
 $return['status']=true;
$return['message']="Name Updated Successfully";
}
else{
	$return['message']="Failed to update";
}
return $return;	
}

function change_email($form_data)
{
	
	$sql="UPDATE `tbl_customer_master` SET `email`='".$form_data->email."' WHERE id='".$form_data->id."' ";
      $res=$this->db->query($sql);
 if($res){
 $return['status']=true;
$return['message']="email Updated Successfully";
}
else{
	$return['message']="Failed to update";
}
return $return;	
}
function change_aadhar($data)
{
	$return = array('status' => false,'message'=>"" );
 	if (!empty($data->photo)){
		$img=$data->photo;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/user/adhar/'.$fname;
		$aadhar_back=$data->aadhar_back;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($aadhar_back);
		$fileName2='app-assets/images/user/adhar/'.$fname2;
		if(file_put_contents($fileName, $fileData) && file_put_contents($fileName2, $fileData2)){
		$ddata = array('aadhar_no' => $data->aadhar_no,'aadhar_card' => $fname,'aadhar_back'=>$fname2);
        $this->db->where('id',$this->session->userdata('customer')['id']);
 $query= $this->db->update('tbl_customer_master',$ddata);
 if($query)
 {
 	$return['status']=true;
$return['message']="Updated Successfully !!";
}
else{
	$return['message']="Failed to Update";
}
return $return;
		}
}
}

function adminamount()
{
    $sql=$this->db->query("SELECT SUM(amount) AS admintotal FROM `tbl_wallet_txn_master_customer` WHERE cid='".$this->session->userdata('customer')['id']."' AND cby='ADMIN' ");
    return $sql->row_array();
}
function walletaccess()
{
	$sql=$this->db->query("SELECT count(*) FROM `tbl_ride_master` WHERE cid='".$this->session->userdata('customer')['id']."'");
    return $sql->num_rows();

}
function useramount()
{
    $sql=$this->db->query("SELECT SUM(amount) AS usertotal FROM `tbl_wallet_txn_master_customer` WHERE cid='".$this->session->userdata('customer')['id']."' AND cby=null ");
    return $sql->row_array();
}
function sorry_ride_model($from){
    $data['fmc']='';
    $data['dtype']='';
    $data['status']='False';
    $check=$this->db->query("SELECT a.fmctoken,a.dtype FROM `tbl_vehicle_master` AS a JOIN `tbl_ride_master` AS b ON a.id = b.vid WHERE b.id='".$from->isd."'")->row_array();
    if(!empty($check)){
$this->db->query("UPDATE `tbl_vehicle_master` AS a JOIN `tbl_ride_master` AS b ON a.id = b.vid SET a.status='free',a.alocal='yes', b.cstatus='cancel',a.currid=NULL WHERE b.id='".$from->id."'");
        $data['status'] = 'True';
        $data['dtype'] = $check['dtype'];
        $data['fmc'] = $check['fmctoken'];
    }else{
     $query=$this->db->query("UPDATE `tbl_ride_master` SET `cstatus`='cancel' WHERE `id`='".$from->id."'");
        $data['status']='True';
    }
    return $data;
}
}