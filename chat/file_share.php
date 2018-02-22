<?php
 
 require_once('dbconnect.php');

 

     $link =db_connect();
     $sender = $_GET["sender"];
     $receiver = $_GET["receiver"];
     $sender_role=$_GET["sender_role"];



include_once "../$sender_role/header.php";
 ?>
 <link rel="stylesheet" type="text/css" href="css/chat_style.css">
<div class="mymaincontent">
		<form class="file_form" action ="savefile.php" enctype="multipart/form-data" method="post">
			
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" >
			<input id="sender" type="hidden" name="sender" value=<?php echo $sender; ?>>
			<input id="receiver" type="hidden" name="receiver" value=<?php echo $receiver; ?>>
			<label>Choose image file:<input name="userfile" type="file" ></label>
			<input type="submit" value="Submit" class="btn btn-primary" >

			<?php 
			 if(isset($_GET["Error"])){
			 	echo "<br>".$_GET["Error"];

			 	}?>

		</form>


		<?php

    
 

 
 if(isset($_GET['sender'])) {
  
 	$sql="select * from test_image where ( sender= $sender and receiver = $receiver ) or(sender= $receiver and receiver = $sender) order by datetime desc";


     $result = mysqli_query($link,$sql) ;


     $num = mysqli_num_rows($result);

if($num>=1)
   { while ($img_result = mysqli_fetch_array($result)){


	    	 $sender_qry="select * from user where user_id = ".$img_result['sender'];
			$sender_result = mysqli_query($link,$sender_qry);
	        $sender_row= mysqli_fetch_assoc($sender_result);
			 $sender_name=$sender_row["name"];
			     
    	 echo "<h3>Image name : ".$img_result["name"]."</h3>";
    	 echo "<h5> Shared by : ".$sender_name."</h5><b> on</b> <div class='img_datetime'>".$img_result["datetime"]."</div><br>";

    	
    	echo '<img src="data:image/png;base64,'.base64_encode($img_result["image"]).'" width=400px ; alt="error in image display">';
    	echo "<br><b>-------------------------------------------------------------------------------------------------------------------------------------<b><br>";
    	 
    	  //echo "<img src = '{$row_img["image"]}' width ='200px' height = '200px'><br>";$row_img = mysqli_fetch_assoc($result)
    	
     }


 }
 else "<h5> No images shared </h5>";
}

?>
	

</div>
<?php
include_once "../$sender_role/footer.php";
?>