<?php
	require('../connect_db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM vehicle WHERE id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: vehicle_list.php"); 
?>