<?php 
	include "..\config.php";
	
?>
 <?php
 
 if(!isset($_SESSION["user_id"])){
	
	header("location:".$SITE_URL."index.php");
	exit;

}

$result = mysqli_query($con, "Select * from user where user_id=".$_SESSION["user_id"]);
	$row = mysqli_fetch_assoc($result);
$user_role=$row["role"];


?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $SITE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $SITE_URL; ?>teacher/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $SITE_URL; ?>student/css/style.css">
</head>
<body>

	<div class="container main_wrap">
		
		<div class="header">
		  
			<nav class="navbar navbar-default">
			  <div class="container-fluid myheader">
			    <div class="navbar-header pull-left">
			      <a class="navbar-brand" href="proj_info.php">CollegeConnect</a>
			    </div>
			    <ul class="nav navbar-nav pull-right">
			      <li><a href='<?php echo $SITE_URL."".$user_role."/"; ?>home.php'>Home</a></li>
			      <li><a href='#'> Profile</a></li>
			      <li><a href='<?php echo $SITE_URL."".$user_role."/"; ?>messages.php'>Messages</a></li>
			      <li><a href='#'>Settings</a></li>
			      <li><a href="<?php echo $SITE_URL; ?>logout.php">LogOut</a></li>
			    </ul>
			  </div>
			</nav>
		  	
		</div>	