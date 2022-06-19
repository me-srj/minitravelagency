<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('admin/adminmodel');
		//agent//
		 $this->load->model('agent/registrationmodel');
		 $this->load->model('agent/loginmodel');
		 $this->load->model("user/usermodel");
		 $this->load->model("Common");
		 //agent//
 
		 //pilot//
$this->load->model("pilot/pilotmodel");
		 //pilot//
if (!is_null(get_cookie('cookie')) && !is_null(get_cookie('cookie_pass'))) 
	{
 $logincookie=get_cookie('cookie');
 $logincookiepass=get_cookie("cookie_pass");
 if ($this->usermodel->check_cookies($logincookie,$logincookiepass)) 
 {
 	//redirect("customer-login");
 }
}
	}
	
	public function userandroidlogin()
{
if ($_SERVER['REQUEST_METHOD']=='GET') {
$username=$_GET['username'];
$FMC=$_GET['FMC'];
$password=$_GET['Password'];
$this->Common->androiduserlogin($username,$FMC,$password);
}
}
	
		public function androidsendotp()
	{
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
			$name=$this->input->post("username");
  echo json_encode($this->Common->send_reset_otpandroid($name));
}
else
{
	echo "Un-able to get input!!";
}
	}
	public function sendotp()
	{
		$form_data = json_decode(file_get_contents("php://input"));
if (!empty($form_data)) 
{
 echo $this->Common->send_reset_otp($form_data);
}
else
{
	echo "Un-able to get input!!";
}
	}
	public function user_login()
	{		
		if (!empty($this->session->userdata('customer'))) 
		{
		redirect(base_url());
		}
		$data['car_id']=null;
if (empty($this->session->userdata('car_id'))) {
	 $data['car_id']=null;
}
else
{
 $data['car_id']=$this->session->userdata('car_id');
}

	     $this->load->view('user_login.php',$data);
		
	}
	public function user_logout()
	{
	$this->session->unset_userdata('customer');
		$this->session->unset_userdata('car_id');
			delete_cookie('cookie');
		delete_cookie('cookie_pass');
		redirect("user-welcome");
	}
	public function pilotlogin()
	{	
	if (!is_null(get_cookie('logincookie')) && !is_null(get_cookie('logincookiepass'))) 
	{
 $logincookie=get_cookie('logincookie');
 $logincookiepass=get_cookie("logincookiepass");
 if ($this->pilotmodel->check_cookies($logincookie,$logincookiepass)) {
 	redirect("pilot");
 }
}
		$form_data = json_decode(file_get_contents("php://input"));
		if (!empty($form_data)) 
		{
$res=$this->pilotmodel->login($form_data);
print_r(json_encode($res));
		}
		else
		{
$this->load->view("pilotlogin.php");
		}
	}
		public function privacy()
{
    $data['script']='';
		$this->load->view('Home/h1_header.php',$data);
		$this->load->view('Home/h1_navbar.php');
	$this->load->view("user/privacy/privacy-policy");
		$this->load->view('Home/h1_footer.php');
}

	public function contact_us()
{
	if (!empty($this->input->post("name"))) {
$name=$this->input->post('name');
$email=$this->input->post('email');
$subject=$this->input->post('subject');
$mobile=$this->input->post('mobile');
$msg=$this->input->post('msg');
	$message="I'm ".$name."(".$email."),[".$mobile."]"." ".$msg;
	mail("care@minitravelagency.com",$subject,$message);
redirect(base_url()."Contact-US");
	}
		$this->load->view('Home/h1_header.php');
		$this->load->view('Home/h1_navbar.php');
	$this->load->view("user/contact/contact");
		$this->load->view('Home/h1_footer.php');

}

		public function about_us()
{
    $data['script']='';
		$this->load->view('Home/h1_header.php',$data);
		$this->load->view('Home/h1_navbar.php');
	    $this->load->view("user/about/about");
		$this->load->view('Home/h1_footer.php');
}
	public function index()
	{
	    if(!empty($this->session->userdata('customer'))){
	        $data['script']='var firebaseConfig = {
    apiKey: "AIzaSyCK_BJ4lmmqOQdyow3krynQSjHs67FbIuE",
    authDomain: "test-f1857.firebaseapp.com",
    databaseURL: "https://test-f1857-default-rtdb.firebaseio.com",
    projectId: "test-f1857",
    storageBucket: "test-f1857.appspot.com",
    messagingSenderId: "1054012487170",
    appId: "1:1054012487170:web:3b27245c81992785aa591b"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
// Retrieve Firebase Messaging object.
 const messaging = firebase.messaging();
messaging.requestPermission().then(function(){
        console.log("Notification permission granted.");

        if(isTokenSentToServer()){
        	console.log("Token Aready Sent");
        }else{
        getRegisterToken();
    }
      }).catch(function(err){

        console.log("Unable to get permission to notify.");
      });

function getRegisterToken(){
	// Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
messaging.getToken({vapidKey: "BFz9V9xqGk_IKJWMDjpdTxOHm4lx_zI00zQcW3H2KuZVSPtp7Lc_tgZZ0ZLSHZuwGsBgAricUqK3b_0Q4Y-oi9Q"}).then(function(currentToken){
	saveToken(currentToken);
	console.log(currentToken);
  if (currentToken) {
    sendTokenToServer(currentToken);
    //updateUIForPushEnabled(currentToken);
  } else {
    // Show permission request.
    console.log("No registration token available. Request permission to generate one.");
    // Show permission UI.
    //updateUIForPushPermissionRequired();
    setTokenSentToServer(false);
  }
}).catch((err) => {
  console.log("An error occurred while retrieving token. ", err);
  //showToken("Error retrieving registration token. ", err);
  setTokenSentToServer(false);
});
}
function setTokenSentToServer(sent) {
    window.localStorage.setItem("sentToServer", sent ? "1" : "0");
  }
function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
      console.log("Sending token to server...");
      // TODO(developer): Send the current token to your server.
      setTokenSentToServer(true);
    } else {
      console.log("Token already sent to server so wont send it again " +
          "unless it changes");
    }

  }
  function isTokenSentToServer() {
    return window.localStorage.getItem("sentToServer") === "1";
  }
  function saveToken(currentToken) {
      $.ajax({
      type: "POST",
      url: "'.base_url().'user/saveWebToken",
      data:{"token":currentToken},
      success: function(resultData) { 
          console.log(resultData); 
    }
      });

  }
  messaging.onMessage(function(payload) {
   console.log("Message received. ", payload);
   var notificationTitle = payload.data.title;
   const notificationOptions = {
       body: payload.data.body,
       icon: payload.data.icon,
       image: payload.data.image,
       click_action: "https://minitravelagency.com/"+ payload.data.url, // To handle notification click when notification is moved to notification tray
       data: {
               click_action: "https://minitravelagency.com/"+ payload.data.url
           }
     };
   var notification = new Notification(notificationTitle,notificationOptions);
  });';
	    }
	$data['coupans']=$this->loginmodel->get_coupans();
		$this->load->view('Home/h1_header.php',$data);
		$this->load->view('Home/h1_navbar.php');
		$this->load->view('Home/h1_content.php',$data);
		$this->load->view('Home/h1_footer.php');
	}
	public function admlogout()
	{
$this->session->unset_userdata('admin');
 redirect("welcome/adminlogin");
	}
	public function adminlogin()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		if (!empty($form_data)) 
		{
$res=$this->adminmodel->login($form_data);
//echo $this->session->userdata('admin')->name;
print_r(json_encode($res));
		}
		else
		{
$this->load->view('adminlogin');
		}
	}
	public function agentregister()
	{
		$this->load->view('agent_register');
	}
	public function agent_register()
	{ 
		  $form_data = json_decode(file_get_contents("php://input"));
 $res2=$this->registrationmodel->register($form_data);
print_r(json_encode($res2));

	}
	
