<?php
  require('connect_db.php');
  require("login/auth.php");
?>

<!doctype html>
<title>Project management</title>

<link rel="stylesheet" type="text/css" href="css/style.css"> 

<body>
  <header id="pageHeader"><h2>Customer Information Management System - CIMS</h2></header>
  <article id="mainArticle">
  <h2>Dashboard</h2>
  </article>
  <nav id="mainNav">
    <nav class="sidenav">
    <ul class="main-buttons">
      <li>
         Project Details
         <ul class="hidden"> 
          <li><a href="project_details/project_form.php">Add New Project</a></li>
          <li><a href="project_details/project_list.php">Project List</a></li>
        </ul>
      </li>
      <li>
        Contractor 
        <ul class="hidden">
          <li><a href="contractor/contractor_form.php">Add New Contractor</a></li>
          <li><a href="contractor/contractor_list.php">Contractor List</a></li>
        </ul>
      </li>
      <li>
        Driver
        <ul class="hidden">
          <li><a href="driver/driver_form.php">Add New driver</a></li>
          <li><a href="driver/driver_list.php">Driver List</a></li>
        </ul>
      </li>
      <li>
         Fuel
         <ul class="hidden">
          <li><a href="fuel/fuel_name.php">Add fuel name</a></li>
          <li><a href="fuel/fuel_list.php">Fuel Type</a></li>
        </ul>
      </li>
      <li>
         Fuel Record
         <ul class="hidden">
          <li><a href="fuel_record/fuel_record_form.php">Add New fuel record</a></li>
          <li><a href="fuel_record/fuel_record_list.php">Fuel Report</a></li>
        </ul>
      </li>
      <li>
         Maintenance
         <ul class="hidden">
          <li><a href="maintenence_record/maintenence_form.php">Add New maintenance record</a></li>
          <li><a href="maintenence_record/maintenence_list.php">Maintenance List</a></li>
        </ul>
      </li>
      <li>
         Vehicle
         <ul class="hidden">
          <li><a href="vehicle/vehicle_form.php">Add New vehicle</a></li>
          <li><a href="vehicle/vehicle_list.php">Vechicle List</a></li>
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
        <li><b><a href="login/logout.php">logout</a></b>
        </ul>
      </li>
  </nav>
  </nav>
  <footer id="pageFooter"><center>Copy-left. Mandip's college project</center></footer>
</body>
</html>