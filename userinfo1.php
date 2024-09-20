

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

$con=mysqli_connect('localhost','root');
if($con){
	echo "connection successful";
}
else{
	echo "not connected";
}
mysqli_select_db($con,'shopping_cart');
//$name = $_POST['name'];
//$email= $_POST['email'];
//$address = $_POST['address'];


//$landmark = $_POST['landmark'];
//$mobile = $_POST['mobile'];
//$items=$_POST['items'];
//$qty=$_POST['qtyy'];
//price=$_POST['price'];
//$subtotal=$_POST['sub'];





$query = "insert into order2(name,email,address,landmark,mobile,items,qty,price,subtotal)
				values('$name','$email','$address','$landmark','$mobile','$items','$qtyy','$price','$sub')";

mysqli_query($con, $query);

//echo " ".$total_price1;
header('location:thanks.php');
?>  

