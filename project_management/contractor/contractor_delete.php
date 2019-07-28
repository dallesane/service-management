<?php
	require('../connect_db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM contractor WHERE id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	header("Location: contractor_list.php"); 
?>