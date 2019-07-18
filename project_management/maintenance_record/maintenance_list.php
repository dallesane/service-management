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
			    <th>Maintenance details</th>
			    <th>Date</th>
			    <th>Price</th>
			  </tr> 
	    	
	   	
	    	<?php
	    	    $query = "SELECT * FROM maintenance_record m JOIN vehicle v ON m.id=v.id";

		        $result = mysqli_query($con, $query);
		  

			    if ($result) {

			        while($row = mysqli_fetch_array($result)) {
	    	            echo '<tr>';
	    	            echo '<td>'. $row['id'].'</td>';
	    	            echo '<td>'. $row['vehicle_number'].'</td>';
	    	            echo '<td>'. $row['maintenence_details'].'</td>';
	    	            echo '<td>'. $row['date'].'</td>';
	    	            echo '<td>'. $row['price'].'</td>';
	    	            echo '</tr>';

	    	        }
	    	    }  
	  			  	
	    	?>
	    		
	    </table>
	</body>

</html> 