

<?php 
	include_once "header.php";
	

?>

		<div class="content">
			<div class="row">
				<div class="col-md-12 bg-info maincontent">
				 <strong><i>Home</i></strong><br><br><br>
				 <br>
				 <div class = "details">
				 Name : <?php echo $_SESSION["name"];?>
				 <br>

				<?php $userid= $_SESSION["user_id"];

				$qry = "Select * from user where user_id =".$userid;

				$result_user = mysqli_query($con,$qry);
				$row_user=mysqli_fetch_assoc($result_user);

				?>
				Email : <?php echo $row_user["email"];?>
				</div>
				</div>
			
			</div>

		</div>

<?php 
	include_once "footer.php";
?>