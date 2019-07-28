<!doctype html>
<title>project management</title>

<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<body>
	<header id="pageHeader"><h2>Customer Information Management System - CIMS</h2></header>
	<article id="mainArticle">
	<h2>Add new project</h2>
    <?php
	/*
	NEW.PHP
	Allows user to create a new entry in the database
	*/
	// creates the new record form
	// since this form is used multiple times in this file, I have made it a function that is easily reusable
	         // PERSONAL

	function renderForm($vehicle_number, $fuel_name, $amount, $quantity, $error)
	{
	?>
	<head>
		<title>Add New fuel record</title>
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
			<strong>Vehicle number: *</strong> <input type="text" name="vehicle_number" value="<?php echo $vehicle_number; ?>" /><br/>
			<br>
			<strong>Fuel name: *</strong> <input type="text" name="fuel_name" value="<?php echo $fuel_name; ?>" /><br/>
			<br>
			<strong>Amount: *</strong> <input type="text" name="amount" value="<?php echo $amount; ?>" /><br/>
			<br>
			<strong>Quantity: *</strong> <input type="text" name="quantity" value="<?php echo $quantity; ?>" /><br/>
			<br>
			<p>* required</p>
	 
			<input type="submit" name="submit" value="Submit">

		</div>
		</form>
	</body>
	<?php
	}

	// connect to the database
	include('../connect_db.php');
	// check if the form has been submitted. If it has, start to process the form and save it to the database

	if (isset($_POST['submit']))

		{
		// get form data, making sure it is valid
		$vehicle_number = mysqli_real_escape_string($con, $_POST['vehicle_number']);
		$fuel_name = mysqli_real_escape_string($con, $_POST['fuel_name']);
		$amount = mysqli_real_escape_string($con, $_POST['amount']);
		$quantity = mysqli_real_escape_string($con, $_POST['quantity']);

		// check to make sure both fields are entered

	if ($vehicle_number == '' || $fuel_name == '' || $amount == '' || $quantity == '')
		{
		// generate error message
			$error = 'ERROR: Please fill in all required fields!';
		// if either field is blank, display the form again
			renderForm($vehicle_number, $fuel_name, $amount, $quantity, $error);
		}
	else
			{
			// save the data to the database
			mysqli_query($con, "INSERT fuel_record SET vehicle_number='$vehicle_number', fuel_name='$fuel_name', amount='$amount', quantity='$quantity'")
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

	</article>
  	<nav id="mainNav">
    <nav class="sidenav">
    <ul class="main-buttons">
      <li>
         Project Details
         <ul class="hidden"> 
          <li><a href="../project_details/project_form.php">Add New</a></li>
          <li><a href="../project_details/project_list.php">Project List</a></li>
        </ul>
      </li>
      <li>
        Contractor 
        <ul class="hidden">
          <li><a href="../contractor/contractor_form.php">Add New</a></li>
          <li><a href="../contractor/contractor_list.php">Contractor List</a></li>
        </ul>
      </li>
      <li>
        Driver
        <ul class="hidden">
          <li><a href="../driver/driver_form.php">Add New</a></li>
          <li><a href="../driver/driver_list.php">Driver List</a></li>
        </ul>
      </li>
      <li>
         Fuel
         <ul class="hidden">
          <li><a href="../fuel/fuel_name.php">Add New</a></li>
          <li><a href="../fuel/fuel_list.php">Fuel Type</a></li>
        </ul>
      </li>
      <li>
         Fuel Record
         <ul class="hidden">
          <li><a href="../fuel_record/fuel_record_form.php">Add New</a></li>
          <li><a href="../fuel_record/fuel_record_list.php">Fuel Report</a></li>
        </ul>
      </li>
      <li>
         Maintenance
         <ul class="hidden">
          <li><a href="../maintenance_record/maintenance_form.php">Add New</a></li>
          <li><a href="../maintenance_record/maintenance_list.php">Maintenance List</a></li>
        </ul>
      </li>
      <li>
         Vehicle
         <ul class="hidden">
          <li><a href="../vehicle/vehicle_form.php">Add New</a></li>
          <li><a href="../vehicle/vehicle_list.php">Vechicle List</a></li>
        </ul>
        </li>
        </ul>
    </nav>
    </nav>
  <footer id="pageFooter"><center>Copy-left. Mandip's college project</center></footer>
</body>
</html> 