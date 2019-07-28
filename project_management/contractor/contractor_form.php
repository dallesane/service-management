<?php
  require('../connect_db.php');
  require('../login/auth.php');
?>
<!doctype html>
<title>project management</title>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>
  <header id="pageHeader"><h2>Customer Information Management System - CIMS</h2></header>
  <article id="mainArticle">
  <h2>Add new contractor</h2>
  <?php

    /*
    NEW.PHP
    Allows user to create a new entry in the database
    */
    // creates the new record form
    // since this form is used multiple times in this file, I have made it a function that is easily reusable
             // PERSONAL

    function renderForm($contractor_name, $contact, $project_name, $address, $machine_list, $machine_cost, $advance_payment, $error)
    {
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
    <head>
    		<title>Add New contractor details</title>
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
    		<strong>Contractor name: *</strong> <input type="text" name="contractor_name" value="<?php echo $contractor_name; ?>" /><br/>
    		<br>
    		<strong>Contact: *</strong> <input type="text" name="contact" value="<?php echo $contact; ?>" /><br/>
    		<br>
    		<strong>Project name: *</strong> <input type="text" name="project_name" value="<?php echo $project_name; ?>" /><br/>
    		<br>
    		<strong>Address: *</strong> <input type="text" name="address" value="<?php echo $address; ?>" /><br/>
    		<br>
    		<strong>Machine list: *</strong> <input type="text" name="machine_list" value="<?php echo $machine_list; ?>" /><br/>
    		<br>
    		<strong>Machine cost: *</strong> <input type="text" name="machine_cost" value="<?php echo $machine_cost; ?>" /><br/>
    		<br>
    		<strong>Advance payment: *</strong> <input type="text" name="advance_payment" value="<?php echo $advance_payment; ?>" /><br/>
    		<br>
    		<p>* required</p>
    		<br>
     
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
    	$contractor_name = mysqli_real_escape_string($con, $_POST['contractor_name']);
    	$contact = mysqli_real_escape_string($con, $_POST['contact']);
    	$project_name = mysqli_real_escape_string($con, $_POST['project_name']);
    	$address = mysqli_real_escape_string($con, $_POST['address']);
    	$machine_list = mysqli_real_escape_string($con, $_POST['machine_list']);
    	$machine_cost = mysqli_real_escape_string($con, $_POST['machine_cost']);
    	$advance_payment = mysqli_real_escape_string($con, $_POST['advance_payment']);

    	// check to make sure both fields are entered

    if ($contractor_name == '' || $contact == '' || $project_name == '' || $address == '' || $machine_list == '' || $machine_cost == '' || $advance_payment == '')
    	{
    	// generate error message
    		$error = 'ERROR: Please fill in all required fields!';
    	// if either field is blank, display the form again
    		renderForm($contractor_name, $contact, $project_name, $address, $machine_list, $machine_cost, $advance_payment, $error);
    	}
    else
    		{
    		// save the data to the database
    		mysqli_query($con, "INSERT contractor SET contractor_name='$contractor_name', contact='$contact', project_name='$project_name', address='$address', machine_list='$machine_list', machine_cost='$machine_cost', advance_payment='$advance_payment'")
    		or die(mysqli_error($con));

    		print("Contractor details saved successfully !!");

    		// once saved, redirect back to the view page
    		//header("Location: project_form.php");
    		}
    }
    else
    		// if the form hasn't been submitted, display the form
    		{
    		renderForm('', '', '', '', '', '', '', '');
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