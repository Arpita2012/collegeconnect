<?php

     require_once('dbconnect.php');

     $link = db_connect();
    $sender = $_GET["sender"];
     $receiver= $_GET["receiver"];

     $qry="delete from messages where ( sender= $sender and receiver = $receiver ) or ( sender= $receiver and receiver = $sender) ";
     echo $qry;
     
     mysqli_query($link,$qry);
    
    header("location:start_chat.php?sender=$sender&receiver=$receiver&deleted=1");
     ?>
