<?php
	require('../connect_db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM fuel_record WHERE id=$id"; 
	$result = mysqli_query($con,$query) or die (mysqli_error());
	header("Location: fuel_record_list.php"); 
?>