<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model('admin/adminmodel');
		$this->load->library('upload');
		$email=$this->session->userdata('admin')->email;
		$id=$this->session->userdata("admin")->id;
		if ($email==null||$id==null) {
			echo "<script>alert('Access Denied!!');</script>";
			redirect("welcome/admlogout");
		}
		else
		{
			$res=$this->adminmodel->check_session($email,$id);
			if ($res["email"]==$email) {
				//do nothing session is right
			}
			else
			{
			redirect("welcome/admlogout");
			}
		}
	}
	public function ridetxn()
	{
	$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
	$this->load->view('admin/public/h1_header.php');
	$this->load->view('admin/public/h1_sidebar.php');
	$this->load->view('admin/public/h1_topnavbar.php',$data);
	$data['earnings']=$this->adminmodel->getearningride(date("Y-m-d"));
	$this->load->view("admin/ridetxn/ridetxn",$data);
	$this->load->view('admin/public/h1_footer.php');
	}
	public function wallettxn()
	{
	$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
	$this->load->view('admin/public/h1_header.php');
	$this->load->view('admin/public/h1_sidebar.php');
	$this->load->view('admin/public/h1_topnavbar.php',$data);
	$data['earnings']=$this->adminmodel->getearningtxn(date("Y-m-d"));
	//$data['earnings']="";
	$this->load->view("admin/wallettxn/wallettxn",$data);
	$this->load->view('admin/public/h1_footer.php');
	}
	public function ridetxnajax()
	{
		$form_data = json_decode(file_get_contents("php://input"));
	$date=$form_data->date;
	$month=$form_data->month;
	$year=$form_data->year;
//	echo $year."-".$month."-".$date;
//die;
	$rdate=date("Y-m-d",strtotime($year."-".$month."-".$date));
echo	$this->adminmodel->getearningride($year."-".$month."-".$date);
	}
	public function wallettxnajax()
	{
			$form_data = json_decode(file_get_contents("php://input"));
	$date=$form_data->date;
	$month=$form_data->month;
	$year=$form_data->year;
//	echo $year."-".$month."-".$date;
//die;
	$rdate=date("Y-m-d",strtotime($year."-".$month."-".$date));
echo	$this->adminmodel->getearningtxn($year."-".$month."-".$date);
	}
	public function alotdrivers()
	{
	$rid=base64_decode($_GET['rid']);
	$did=base64_decode($_GET['did']);
	if (!empty($rid)&&!empty($did)) {
	if ($this->adminmodel->alot_driver($rid,$did)) 
	{
		echo "<script>alert('Driver Alloted!!');window.location.href='".base_url()."admin/rides';</script>";
	}
	else
	{
		echo "<script>alert('Failed to ALOT!!');window.location.href='".base_url()."admin/rides';</script>";
	}
	}
	}
	public function search_drivers()
	{
	if (!empty($this->input->post("r_id"))&&!empty($this->input->post("search"))) {
		echo json_encode($this->adminmodel->get_drivers($this->input->post("r_id"),$this->input->post("search")));
	}
	}
	public function rides()
	{
	$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
	$this->load->view('admin/public/h1_header.php');
	$this->load->view('admin/public/h1_sidebar.php');
	$this->load->view('admin/public/h1_topnavbar.php',$data);
	$data['rides']=$this->adminmodel->get_rides();
	$this->load->view("admin/rides/index",$data);
	$this->load->view('admin/public/h1_footer.php');
	}
	public function admmarkaspaid()
	{
		$return=array('status'=>false,'message'=>"Initial!!");
	$form_data = json_decode(file_get_contents("php://input"));
	if (!empty($form_data)) {
	$res=$this->adminmodel->markasonlinepayment("CASH",$form_data->id);
	$return['status']=true;
	$return['message']="Added Successfully!!!";
	}
	print_r(json_encode($return));
	}
	public function mark_paymentbyonline()
	{
	if (!empty($this->input->post("payid"))&&!empty($this->input->post("id"))) {
	$res=$this->adminmodel->markasonlinepayment($this->input->post("payid"),$this->input->post("id"));
	$this->session->set_flashdata("paymentmsg","Payment Accepted!!");
	redirect(base_url()."admin/paymentsofagent?id=".base64_encode($res->aid));
	}
	else
	{
		redirect(base_url());
	}
	}
	public function paymentsofagent()
	{
		if (!empty($this->input->get("id"))) {
		$id=base64_decode($this->input->get("id"));
			$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$data['payments']=$this->adminmodel->get_payments_agent($id);
		$data['agent']=$this->adminmodel->get_agent($id);
		$this->load->view("admin/paymentsagent/payment",$data);
		$this->load->view('admin/public/h1_footer.php');

	
		}
		else
		{
		redirect(base_url());
		}
	}
	function acceptpayment()
	{
$id=$this->input->post("payid");
$txnid=$this->input->post("txnid");
$aid=$this->input->post('aid');
$amount=$this->input->post('amount');
if ($this->adminmodel->markassend($txnid,$id,$aid,$amount)) 
	{
	echo "<script>alert('Payment Accepted Successfully!!');window.location='".base_url()."admin/Payments/';</script>";
	}
	else
	{
	echo "<script>alert('Failed to Accept!!');window.location='".base_url()."admin/Payments/';</script>";
	}
	}
	public function Payments()
	{
	$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$data['payments']=$this->adminmodel->get_payments();
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/payments/payment",$data);
		$this->load->view('admin/public/h1_footer.php');
	}
	function PaymentsPaid()
	{
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$data['payments']=$this->adminmodel->getpaid_payments();
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/payments/paid",$data);
		$this->load->view('admin/public/h1_footer.php');	
	}
	public function Customers()
	{
	$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$data['customer']=$this->adminmodel->get_customer();
		$this->load->view("admin/customers/customers",$data);
		$this->load->view('admin/public/h1_footer.php');

	}
	public function Customer_booking()
	{
	$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$data['rides']=$this->adminmodel->get_bookings();
		$this->load->view("admin/bookings/index",$data);
		$this->load->view('admin/public/h1_footer.php');
	}
	public function deactivate_coupan()
	{
	if (!empty($_GET['id'])) {
	 $id=$_GET['id'];
	$this->adminmodel->status_coupan($id,"0");
		redirect("admin/coupans");
	}
				else
			{
				redirect("admin");
			}
	}
	public function activate_coupan()
	{
	if (!empty($_GET['id'])) {
	$id=$_GET['id'];
	$this->adminmodel->status_coupan($id,"1");
		redirect("admin/coupans");
	}
				else
			{
				redirect("admin");
			}
	}
	public function add_coupan()
	{
		if (!empty($this->input->post("sub"))) {
		$name=$this->input->post("name");
		$description=$this->input->post("description");
		$discount=$this->input->post("discount");
		$type=$this->input->post("type");
		$coupan = array('name' => $name,'description' => $description,'discount' => $discount,'type' => $type );
		$this->adminmodel->add_coupan($coupan);
		redirect("admin/coupans");
			}
			else
			{
				redirect("admin");
			}
	}
	public function edit_coupan()
	{
		if (!empty($this->input->post("sub"))) {
		$id=$this->input->post("id");
		$name=$this->input->post("name");
		$description=$this->input->post("description");
		$discount=$this->input->post("discount");
		$type=$this->input->post("type");
		$this->adminmodel->edit_coupan($id,$name,$description,$discount,$type);
		redirect("admin/coupans");
			}
			else
			{
				redirect("admin");
			}
	}
	public function view_location()
	{
				$form_data = json_decode(file_get_contents("php://input"));
if (!empty($form_data)) {
	print_r(json_encode($this->adminmodel->get_vechichal_location($form_data)));
}
	}
	public function coupans()
	{	
		$data['coupans']=$this->adminmodel->get_coupans();
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/coupan/index",$data);
		$this->load->view('admin/public/h1_footer.php');
	}
	public function manage_car()
	{
		$data['agents_details']=$this->adminmodel->getcar();
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/vehicles/index",$data);
		$this->load->view('admin/public/h1_footer.php');
	}

	public function manage_Price()
	{
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
        $data['price']= $this->adminmodel->get_price();        
   		$this->load->view("admin/manage_Price/index",$data);
		$this->load->view('admin/public/h1_footer.php');

	}
	public function save_price()
	{
		$data=array(
			'subcategory'=>$this->input->post('vcat'),
			'rpkm'=>$this->input->post('rpkm'),
			'dallowence'=>$this->input->post('d_allowance'),
			'brockarage'=>$this->input->post('booking_fee'),
			'baseprice'=>$this->input->post('base_price'),
			'ridetype'=>$this->input->post('rtype')

		);
		$save=$this->adminmodel->save_price($data);
		$this->session->set_flashdata('Msg','Price Added Successfully');
		redirect('Admin/manage_Price');
		
		
		
	}
	public function edit_price()
	{
		$data=array(
			'id'=>$this->input->post('id'),
			'subcategory'=>$this->input->post('vcat'),
			'rpkm'=>$this->input->post('rpkm'),
			'dallowence'=>$this->input->post('d_allowance'),
			'brockarage'=>$this->input->post('booking_fee'),
			'baseprice'=>$this->input->post('base_price'),
			'ridetype'=>$this->input->post('rtype')

		);
		$this->adminmodel->edit_price($data);
		$this->session->set_flashdata('Msg','Details Updated Successfully');
	    	redirect('Admin/manage_Price');
	}

	public function manage_Gallery()
	{
		$data['gallery_photos']=$this->adminmodel->getphoto();
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/Gallery/index",$data);
		$this->load->view('admin/public/h1_footer.php');

	}
	public function save_gallery()
	{
		$data = array(); 
        $errorUploadType = $statusMsg = ''; 

        // If file upload form submitted 
        if($this->input->post('submit'))
        { 
        	 $config = array();
    $config['upload_path'] = './app-assets/images/gallery/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

        	$files = $_FILES;
            // If files are selected to upload 
    	 $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

        $this->upload->initialize($config);
        $this->upload->do_upload();
        $dataInfo[] = $this->upload->data();
        $data=array(
        	'file_name'=>$dataInfo[0]['file_name']

        );
     $result_set = $this->adminmodel->save_image($data);
    }
    if($result_set)
    {
    	$this->session->set_flashdata('Msg','Photo Uploaded SuccessFully');

    }
    else
    {
    	$this->session->set_flashdata('Msg','Failed to Upload Photo');

    }

        }

        redirect('Manage-Gallery'); 
         
       
		
	}
	public function verifyagent()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$res=$this->adminmodel->updateadminstat($form_data);
		print_r(json_encode($res));
	}
	public function vh_update_status()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$res=$this->adminmodel->vh_update_status_mo($form_data);
		print_r(json_encode($res));
	}
	public function rejectagent_vh()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$res=$this->adminmodel->deleteagent_vh($form_data);
		print_r(json_encode($res));
	}
	public function edit_agent_brockarage()
	{
	if ($this->input->post('sub')) {
	$this->adminmodel->edit_brockrage($this->input->post('id'),$this->input->post('brokrage'));
	$this->session->set_flashdata('brockrage_updated',"Brockrage Updated Successfully!!");
	redirect(base_url()."admin/agents");
	}
	else
	{
		redirect(base_url());
	}
	}
	public function agents()
	{

$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
   $data['agents']= $this->adminmodel->getagetns();        
   		$this->load->view("admin/agents/index",$data);
		$this->load->view('admin/public/h1_footer.php');
	}
	public function edit_password()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		if (!empty($form_data)) 
		{
      $res=$this->adminmodel->updateadminpassword($form_data);
       print_r(json_encode($res));
		}
		else
		{
         $data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);

		
		 $this->load->view('admin/public/h1_header.php');
		
		$this->load->view('admin/public/h1_sidebar.php');
		 $this->load->view('admin/public/h1_topnavbar.php',$data);
		 $this->load->view("admin/update_password/index",$data);
		$this->load->view('admin/public/h1_footer.php');
		}
	}
	public function edit_profile()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		if (!empty($form_data)) 
		{
$res=$this->adminmodel->updateadmin($form_data);
print_r(json_encode($res));
		}
		else
		{
$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
         $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/edit_profile/index",$data);
		$this->load->view('admin/public/h1_footer.php');
		
		}
	}
	public function index()
	{
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$data['dash_data']=$this->adminmodel->getdash();
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view('admin/dashboard/index',$data);
		$this->load->view('admin/public/h1_footer.php');


		
	}
	public function agentmore()
	{
		$agent_id=base64_decode($_GET['id']);
		$this->session->set_userdata("agent_id",$_GET['id']);
		$data['agents_details']=$this->adminmodel->get_agentdetails($agent_id);
		$data['adm']=$this->adminmodel->get_admin($this->session->userdata("admin")->email,$this->session->userdata("admin")->id);
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h1_sidebar.php');
		$this->load->view('admin/public/h1_topnavbar.php',$data);
		$this->load->view("admin/agents/agent_details");
		$this->load->view('admin/public/h1_footer.php');


		
	}
	public function delete_manage_gallery()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$res=$this->adminmodel->delete_manage_gallery($form_data);
		print_r(json_encode($res));
	}
}
