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
			    <th>Fuel name</th>
			    <th>Date</th>
			    <th>Quantity</th>
			    <th>Amount</th>
			  </tr> 
	    	
	   	
	    	<?php
	    	    $query = "SELECT * FROM fuel_record f JOIN vehicle v ON f.vehicle_number=v.id JOIN fuel l ON f.id=l.id";

		        $result = mysqli_query($con, $query);
		  

			    if ($result) {

			        while($row = mysqli_fetch_array($result)) {
	    	            echo '<tr>';
	    	            echo '<td>'. $row['id'].'</td>';
	    	            echo '<td>'. $row['vehicle_number'].'</td>';
	    	            echo '<td>'. $row['fuel_name'].'</td>';
	    	            echo '<td>'. $row['date'].'</td>';
	    	            echo '<td>'. $row['quantity'].'</td>';
	    	            echo '<td>'. $row['amount'].'</td>';
	    	            echo '</tr>';

	    	        }
	    	    }  
	  			  	
	    	?>
	    		
	    </table>
	</body>

</html> 