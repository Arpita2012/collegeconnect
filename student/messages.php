<?php 
	include_once "header.php";
	//include_once "header.php";
	//require_once "header.php";

?>

		<div class="content">
			<div class="row">
				<div class="col-md-12 bg-info mymaincontent">
						<b><?php echo $_SESSION["name"]; ?></b>
					<?php  echo file_get_contents("$SITE_URL/chat/chat.php?user_id=".$_SESSION["user_id"]);
					?>

 				</div>
			
			</div>

		</div>

<?php 
	require "footer.php";
?>