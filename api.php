<?php

session_start();
if (isset($_POST["items"])) {
	
 if (empty($_POST['items'])){ 
 
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
 header("location: cart.php"); // Redirecting to second page. 
 } else {
 // Fetching all values posted from second page and storing it in variable.
 foreach ($_POST as $key => $value) {
	 
                                     $_SESSION['post'][$key] = $value;
 }
 }
}
extract($_SESSION['post']);

$add=$_POST['name'];
$qw=$_POST['email'];
$we=$_POST['address'];
$er=$_POST['landmark'];
$rt=$_POST['mobile'];
$pp=$_POST['items'];
$oo=$_POST['qtyy'];
$tt=$_POST['price'];
$ee=$_POST['sub'];


$url="https://marketing.intractly.com/api/send.php?number=916283197830&type=text&message=Name=[$add]%20%20Email=[$we]%20%20Address=[$qw]%20%20Landmark=[$er]%20%20Mobile=[$rt]Item-name=[$pp]%20%20Quantity=[$oo]%20%20Price=[$tt]%20Subtotal=[$ee]%20%20&instance_id=63FC589775833&access_token=dee59b30aa3edd38c357c695bb200d5a";
//$url="https://marketing.intractly.com/api/send.php?number=916283197830&type=text&message=Name=[$dd]%20%20Email=[$kk]%20%20Address=[$ji]%20%20Pincode=[$nn]%20%20State=[$st]%20%20City=[$ad]%20%20Mobile=[$mb]%20%20Item-name=[$pp]%20%20Quantity=[$oo]%20%20Subtotal=[$rr]%20GST=[$ee]%20%20Final-Bill=[$tt]&instance_id=63FC586C7D48C&access_token=dee59b30aa3edd38c357c695bb200d5a";
$params=array(
'token' => ' dee59b30aa3edd38c357c695bb200d5a',
'to' => '+916283197830',
'body' => ' ',
'priority' => '',
'preview_url' => '',
'message_id' => ''
);

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
header('location:userinfo1.php');

?>