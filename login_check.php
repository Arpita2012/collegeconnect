 
<?php 
	
	include "config.php";

$name= $_POST["name"];
$password = $_POST["password"];


$result = mysqli_query($con, "Select * from user where name = '$name' and password = '$password'");


//Combination of name and password sholud be unique
$num = mysqli_num_rows($result);

if($num ==1){
	echo "Correct Credentials";
	$row = mysqli_fetch_assoc($result);
	print_r($row);
	//session_start();
	$_SESSION["user_id"]= $row["user_id"];
	$_SESSION["name"]=$row["name"];
	$_SESSION["role"]=$row["role"];
	$role=$row["role"];
	header("location:".$SITE_URL."$role/home.php");
}
else {
	header("location:".$SITE_URL."index.php?Invalid=1");

}