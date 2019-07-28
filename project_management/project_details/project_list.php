<?php
    include("../connect_db.php");
?>
<html>
	<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
			}

			td, th {
			    border: 1px solid #dddddd;
			    text-align: left;
			    padding: 8px;
			}

			tr:nth-child(even) {
			    background-color: #dddddd;
			}
	</style>			
	<body>
	<style>
		table, th, td {
		    border: 3px solid black;
		}
	</style>

	<title>Project management</title>

	<link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<body>
	<header id="pageHeader"><h2>Customer Information Management System - CIMS</h2></header>
	<article id="mainArticle">
  	<h2>Project list</h2>	

		<table>
		<tr>
			<th>id</th>
		    <th>Name</th>
		    <th>Project Type</th>
		    <th>Project Cost</th>
		    <th>Start Date</th>
		    <th>End Date</th>
		</tr> 
	    	
	    <?php
	    	$query = "SELECT * FROM project";

		    $result = mysqli_query($con, $query);  

			if ($result) {

		        while($row = mysqli_fetch_array($result)) {
	   	            echo '<tr>';
	   	            echo '<td>'. $row['id'].'</td>';
	   	            echo '<td>'. $row['project_name'].'</td>';
	   	            echo '<td>'. $row['project_type'].'</td>';
    	            echo '<td>'. $row['cost'].'</td>';
    	            echo '<td>'. $row['start_date'].'</td>';
    	            echo '<td>'. $row['end_date'].'</td>';
    	            echo '</tr>';

	    	        }
	    	    }  	  			  	
	    	?>
	    </table>
	</body>

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