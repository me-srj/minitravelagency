<?php
class FMC{
    public function notify($key,$utoken,$msg,$data){
	    $server_key=$key;
$token=$utoken;
    $payload=[
            'registration_ids'=>$token,
        $data => $msg
            ];
    $data = json_encode($payload);
//FCM API end-point
$url = 'https://fcm.googleapis.com/fcm/send';
//header with content_type api key
$headers = array(
    'Content-Type:application/json',
    'Authorization:key='.$server_key
);
//CURL request to route notification to FCM connection server (provided by Google)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
// if ($result === FALSE) {
//     // return false;
//      echo 'Oops! FCM Send Error: ' . curl_error($ch);
// }
// else{
//     // return true;
//   echo $result;
// }
curl_close($ch);
	}
}
?>