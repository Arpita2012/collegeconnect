<?php
include_once "..\config.php";
session_start();
if(isset($_SESSION["user_id"])){
    header("location:$SITE_URL");

}
 
    

// check if a file was submitted
if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try {
    $msg= upload();  //this will upload your image
    echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}

// the upload function

function upload() {
     
 require_once('dbconnect.php');
            $sender = $_POST["sender"];
     $receiver = $_POST["receiver"];
     $link =db_connect();
     
     $sender_role_qry="select role from user where user_id = $sender";
     $sender_role_result = mysqli_query($link,$sender_role_qry);
     $sender_role_row= mysqli_fetch_assoc($sender_role_result);
     $sender_role=$sender_role_row["role"];

      
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));

             

                    $sql="insert into test_image set sender=$sender , receiver=$receiver, name = '{$_FILES['userfile']['name']}',image ='{$imgData}' ";
                    //echo $sql;

                    // insert the image
                    mysqli_query($link,$sql) ;
                    $msg='<p>Image successfully saved in database </p>';
                    header("location:file_share.php?sender=".$sender."&receiver=".$receiver."&sender_role=".$sender_role);
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";

            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
            header("location:file_share.php?sender=".$sender."&receiver=".$receiver."&sender_role=".$sender_role."&Error=".$msg);

    return $msg;
}

// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>
</body>
</html>