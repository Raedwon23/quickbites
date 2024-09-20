<?php
$con=mysqli_connect('localhost','root');
if($con){
	echo "connection successful";
}
else{
	echo "not connected";
}
mysqli_select_db($con,'shopping_cart');
$username = $_POST['username'];
$password = $_POST['password'];


$query = "insert into login (username,password)
values('$username','$password')";

mysqli_query($con, $query);
header('location:signin.php');
?>  