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
  <h2>All maintenance record List</h2>
  <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
  <tr>
  <th><strong>Id</strong></th>
  <th><strong>Vehicle number</strong></th>
  <th><strong>Maintenance details</strong></th>
  <th><strong>Date</strong></th>
  <th><strong>Price</strong></th>
  <th><strong>Edit</strong></th>
  <th><strong>Delete</strong></th>
  </tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from maintenance_record m JOIN vehicle v ON m.vehicle_number=v.id;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
  <tr><td align="center"><?php echo $count; ?></td>
  <td align="center"><?php echo $row["vehicle_number"]; ?></td>
  <td align="center"><?php echo $row["maintenence_details"]; ?></td>
  <td align="center"><?php echo $row["date"]; ?></td>
  <td align="center"><?php echo $row["price"]; ?></td>
  <td align="center">
  <a href="maintenance_record_edit.php?id=<?php echo $row["id"]; ?>"><button>Edit</button></a>
  </td>
  <td align="center">
  <a href="maintenance_record_delete.php?id=<?php echo $row["id"]; ?>"><button>Delete</button></a>
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