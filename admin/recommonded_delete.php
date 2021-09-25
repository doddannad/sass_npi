<?php
include 'db_config.php';
$clearRecommonded=mysqli_query($db_connect,"TRUNCATE TABLE recommended_properties ");
if ($clearRecommonded) {
	echo "<script>alert('Cleared Recommonded Projects')</script>";
	echo "<script>parent.location='recomanded__recent_properties.php'</script>";
}
else {
	echo "<script>alert('Error Occured While Clearing Recommonded Projects')</script>";
	echo "<script>parent.location='recomanded__recent_properties.php'</script>";
}