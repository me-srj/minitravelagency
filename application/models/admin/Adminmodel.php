<?php
class Adminmodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	} 
		public function getearningtxn($date)//date("Y-m-d")
{
//<thead><th>Customer</th><th>Txn ID</th><th class="bg-success text-white">Amount</th><th>Date</th></thead>
$return="<tr><td colspan='5' class='alert alert-info'>No Records Found On (".$date.")</td></tr>";
$rows=$this->db->query("SELECT * FROM tbl_wallet_txn_master_customer WHERE con like '%".$date."%' AND `rid` IS NULL")->result();
	if (!empty($rows)) {
	$return="";
	foreach ($rows as $key) 
	{
	$customer=$this->db->query("SELECT * FROM tbl_customer_master WHERE id='".$key->cid."'")->result();
	$return.="<tr><td>".$customer[0]->name."<br>".$customer[0]->mobile."<br>".$customer[0]->email."</td><td>".$key->txn_id."</td><td class='text-success'>".$key->amount."</td><td>".date("M d",strtotime($key->con))."</td><td>".$key->description."</td></tr>";
	
	}
	}
	return $return;
	}
	public function getearningride($date)//date("Y-m-d")
{
//<thead><th>Base+Tax/Mgn(%)</th><th>Txn ID</th><th class="bg-success text-white">Amount</th><th class="bg-danger text-white">Tr ID</th><th>Wallet(Dt)</th></thead>
$return="<tr><td colspan='5' class='alert alert-info'>No Records Found On (".$date.")</td></tr>";
$rows=$this->db->query("SELECT * FROM tbl_ride_master WHERE con like '%".$date."%' AND `dstatus`='compteted' AND `cstatus`='complete'")->result();
	if (!empty($rows)) {
	$return="";
	foreach ($rows as $key) 
	{
	$agentrow=$this->db->query("SELECT * FROM tbl_wallet_txn_master_agent WHERE `rrid`='".$key->id."'")->result();
	if ($key->ptype=='online') {
	$txnid=$key->pid;
	$wallet=$key->wallet_pay;
	}
	else
	{
	$txnid="---";
	$wallet="---";
	}
	$amount=floatval(($key->fair/100)*$agentrow[0]->admb);
	$return.="<tr><td>".$key->fair."+".$key->tax."/".$agentrow[0]->admb."</td><td>".$txnid."</td><td class='text-success'>".$amount."</td><td>".$key->id."</td><td>".$wallet."/".date("M d",strtotime($key->con))."</td></tr>";
	
	}
	}
	return $return;
	}
	public function alot_driver($rid,$did)
	{
	$check=$this->db->query("SELECT * FROM tbl_ride_master WHERE id='".$rid."'")->result();
	if ($check[0]->vid=='') {
		$update=array('vid'=>$did);
	$this->db->where('id',$rid);
	$this->db->update('tbl_ride_master',$update);
	return true;
	}
	else
	{
		return false;
	}
	}
	public function get_drivers($r_id,$search)
	{
	$rows= $this->db->query("SELECT * FROM `tbl_vehicle_master` WHERE `vname` LIKE '%".$search."%' OR `vnumber` LIKE '%".$search."%' OR `dname` LIKE '%".$search."%' OR `demail` LIKE '%".$search."%' OR `dmobile` LIKE '%".$search."%'")->result();	
	$return="";
	foreach ($rows as $key) {
	$return.='<div class="col-md-12 card">
          <label>'.$key->dname.'</label><label><b>'.$key->demail.','.$key->dmobile.'</b></label>
        <label><i>'.$key->vnumber.'('.$key->vname.')'.'</i></label><label>'.$key->cat.'('.$key->subcat.')</label>
        <br>
        <center><a href="'.base_url().'admin/alotdrivers?rid='.base64_encode($r_id).'&did='.base64_encode($key->id).'" class="btn btn-info">Try to Allot </a></center>
        </div>';
	}
	if (empty($return)) {
		$return="<div class='alert alert-info alert-dismissible col-md-12 text-center'>No Drivers Found!!</div>";
	}
	return $return;
	}
	public function get_vechichal_location($value)
{
$query=$this->db->get_where('tbl_vehicle_master',array('id'=>$value->id));
return $query->row();
}
public function get_rides()
{
	return $this->db->query("SELECT *,a.id as rid FROM `tbl_ride_master` as a JOIN tbl_customer_master AS b ON a.cid=b.id JOIN tbl_vehicle_cat_master as c on c.subcategory=a.subcat WHERE a.cstatus!='cancel' AND a.vid is null")->result();
}
	public function markasonlinepayment($payid,$id)
	{
	$update=array('payid'=>$payid,'paystatus'=>'sended');
	$this->db->where('id',$id);
	$this->db->update('tbl_agentpay_master',$update);
	$query=$this->db->get_where('tbl_agentpay_master',array('id'=>$id));
	return $query->row();
	}
	public function get_payments_agent($id)
	{
	$query="SELECT *,a.id as paymentid FROM tbl_agentpay_master as a JOIN tbl_ride_master as b JOIN tbl_vehicle_master as v  ON a.rid=b.id AND b.vid=v.id WHERE a.aid='".$id."' order by paystatus";
	return $this->db->query($query)->result();
	}
	function markassend($txnid,$id,$aid,$amount)
	{
		$return=false;
	$update=array('pid'=>$txnid,'status'=>'success');
	$this->db->where('id',$id);
	if ($this->db->update("tbl_wallet_txn_master_agent",$update)) 
	{
	$return=true;
	}
	return $return;
	}
	public function getpaid_payments()
	{
$query="SELECT *,a.id as payid,a.con as pcon,a.aid as agentid FROM tbl_wallet_txn_master_agent as a JOIN tbl_agent_master as b ON a.aid=b.id WHERE a.pid is not null order by a.con";
	return $this->db->query($query)->result();
	}
	public function get_payments()
	{
$query="SELECT *,a.id as payid,a.con as pcon,a.aid as agentid FROM tbl_wallet_txn_master_agent as a JOIN tbl_agent_master as b ON a.aid=b.id WHERE a.pid is null AND a.txntype='req' order by a.con";
	return $this->db->query($query)->result();
	}
	public function get_customer()
	{
	$query=$this->db->get("tbl_customer_master");
	return $query->result();
	}
	public function get_bookings()
	{
	$query="SELECT *,c.name as cname,c.mobile as cmobile,c.email as cemail FROM tbl_ride_master as r JOIN tbl_vehicle_master as v JOIN tbl_customer_master as c JOIN tbl_agent_master as a ON r.cid=c.id AND r.vid=v.id AND v.aid=a.id";
return	$res=$this->db->query($query)->result();
//	print_r($res);
	}
	public function add_coupan($coupan)
	{
		$this->db->insert('tbl_coupon_master',$coupan);
	}
	public function status_coupan($id,$stat)
	{
$update = array('status' => $stat);
$this->db->where('id', base64_decode($id));
$this->db->update('tbl_coupon_master', $update);
	}
	public function edit_coupan($id,$name,$description,$discount,$type)
	{
$update = array('name' => $name,'description'=>$description,'discount'=>$discount,'type'=>$type);
$this->db->where('id', $id);
$this->db->update('tbl_coupon_master', $update);
	}
	public function get_coupans()
	{
		$query=$this->db->get('tbl_coupon_master');
		return $query->result();
	}
	public function getphoto()
	{
		$query=$this->db->get('manage_gallery');
		return $query->result();

	}
	public function save_image($data)
	{
		$this->db->insert('manage_gallery',$data);
		return true;
	}
	public function getcar()
	{
		$query=$this->db->get('tbl_vehicle_master');
		return $query->result();
	}
	public function getagetns()
	{
		$query=$this->db->get('tbl_agent_master');
		return $query->result();
	}
	public function updateadminpassword($value)
	{
	$return = array('status' => false,'message'=>"" );
	$query=$this->db->get_where('tbl_admin_master',array('id'=>$this->session->userdata("admin")->id));
	$admin=$query->row_array();	
	if ($admin['password']==md5($value->old)) {
$update = array('password' => md5($value->new));
$this->db->where('id', $this->session->userdata("admin")->id);
if ($this->db->update('tbl_admin_master', $update)) {
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
	public function updateadmin($admin)
	{
		$return = array('status' => false,'message'=>"" );
		if (!empty($admin->file)) {
		$img=$admin->file;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/images/admin/'.$fname;
		if (file_put_contents($fileName, $fileData)) 
		{
$update = array('name' => $admin->name,'mobile'=>$admin->mobile,'image'=>$fname);
$this->db->where('id', $this->session->userdata("admin")->id);
if ($this->db->update('tbl_admin_master', $update)) {
$return['status']=true;
$return['message']="Updated Successfully with Image!!";
}
else
{
	$return['message']="Failed to update database";
}
		}
		else
		{
			$return['message']="failed to upload Image";
		}
		}
		else
		{
$update = array('name' => $admin->name,'mobile'=>$admin->mobile);
$this->db->where('id', $this->session->userdata("admin")->id);
if ($this->db->update('tbl_admin_master', $update)) {
$return['status']=true;
$return['message']="Updated Successfully Without Image!!";
}
else
{
	$return['message']="Failed to update into database.";
}
		}
return $return;
	}
	public function get_admin($email_token,$id)
	{
$query=$this->db->get_where('tbl_admin_master',array('email'=>$email_token,'id'=>$id));
		return $query->row_array();		
	}
public function check_session($email_token,$id)
	{
$query=$this->db->get_where('tbl_admin_master',array('email'=>$email_token,'id'=>$id));
		return $query->row_array();
	}
	function login($var)
	{
	$return = array('status' => false,'message'=>"" );
$query="SELECT * FROM tbl_admin_master WHERE `email`='".$var->username."' OR `mobile`='".$var->username."'";
$res=$this->db->query($query)->row();
if (!empty($res)) 
{
if ($res->password==md5($var->password)) 
{
	$this->session->set_userdata("admin",$res);
//	print_r($this->session->userdata("admin"));
	$return['status']=true;
	$return['message']="login successfull!!";
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
public function save_price($data)
{
	$this->db->insert('tbl_vehicle_cat_master',$data);

}

public function edit_price($data)
{
	$update=array('subcategory'=>$data['subcategory'],'rpkm'=>$data['rpkm'],'dallowence'=>$data['dallowence'],'brockarage'=>$data['brockarage'],'baseprice'=>$data['baseprice'],'ridetype'=>$data['ridetype']);
	$this->db->where('id',$data['id']);
	$this->db->update('tbl_vehicle_cat_master',$update);
	
}
public function get_price()
	{
		$query=$this->db->get('tbl_vehicle_cat_master');
		return $query->result();
	}
public function get_agent($id)
{
		$this->db->where('id', $id);
	return $this->db->get('tbl_agent_master')->result();	
}
public function get_agentdetails($agent_id)
	{
		$this->db->where('aid', $agent_id);
	return $this->db->get('tbl_vehicle_master')->result();	

		
	}
	public function updateadminstat($value)
	{
		$res=array('status'=>true,'message'=>'successfully updated');
		if ($value->action=="block") {
		$update=array('status'=>'0','vby'=>$this->session->userdata('admin')->email);
		$res['message']="Blocked Successflly!!";
		}
		else if ($value->action="unblock") {
		$update=array('status'=>'1','vby'=>$this->session->userdata('admin')->email);
		$res['message']="UN-Blocked Successflly!!";
		}
		else if($value->action="verify")
		{
		$update=array('status'=>'1','vby'=>$this->session->userdata('admin')->email);
		$res['message']="Verified Successflly!!";
		}
		$this->db->where('id',base64_decode($value->id));
		if (!$this->db->update('tbl_agent_master',$update)) {
		$res['status']=false;
		$res['message']="Failed to update";
		}
		return $res;
	}
	function vh_update_status_mo($var)
	{
		$this->db->set('status',$var->action);
		$this->db->where('id',$var->id);
		$this->db->update('tbl_vehicle_master');
		return true;

	}
	public function edit_brockrage($id,$brokrage)
	{
	$update=array('brokrage'=>$brokrage);
	$this->db->where('id',$id);
	$this->db->update('tbl_agent_master',$update);
	}
	function deleteagent_vh($var)
	{
		$this->db->where('id',$var->id);
		$this->db->delete('tbl_vehicle_master');
		return true;
	}
	function getdash()
	{
		$dat['total_agent']=$this->db->count_all_results('tbl_agent_master');
		// $this->db->count_all_results('tbl_agent_master');
		$dat['total_vehicles']=$this->db->count_all_results('tbl_vehicle_master');
		$dat['total_booling']=$this->db->count_all_results('tbl_ride_master');
		return $dat;
	}
	function delete_manage_gallery($data)
	{
		$this->db->delete('manage_gallery', array('id' => $data->id));
		return true;
	}
}
