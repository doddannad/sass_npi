<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
}
if ($_SESSION['admin_id']==1) {
	# code...
}
else {
	echo "<script>alert('Unauthorized Access')</script>";
	echo "<script>parent.location='index.php'</script>";
	exit();
}
?>