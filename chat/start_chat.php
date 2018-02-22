<?php

    include_once'dbconnect.php';

     $con =db_connect();
    $sender=$_GET["sender"];
    $receiver = $_GET["receiver"];
//getting details of sender
   $qry_sender = "select * from user where user_id = $sender";
//echo $qry;


$result_sender = mysqli_query($con,$qry_sender);
$num_sender = mysqli_num_rows($result_sender);

if($num_sender ==1){
	
	$sender_row = mysqli_fetch_assoc($result_sender);
	//print_r($row);
	
	$sender_role=$sender_row["role"];
	
}
else {
	echo "ERROR";

}

//getting details of receiver
   $qry_receiver = "select * from user where user_id = $receiver";
//echo $qry;


$result_receiver = mysqli_query($con,$qry_receiver);
$num_receiver = mysqli_num_rows($result_receiver);

if($num_receiver ==1){
	
	$receiver_row = mysqli_fetch_assoc($result_receiver);
	
}
else {
	echo "ERROR";
}



include_once "../$sender_role/header.php";
?>

<div class="content">
 <h2>Welcome!! <br> <?php echo $sender_row["name"]; ?>&nbsp text something  to <?php echo $receiver_row["name"]; ?>!!</h2>

<link rel="stylesheet" type="text/css" href="css/chat_style.css">

<script type="text/javascript" src="js/script.js"></script>

	<div class="row">
    
    <div class ="chatbox col-md-12">

     				<?php echo"<a class='btn btn-sm btn-info pull-right delete_chat_btn' href='delete_chat.php?sender=".$sender_row["user_id"]."&receiver=".$receiver_row["user_id"]."'";
                    ?> >Delete chat</a>


                    
     				<div class="chat_div"  id="DIV_CHAT">
                    </div>
                    <div class="send_chat_msg">

	    				<textarea id="message" class="well msg_area" name="msg" placeholder="Hola Amigo!!!!"></textarea>
	                   
	                	<input id="sender" type="hidden" name="sender" value=<?php echo $sender; ?>>

	                	<input id="receiver" type="hidden" name="receiver" value=<?php echo $receiver; ?>>

	                	                	


	                	<div class="send_button">
	                		 <input id="Submit" type="button" class="btn btn-success btn-sm" value="Send" onclick="set_chat_msg()"/>
	                	</div>

          			</div>
          					<div class="col-md-offset-1 col-md-10"><?php echo"<a class='btn btn-sm btn-warning file_share' href='file_share.php?sender=".$sender_row["user_id"]."&receiver=".$receiver_row["user_id"]."&sender_role=".$sender_row["role"]."'";
                    ?> >Share image</a></div>
		    
	</div>

	</div>
</div>

<?php 
include_once "../$sender_role/footer.php";

?>
