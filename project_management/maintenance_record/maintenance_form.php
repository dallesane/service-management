<?php
/*
NEW.PHP
Allows user to create a new entry in the database
*/
// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
         // PERSONAL

function renderForm($vehicle_number, $maintenence_details, $date, $price, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
		<title>Add New maintenance details</title>
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}
?>
	
	<br>

		    <strong>Vechile number: *</strong><?php echo $vehicle_number; ?><b/>
		    
			<select name="vehicle_number">
		    <option selected="selected" value="">Select vehicle number</option>
		    <?php 
		   
		        $query = "SELECT * FROM vehicle";

		        $result = mysqli_query($con, $query);
		  

			    if ($result) {
			      while($row = mysqli_fetch_array($con, $result)) {
					// do something with the $row
			        
			      	if ($vehicle_number == $row['id']){

			      		echo '<option selected="selected" value="'.$row['id'].'">"'.$row['vehicle_number'].'"</option>';
			      		
			      	}else{

			      		echo '<option value="'.$row['id'].'">"'.$row['vehicle_number'].'"</option>';
			      	}
			      }
			    }
			    else {
			      echo mysqli_error($con);
			    }
		    ?>

	<form action="" method="post">
	<div>
		<br>
		<br>
		<strong>Maintenance details: *</strong> <input type="text" name="maintenence_details" value="<?php echo $maintenence_details; ?>" /><br/>
		<br>
		<strong>Date: *</strong> <input type="text" name="date" value="<?php echo $date; ?>" /><br/>
		<br>
		<strong>Price: *</strong> <input type="text" name="price" value="<?php echo $price; ?>" /><br/>
		<br>
		<p>* required</p>
 
		<input type="submit" name="submit" value="Submit">

	</div>
	</form>
</body>
</html>
<?php
}

// connect to the database
include('../connect_db.php');
// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

	{
	// get form data, making sure it is valid
	$vehicle_number = mysqli_real_escape_string($con, $_POST['vehicle_number']);
	$maintenence_details = mysqli_real_escape_string($con, $_POST['maintenence_details']);
	$date = mysqli_real_escape_string($con, $_POST['date']);
	$price = mysqli_real_escape_string($con, $_POST['price']);

	// check to make sure both fields are entered

if ($vehicle_number == '' || $maintenence_details == '' || $date == '' || $price == '')
	{
	// generate error message
		$error = 'ERROR: Please fill in all required fields!';
	// if either field is blank, display the form again
		renderForm($vehicle_number, $maintenence_details, $date, $price, $error);
	}
else
		{
		// save the data to the database
		mysqli_query($con, "INSERT maintenance_record SET vehicle_number='$vehicle_number', maintenence_details='$maintenence_details', date='$date', price='$price'")
		or die(mysqli_error($con));

		// once saved, redirect back to the view page
		//header("Location: project_form.php");
		}
}
else
		// if the form hasn't been submitted, display the form
		{
		renderForm('', '', '', '', '');
		}
?>



        