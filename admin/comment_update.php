<?php
include 'prevent.php';
include 'db_config.php';
if(isset($_POST["commentApprove_id"]))  
 {  
 	$query = "UPDATE tbl_comment SET comment_aprov_status='1' WHERE comment_id = '".$_POST["commentApprove_id"]."'";  
 	$result = mysqli_query($db_connect, $query);  
 }
else if(isset($_POST["commentReject_id"]))  
 {  
 	$query = "UPDATE tbl_comment SET comment_aprov_status='0' WHERE comment_id = '".$_POST["commentReject_id"]."'";  
 	$result = mysqli_query($db_connect, $query);  
 }

 else if(isset($_POST["commentDelete_id"]))  
 {  
 	$query = "DELETE FROM tbl_comment WHERE comment_id = '".$_POST["commentDelete_id"]."'";  
 	$result = mysqli_query($db_connect, $query);
 }
?>