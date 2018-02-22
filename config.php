<?php 

session_start();

$SITE_URL = "http://localhost/collegeconnect/";

$con = mysqli_connect("localhost" , "root" , "", "collegeconnect");

if(!$con) {
	die("cant connet to database");
}