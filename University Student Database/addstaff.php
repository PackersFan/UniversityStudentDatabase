<?php

include 'dbconnect.php';

$BuildingName = $_REQUEST['BuildingName'];


?>

<form action="staff.php">
  Name: <input type="text" name="StaffName"/><br>
  Position: <select name="Position">
  	<option value="DA">Desk Assistant</option>
  	<option value="RA">Resident Assistant</option>
  	<option value="RHD">Residence Hall Director</option>
  	<option value="ARHD"> Assistant Residence Hall Director</option>
  	</select>
  <br>
  ID: <input type="number" name="ID"/><br>
  Email: <input type="text" name="Email"/><br>
  <input type="hidden" value="<?php echo $BuildingName ?>" name="BuildingName">
  <input type="submit" value="Submit"/>
</form>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>