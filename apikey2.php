<?php
$dhaniya="jai ho prabhu";

$params=array(
'token' => '8fIjM0q8p0SYgHlDBPXZFw',
'to' => '+918968081681',
'body' => 'dhaniya jai ho',
'priority' => '',
'preview_url' => '',
'message_id' => ''
);


$msg=(rand(1000,10000));
$nm=$_POST['msg'];


$url="http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?APIKey=8fIjM0q8p0SYgHlDBPXZFw&msisdn=$nm&sid=AREPLY&msg=YourOneTimePasswordis$msg.ThanksSMSINDIAHUB&fl=0&gwid=2";
$curl = curl_init($url);
curl_setopt_array($curl, array(
 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => http_build_query($params),
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

header('location:verification.php');
?>