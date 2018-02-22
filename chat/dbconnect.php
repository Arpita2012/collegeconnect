

<?php


function db_connect()
{

  date_default_timezone_set("Asia/Calcutta");

  $link = mysqli_connect("localhost", "root", "","collegeconnect");
       
  return $link;
}

?>
