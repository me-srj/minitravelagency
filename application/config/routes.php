<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//default routes
$route['default_controller'] = 'welcome';
$route['user-welcome'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['About']="welcome/about_us";
$route['Contact']="welcome/contact_us";
$route['Gallery']="welcome/gallery";
$route['Privacy']="welcome/privacy";


//admin routes
$route['acpanel'] = 'welcome/adminlogin';
$route['Manage-Gallery']='admin/manage_Gallery';
$route['save_price']='admin/save_price';
$route['Edit-price']='admin/edit_price';
$route['Inbox']='admin/inbox';


//agents routes

$route['agentlogin'] = 'welcome/agentlogin';
$route['agentregister'] = 'welcome/agentregister';
$route['Payment-Details'] = 'Agent/Payment_Details';
$route['Pilot-Policy'] = 'pilot/pilot_privacy';
$route['forgot-password']='welcome/forgot_agent_password';











// customer routes
$route['find-car'] = 'user/find_car';
$route['Book-Car'] = 'payment';
$route['customer-profile'] = 'user/profile';
$route['user-logout'] = 'welcome/user_logout';
$route['customer-Login'] = 'welcome/user_login';
$route['Send-otp'] = 'user/send_otp';
$route['Booking-Cab'] = 'user/booking_cab';
$route['my-rides']="user/myrides";
$route['my-ride']="user/myride";
$route['Wallet']="user/walletview";
$route['user-transaction']="user/user_transaction_view";
$route['notification']="user/user_notification";
$route['user-profile']="user/user_profile_view";
$route['notification-details']="user/notification_details";
//pilot routes
$route['pilot-login']="welcome/pilotlogin";

$route['vehicle-status']='agent/view_vehicle_status';


//pilot routes
$route['pilot-login']="welcome/pilotlogin";

$route['vehicle-status']='agent/view_vehicle_status';



/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/