<?php
  require('../connect_db.php');
  require('../login/auth.php');
  
$id=$_REQUEST['id'];
$query = "SELECT * from driver where id='".$id."'"; 
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
  <h2>Edit vehicle list</h2>
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
  </head>
  <body>
  <div class="form">

<?php
  $status = "";
  if(isset($_POST['new']) && $_POST['new']==1)
  {
  $id=$_REQUEST['id'];
  $vehicle_number =$_REQUEST['vehicle_number'];
  $date =$_REQUEST['date'];
  $driver_name =$_REQUEST['driver_name'];
  $payment =$_REQUEST['payment'];



  $update="update driver set vehicle_number='".$vehicle_number."',
  date='".$date."', driver_name='".$driver_name."', payment='".$payment."' where id='".$id."'";

  mysqli_query($con, $update) or die(mysqli_error());
  $status = "Record Updated Successfully. </br></br>
  <a href='driver_list.php'>View Updated list</a>";
  echo '<p style="color:#FF0000;">'.$status.'</p>';
  }else {
?>
  <div>
    <form name="form" method="post" action=""> 
    <input type="hidden" name="new" value="1" />
    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
    <p><input type="text" name="vehicle_number" placeholder="Enter vehicle number" 
    required value="<?php echo $row['vehicle_number'];?>" /></p>
    <p><input type="text" name="date" placeholder="Enter date" 
    required value="<?php echo $row['date'];?>" /></p>
    <p><input type="text" name="driver_name" placeholder="Enter driver name" 
    required value="<?php echo $row['driver_name'];?>" /></p>
    <p><input type="text" name="payment" placeholder="Enter payment" 
    required value="<?php echo $row['payment'];?>" /></p>
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