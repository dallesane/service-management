<?php
  require('../connect_db.php');
  require('../login/auth.php');
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
  <h2>All contractor List</h2>
  <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
  <tr>
  <th><strong>Id</strong></th>
  <th><strong>Contractor Name</strong></th>
  <th><strong>contact</strong></th>
  <th><strong>Project name</strong></th>
  <th><strong>Address</strong></th>
  <th><strong>Machine list</strong></th>
  <th><strong>Machine cost</strong></th>
  <th><strong>Advance payment</strong></th>
  <th><strong>Edit</strong></th>
  <th><strong>Delete</strong></th>
  </tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM contractor c JOIN project p ON c.id=p.id;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
  <tr><td align="center"><?php echo $count; ?></td>
  <td align="center"><?php echo $row["contractor_name"]; ?></td>
  <td align="center"><?php echo $row["contact"]; ?></td>
  <td align="center"><?php echo $row["project_name"]; ?></td>
  <td align="center"><?php echo $row["address"]; ?></td>
  <td align="center"><?php echo $row["machine_list"]; ?></td>
  <td align="center"><?php echo $row["machine_cost"]; ?></td>
  <td align="center"><?php echo $row["advance_payment"]; ?></td>
  <td align="center">
  <a href="contractor_edit.php?id=<?php echo $row["id"]; ?>"><button>Edit</button></a>
  </td>
  <td align="center">
  <a href="contractor_delete.php?id=<?php echo $row["id"]; ?>"><button>Delete</button></a>
  </td>
  </tr>
    <?php $count++; } ?>
    </tbody>
    </table>
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