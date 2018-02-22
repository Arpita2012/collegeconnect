
<link rel="stylesheet" type="text/css" href="css/chat_style.css">
<?php

     require_once('dbconnect.php');

     $link = db_connect();
    $sender = $_POST["sender"];
     $receiver= $_POST["receiver"];
     
     $q1 = "select * from messages where ( sender= $sender and receiver = $receiver ) or(sender= $receiver and receiver = $sender) order by datetime asc";
     $result1 = mysqli_query($link, $q1) ;
     function replace($msg){
                $msg = str_replace("\n", "<br>", $msg);
                return $msg;
                }



     // Update Row Information
     $msg="<div class='msg_list' >";
     while ($row_msg = mysqli_fetch_assoc($result1))
     {

        if($row_msg["sender"]==$sender)
     // get name of sender
            { $q2="select name from user where user_id=".$sender;

               $result2= mysqli_query($link, $q2);
               $sender_row=mysqli_fetch_assoc($result2);

                $msg = $msg  . 
                "<div class='sender_msg pull-right'>" . 
                "<div class='sender pull-right'>~" . $sender_row["name"] . "</div>"
                ."<div class='sender_msg_content pull-left'><div class='message'>" . replace($row_msg["message"]) . "</div> <div class='msg_date pull-right'>".$row_msg["datetime"] . "&nbsp;</div></div></div>";
                
             }
        else {
                $q2="select name from user where user_id=".$receiver;

                $result2= mysqli_query($link, $q2);
                $sender_row=mysqli_fetch_assoc($result2);


                $msg = $msg  . 
                "<div class='sender_msg pull-left'>" . 
                "<div class='sender pull-left'>" . $sender_row["name"] . "~</div>"
                ."<div class='receiver_msg_content pull-right'><div class='message'>" . replace($row_msg["message"]) . "</div> <div class='msg_date pull-right'>".$row_msg["datetime"] . "&nbsp;</div></div></div>";
/*
                 $msg = $msg  . 
                "<div class='receiver_msg pull-left'>" . 
                "<div class='sender'>" . $sender_row["name"] . ":&nbsp;</div>"
                ."<div class='message'>" . replace($row_msg["message"]) . "</div> <div class='msg_date'>".$row_msg["datetime"] . "&nbsp;</div></div>";
             */   

                
             }     

     }
     $msg=$msg . "</div>";
     
     echo $msg;

?>





