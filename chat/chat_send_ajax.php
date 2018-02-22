<?php

     require_once('dbconnect.php');


     $link =db_connect();
     $sender = $_POST["sender"];
     $receiver = $_POST["receiver"];

     $msg = $_POST["message"];
     
    // $sender = 1;
    // $receiver= 2;
$msg=mysqli_real_escape_string($link,$msg);
    

    //$msg = str_replace("\n", char(13), $msg);
    $sql="insert into messages set sender=$sender, receiver = $receiver, message= '$msg'";
          echo  $sql;
     
     $result = mysqli_query($link,$sql);
     if(!$result)
     {
        throw new Exception('Query failed:' . mysqli_error());
        exit();
     }

?>





