

<?php
include_once '..\config.php';
?>

<link rel="stylesheet" type="text/css" href=<?php echo $SITE_URL."/chat/css/chat_style.css"?>>
<?php 
	echo " <h3>Select your chat friend </h3>";

  $sender=$_GET["user_id"];  
$qry = "Select * from user where user_id !=".$sender;

$result_user = mysqli_query($con,$qry);
?>



<div class="row">
<div class="col-md-7">
<div class='friend_div'>


<?php
while ($row_user=mysqli_fetch_assoc($result_user)) {
	echo "<div class='outer_div well'>";
	echo "<div class='inner_div'>"."<img src='$SITE_URL/chat/img1.png' width=80px height=80px >"."<a href='$SITE_URL"."chat/start_chat.php?receiver={$row_user['user_id']}&sender=$sender'>".$row_user["name"]."<br>"."<div class='role'>User role:".$row_user["role"]."</div>"."</a>"."</div>";
	echo "</div>";

	}

	?>
	
</div>
</div><!--
<div class="col-md-3">
	<?php// include "start_chat.php";
?>

</div>-->
</div>


	
