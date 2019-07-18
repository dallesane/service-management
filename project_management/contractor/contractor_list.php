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
			    <th>Contractor Name</th>
			    <th>Contact</th>
			    <th>Project name</th>
			    <th>Address</th>
			    <th>Machine list</th>
			    <th>Machine cost</th>
			    <th>Advance payment</th>
			  </tr> 
	    	
	   	
	    	<?php
	    	    $query = "SELECT * FROM contractor INNER JOIN project ON contractor.id=project.id ";

		        $result = mysqli_query($con, $query);
		  

			    if ($result) {

			        while($row = mysqli_fetch_array($result)) {
	    	            echo '<tr>';
	    	            echo '<td>'. $row['id'].'</td>';
	    	            echo '<td>'. $row['contractor_name'].'</td>';
	    	            echo '<td>'. $row['contact'].'</td>';
	    	            echo '<td>'. $row['project_name'].'</td>';
	    	            echo '<td>'. $row['address'].'</td>';
	    	            echo '<td>'. $row['machine_list'].'</td>';
	    	            echo '<td>'. $row['machine_cost'].'</td>';
	    	            echo '<td>'. $row['advance_payment'].'</td>';
	    	            echo '</tr>';

	    	        }
	    	    }  
	  			  	
	    	?>
	    		
	    </table>
	</body>

</html> 