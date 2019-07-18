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

			<table>
			  <tr>
			    <th>id</th>
			    <th>Vehicle number</th>
			    <th>Driver name</th>
			    <th>Date</th>
			    <th>Payment</th>
			  </tr> 
	    	
	   	
	    	<?php
	    	    $query = "SELECT * FROM driver INNER JOIN vehicle ON driver.id=vehicle.id";

		        $result = mysqli_query($con, $query);
		  

			    if ($result) {

			        while($row = mysqli_fetch_array($result)) {
	    	            echo '<tr>';
	    	            echo '<td>'. $row['id'].'</td>';
	    	            echo '<td>'. $row['vehicle_number'].'</td>';
	    	            echo '<td>'. $row['driver_name'].'</td>';
	    	            echo '<td>'. $row['date'].'</td>';
	    	            echo '<td>'. $row['payment'].'</td>';
	    	            echo '</tr>';

	    	        }
	    	    }  
	  			  	
	    	?>
	    		
	    </table>
	</body>

</html> 