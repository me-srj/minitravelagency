<?php
// {"return":true,"data":[{"template_id":34747,"message":"Mini Travel Agency OTP verification is {#BB#}"},{"template_id":37261,"message":"Welcome to minitravelagency, your OTP for registration is:{#BB#}."},{"template_id":37262,"message":"Welcome to minitravelagency, your OTP to reset password is: {#BB#}."},{"template_id":37263,"message":"Welcome back to minitravelagency, your OTP to login is: {#BB#}."}]}
class Sms_class
{
public	function login_otp_newc($otp,$number)
	{
$ch=curl_init('https://www.fast2sms.com/dev/bulk?authorization=m3LflFyarzRs06BE1Koj5DAuGOQYMCp4PkXbhnI7VSWgTUtJNqPLSGmhv75c4zynoQEkR8Nb326Dj9WF&sender_id=FSTSMS&language=english&route=qt&numbers='.$number.'&message=37263&variables={BB}&variables_values='.$otp.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
	}
public	function login_otp_newo($otp,$number)
	{
$ch=curl_init('https://www.fast2sms.com/dev/bulk?authorization=m3LflFyarzRs06BE1Koj5DAuGOQYMCp4PkXbhnI7VSWgTUtJNqPLSGmhv75c4zynoQEkR8Nb326Dj9WF&sender_id=FSTSMS&language=english&route=qt&numbers='.$number.'&message=37261&variables={BB}&variables_values='.$otp.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
	}
public	function reset_password($otp,$number)
	{
$ch=curl_init('https://www.fast2sms.com/dev/bulk?authorization=m3LflFyarzRs06BE1Koj5DAuGOQYMCp4PkXbhnI7VSWgTUtJNqPLSGmhv75c4zynoQEkR8Nb326Dj9WF&sender_id=FSTSMS&language=english&route=qt&numbers='.$number.'&message=37262&variables={BB}&variables_values='.$otp.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    }
public	function pilot_sms($number,$pname,$vnumber)
	{
$ch=curl_init('https://www.fast2sms.com/dev/bulk?authorization=m3LflFyarzRs06BE1Koj5DAuGOQYMCp4PkXbhnI7VSWgTUtJNqPLSGmhv75c4zynoQEkR8Nb326Dj9WF&sender_id=FSTSMS&language=english&route=qt&numbers='.$number.'&message=37592&variables={FF}|{DD}&variables_values='.$pname.'|'.$vnumber.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    }
}
?>