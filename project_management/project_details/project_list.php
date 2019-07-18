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

</html> 