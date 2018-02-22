

<?php

	include "config.php";

	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$query = "insert into user set name = '$name', email='$email',password = '$password'";
	//echo $query;
	mysqli_query($con,$query);
	header("location:index.php?registered=1");

	?>