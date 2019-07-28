<?php
	require('../connect_db.php');
  	require('../login/auth.php');
	
$id=$_REQUEST['id'];
$query = "SELECT * from project where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Project management</title>

<link rel="stylesheet" type="text/css" href="../css/style.css"> 
<body>
	<header id="pageHeader"><h2>Customer Information Management System - CIMS</h2></header>
	<article id="mainArticle">
	<h2>Edit project</h2>
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
	</head>
	<body>
	<div class="form">

<?php
	$status = "";
	if(isset($_POST['new']) && $_POST['new']==1)
	{
	$id=$_REQUEST['id'];
	$project_name =$_REQUEST['project_name'];
	$project_type =$_REQUEST['project_type'];
	$cost =$_REQUEST['cost'];
	$start_date =$_REQUEST['start_date'];
	$end_date =$_REQUEST['end_date'];

	// $submittedby = $_SESSION["username"];
	$update="update project set project_name='".$project_name."',
	project_type='".$project_type."', cost='".$cost."',
	start_date='".$start_date."', end_date='".$end_date."'  where id='".$id."'";
	mysqli_query($con, $update) or die(mysqli_error());
	$status = "Record Updated Successfully. </br></br>
	<a href='project_list.php'>View Updated Record</a>";
	echo '<p style="color:#FF0000;">'.$status.'</p>';
	}else {
?>
	<div>
		<form name="form" method="post" action=""> 
		<input type="hidden" name="new" value="1" />
		<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
		<p><input type="text" name="project_name" placeholder="Enter Project Name" 
		required value="<?php echo $row['project_name'];?>" /></p>
		<p><input type="text" name="project_type" placeholder="Enter project_type" 
		required value="<?php echo $row['project_type'];?>" /></p>
		<p><input type="text" name="cost" placeholder="Enter cost" 
		required value="<?php echo $row['cost'];?>" /></p>
		<p><input type="text" name="start_date" placeholder="Enter start_date" 
		required value="<?php echo $row['start_date'];?>" /></p>
		<p><input type="text" name="end_date" placeholder="Enter end_date" 
		required value="<?php echo $row['end_date'];?>" /></p>
		<p><input name="submit" type="submit" value="Update" /></p>
		</form>
	<?php } ?>
	</div>
	</div>
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