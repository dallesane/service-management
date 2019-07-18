<?php
/*
NEW.PHP
Allows user to create a new entry in the database
*/
// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
         // PERSONAL

function renderForm($vehicle_name, $vehicle_number, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
		<title>Add New project details</title>
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '')
	{
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}
?>

	<form action="" method="post">
	<div>
		<br>
		<strong>Vehicle name: *</strong> <input type="text" name="vehicle_name" value="<?php echo $vehicle_name; ?>" /><br/>
		<br>
		<strong>Vehicle number: *</strong> <input type="text" name="vehicle_number" value="<?php echo $vehicle_number; ?>" /><br/>
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
	$vehicle_name = mysqli_real_escape_string($con, $_POST['vehicle_name']);
	$vehicle_number = mysqli_real_escape_string($con, $_POST['vehicle_number']);

	// check to make sure both fields are entered

if ($vehicle_name == '' || $vehicle_number == '' )
	{
	// generate error message
		$error = 'ERROR: Please fill in all required fields!';
	// if either field is blank, display the form again
		renderForm($vehicle_name, $vehicle_number, $error);
	}
else
		{
		// save the data to the database
		mysqli_query($con, "INSERT vehicle SET vehicle_name='$vehicle_name', vehicle_number='$vehicle_number'")
		or die(mysqli_error($con));

		// once saved, redirect back to the view page
		//header("Location: project_form.php");
		}
}
else
		// if the form hasn't been submitted, display the form
		{
		renderForm('', '', '');
		}
?>



        