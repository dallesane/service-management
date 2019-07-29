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
	<h2>Add new materials</h2>
    <?php
	/*
	NEW.PHP
	Allows user to create a new entry in the database
	*/
	// creates the new record form
	// since this form is used multiple times in this file, I have made it a function that is easily reusable
	         // PERSONAL

	function renderForm($item_name, $unit, $price, $error)
	{
	?>

	<head>
		<title>Add New materials details</title>
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
			<strong>Item name: *</strong> <input type="text" name="item_name" value="<?php echo $item_name; ?>" /><br/>
			<br>
			<strong>Unit: *</strong> <input type="text" name="unit" value="<?php echo $unit; ?>" /><br/>
			<br>
			<strong>Price: *</strong> <input type="text" name="price" value="<?php echo $price; ?>" /><br/>
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
		$item_name = mysqli_real_escape_string($con, $_POST['item_name']);
		$unit = mysqli_real_escape_string($con, $_POST['unit']);
		$price = mysqli_real_escape_string($con, $_POST['price']);

		// check to make sure both fields are entered

	if ($item_name == '' || $unit == '' || $price == '' )
		{
		// generate error message
			$error = 'ERROR: Please fill in all required fields!';
		// if either field is blank, display the form again
			renderForm($item_name, $unit, $price, $error);
		}
	else
			{
			// save the data to the database
			mysqli_query($con, "INSERT materials SET item_name='$item_name', unit='$unit', price='$price'")
			or die(mysqli_error($con));

			print("Materials details saved successfully !!");

			// once saved, redirect back to the view page
			// header("Location: project_form.php");
			}
	}
	else
			// if the form hasn't been submitted, display the form
			{
			renderForm('', '', '', '');
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