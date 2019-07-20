<?php
    include("connect_db.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Project details</title>
  </head>
  <body>
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
		</div>

		<div class="container">
		<header>
		   <h1><center>Project details</h1>
		</header>
		  
		<nav>
		  <ul>
		  <div class="topnav">	
		  	<br>
		    <li><a href="project_details/project_form.php">Add new project</a></li>
		    <br>
		    <li><a href="contractor/contractor_form.php">Add new Contractor</a></li>
		    <br>
		    <li><a href="driver/driver_form.php">Add new driver</a></li>
		    <br>
		    <li><a href="fuel_record/fuel_record_form.php">Add Fuel record</a></li>
		    <br>
		    <li><a href="vehicle/vehicle_form.php">Add vehicle</a></li>
		    <br>
		    <li><a href="maintenance_record/maintenance_form.php">Add maintenance record</a>
		    </li>
		    <br>
		    <li><a href="project_record/project_list.php">All project list</a>
		    </li>
			
		  </div>  
		  </ul>
		</nav>
		</div>

			<table>
			  <tr>
			    <th>id</th>
			    <th>Project name</th>
			    <th>Project type</th>
			    <th>Total cost</th>
			    <th>Start date</th>
			    <th>End date</th>
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
</html>