public function androidloginurl()
{
		if($_SERVER['REQUEST_METHOD']=='GET') 
		{
		   $form_data=new stdClass;
		$form_data->username = base64_decode($_GET['email']);
		$form_data->password = base64_decode($_GET['password']);
		$form_data->FMCtoken=$_GET['FMCtoken'];
  $res2=$this->loginmodel->loginthroughapp($form_data);
		}
}
	public function agentlogin()
	{
	$form_data2 = json_decode(file_get_contents("php://input"));
		if (!empty($form_data2)) 
		{
			// print_r($form_data2);
  $res2=$this->loginmodel->login($form_data2);
//echo $this->session->userdata('admin')->name;
print_r(json_encode($res2));
		}
		else
		{
		$this->load->view('agentlogin.php');
		}
	}
	public function agentWeblogin()
	{
	$form_data2 = json_decode(file_get_contents("php://input"));
		if (!empty($form_data2)) 
		{
			// print_r($form_data2);
  $res2=$this->loginmodel->loginWeb($form_data2);
//echo $this->session->userdata('admin')->name;
print_r(json_encode($res2));
		}
		else
		{
		$this->load->view('agentlogin');
		}
	}
		public function androidagentregistration()
	{
		$res2=new stdClass;
	    $res2->status=false;
	    $res2->message="Nothing posted";
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$mobile=$this->input->post("mobile");
		$password=$this->input->post("password");
		print_r(json_encode($this->loginmodel->androidagentregistrationmodel($name,$email,$mobile,$password)));
		}
		else
		{
		 print_r(json_encode($res2));   
		}
	}
	public function androidagentlogin()
	{
	    $res2=new stdClass;
	    $res2->status=false;
	    $res2->message="Nothing posted";
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
		   $form_data=new stdClass;
		  $form_data->username = $_POST['email'];
		  $form_data->password = $_POST['password'];
  $res2=$this->loginmodel->login($form_data);
print_r(json_encode($res2));
		}
		   print_r(json_encode($res2));
	}
	public function gallery()
	{
	    $data['script']='';
		$data['gallery']=$this->registrationmodel->get_photo();
		$this->load->view('Home/h1_header.php',$data);
		$this->load->view('Home/h1_navbar.php');
		$this->load->view('Gallery/gallery',$data);
		$this->load->view('Home/h1_footer.php');
	}
	public function agentlogout()
	{
	   if (!empty($this->session->userdata("pilot")['id'])) {
	$update=array('logincookie'=>NULL,'logincookiepass'=>NULL,'fmctoken'=>NULL);
	$this->db->where('id',$this->session->userdata("pilot")['id']);
	$this->db->update("tbl_vehicle_master",$update); 
		}
		$this->session->unset_userdata('agent');
		$this->session->unset_userdata('pilot');
		redirect("welcome/agentlogin");
	}
	
	public function forgot_agent_password()
	{
		$this->load->view('forgot_agent_password.php');

	}
	public function sendagentotp()
	{
		$form_data = json_decode(file_get_contents("php://input"));
if (!empty($form_data)) 
{
 $res=$this->Common->send_agent_reset_otp($form_data);
 print_r(json_encode($res));
}
else
{
	echo "Un-able to get input!!";
}

	}
	public function check_agent_otp()
{
	$form_data = json_decode(file_get_contents("php://input"));
if (!empty($form_data)) 
{
 $res=$this->Common->check_forgot_password_otp($form_data->otp);
 print_r(json_encode($res));
}
else
{
	echo "Un-able to get input!!";
}
}

public function change_agent_password()
{
	$form_data = json_decode(file_get_contents("php://input"));
	//print_r($form_data);
if (!empty($form_data)) 
{
  $res=$this->Common->change_agent_password($form_data);
 print_r(json_encode($res));
}
else
{
	echo "Un-able to get input!!";
}
}
}
