<?php
	require('../connect_db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM driver WHERE id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: driver_list.php"); 
?>