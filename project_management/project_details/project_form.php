<?php
/*
NEW.PHP
Allows user to create a new entry in the database
*/
// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
         // PERSONAL

function renderForm($project_name, $project_type, $cost, $start_date, $end_date, $error)
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
		<strong>Project name: *</strong> <input type="text" name="project_name" value="<?php echo $project_name; ?>" /><br/>
		<br>
		<strong>Type: *</strong> <input type="text" name="project_type" value="<?php echo $project_type; ?>" /><br/>
		<br>
		<strong>Cost: *</strong> <input type="text" name="cost" value="<?php echo $cost; ?>" /><br/>
		<br>
		<strong>Start date: *</strong> <input type="text" name="start_date" value="<?php echo $start_date; ?>" /><br/>
		<br>
		<strong>End date: *</strong> <input type="text" name="end_date" value="<?php echo $end_date; ?>" /><br/>
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
	$project_name = mysqli_real_escape_string($con, $_POST['project_name']);
	$project_type = mysqli_real_escape_string($con, $_POST['project_type']);
	$cost = mysqli_real_escape_string($con, $_POST['cost']);
	$start_date = mysqli_real_escape_string($con, $_POST['start_date']);
	$end_date = mysqli_real_escape_string($con, $_POST['end_date']);

	// check to make sure both fields are entered

if ($project_name == '' || $project_type == '' || $cost == '' || $start_date == '' || $end_date == '' )
	{
	// generate error message
		$error = 'ERROR: Please fill in all required fields!';
	// if either field is blank, display the form again
		renderForm($project_name, $project_type, $cost, $start_date, $end_date, $error);
	}
else
		{
		// save the data to the database
		mysqli_query($con, "INSERT project SET project_name='$project_name', project_type='$project_type', cost='$cost', start_date='$start_date', end_date='$end_date'")
		or die(mysqli_error($con));

		// once saved, redirect back to the view page
		//header("Location: project_form.php");
		}
}
else
		// if the form hasn't been submitted, display the form
		{
		renderForm('', '', '', '', '', '');
		}
?>



        