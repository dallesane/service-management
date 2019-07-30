<?php
  require('../connect_db.php');
  require('../login/auth.php');
?>

<!doctype html>
<title>Project management</title>

<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script> -->
<body>
	<header id="pageHeader"><h2>Customer Information Management System - CIMS</h2></header>
	<article id="mainArticle">
	<h2>Add new materials supply</h2>
    <?php
	/*
	NEW.PHP
	Allows user to create a new entry in the database
	*/
	// creates the new record form
	// since this form is used multiple times in this file, I have made it a function that is easily reusable
	         // PERSONAL

	function renderForm($ordered_date, $supplied_date, $contractor_name, $item_name, $price, $status, $error)
	{
	?>

	<head>
		<title>Request for New materials</title>
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
			<strong>Ordered date: *</strong> <input type="text" name="ordered_date" value="<?php echo $ordered_date; ?>" /><br/>
			<br>
			<strong>supplied date: *</strong> <input type="text" name="supplied_date" value="<?php echo $supplied_date; ?>" /><br/>
			<br>
			<strong>Contractor name: *</strong> <input type="text" name="contractor_name" value="<?php echo $contractor_name; ?>" /><br/>
			<br>
			<strong>Item name: *</strong> <input type="text" name="item_name" value="<?php echo $item_name; ?>" /><br/>
			<br>
			<strong>Price: *</strong> <input type="text" name="price" value="<?php echo $price; ?>" /><br/>
			<br>
			<strong>Status: *</strong> <input type="text" name="status" value="<?php echo $status; ?>" /><br/>
			<br>
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
		$ordered_date = mysqli_real_escape_string($con, $_POST['ordered_date']);
		$supplied_date = mysqli_real_escape_string($con, $_POST['supplied_date']);
		$contractor_name = mysqli_real_escape_string($con, $_POST['contractor_name']);	
		$item_name = mysqli_real_escape_string($con, $_POST['item_name']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$status = mysqli_real_escape_string($con, $_POST['status']);

		// check to make sure both fields are entered

	if ($ordered_date== '' || $supplied_date == '' || $contractor_name == '' || $item_name == '' || $price == '' || $status == '' )
		{
		// generate error message
			$error = 'ERROR: Please fill in all required fields!';
		// if either field is blank, display the form again
			renderForm($ordered_date, $supplied_date, $contractor_name, $item_name, $price, $status, $error);
		}
	else
			{
			// save the data to the database
			mysqli_query($con, "INSERT materials_supply SET ordered_date='$ordered_date', supplied_date='$supplied_date', contractor_name='$contractor_name', item_name='$item_name', price='$price', status='$status'")
			or die(mysqli_error($con));

			print("Materials order and supply details saved successfully !!");

			// once saved, redirect back to the view page
			// header("Location: project_form.php");
			}
	}
	else
			// if the form hasn't been submitted, display the form
			{
			renderForm('', '', '', '', '', '', '');
			}
	?>

  	</article>
  	<nav id="mainNav">
    <nav class="sidenav">
    <ul class="main-buttons">
      <li>
         Project Details
         <ul class="hidden"> 
          <li><a href="../project_details/project_form.php">Add New Project</a></li>
          <li><a href="../project_details/project_list.php">Project List</a></li>
        </ul>
      </li>
      <li>
        Contractor 
        <ul class="hidden">
          <li><a href="../contractor/contractor_form.php">Add New contractor</a></li>
          <li><a href="../contractor/contractor_list.php">Contractor List</a></li>
        </ul>
      </li>
      <li>
        Driver
        <ul class="hidden">
          <li><a href="../driver/driver_form.php">Add New driver</a></li>
          <li><a href="../driver/driver_list.php">Driver List</a></li>
        </ul>
      </li>
      <li>
         Fuel
         <ul class="hidden">
          <li><a href="../fuel/fuel_name.php">Add fuel name</a></li>
          <li><a href="../fuel/fuel_list.php">Fuel Type</a></li>
        </ul>
      </li>
      <li>
         Fuel Record
         <ul class="hidden">
          <li><a href="../fuel_record/fuel_record_form.php">Add New fuel record</a></li>
          <li><a href="../fuel_record/fuel_record_list.php">Fuel Report</a></li>
        </ul>
      </li>
      <li>
         Maintenance
         <ul class="hidden">
          <li><a href="../maintenance_record/maintenance_form.php">Add New maintenance record</a></li>
          <li><a href="../maintenance_record/maintenance_list.php">Maintenance List</a></li>
        </ul>
      </li>
      <li>
         Vehicle
         <ul class="hidden">
          <li><a href="../vehicle/vehicle_form.php">Add New vehicle</a></li>
          <li><a href="../vehicle/vehicle_list.php">Vechicle List</a></li>
        </ul>
      </li>
      <li>
         Materials 
         <ul class="hidden">
          <li><a href="materials/materials_form.php">Add New materials</a></li>
          <li><a href="materials/materials_list.php">View all materials List</a></li>
        </ul>
      </li>
      <li>
         Materials order and supply
         <ul class="hidden">
          <li><a href="materials_supply/materials_supply_form.php">Add New materials order or supply</a></li>
          <li><a href="materials_supply/materials_supply_list.php">Materials order and supply</a></li>
        </ul>
      </li>
    </ul>
      <ul class="hidden">
      <li><b><a href="../login/logout.php">logout</a></b>
    </ul>
    </li>
    </nav>
    </nav>
  <footer id="pageFooter"><center>Copy-left. Mandip's college project</center></footer>
</body>
</html> 