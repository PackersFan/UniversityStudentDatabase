<?php

include 'dbconnect.php';

$UniversityName = $_REQUEST['University'];
$name = str_replace(" ", "%20", $UniversityName);
$BuildingName = $_REQUEST['BuildingName'];
$Location = $_REQUEST['Location'];
$NumRooms = $_REQUEST['NumRooms'];
$NumStudents = $_REQUEST['NumStudents'];


?>

<form action="building.php">
  <input type="hidden" value="<?php echo $UniversityName ?>" name="University"><br>
  Name: <input type="text" name="BuildingName" value="<?php echo $BuildingName ?>"/><br>
  Location: <input type="text" name="Location" value="<?php echo $Location ?>"/><br>
  Number of Students: <input type="text" name="NumStudents" value="<?php echo $NumStudents ?>"/><br>
  Number of Rooms: <input type="text" name="NumRooms" value="<?php echo $NumRooms ?>"/><br>
  <input type="submit" value="Submit"/>
</form>

<form action="building.php">
<input type="submit" value="Return to Buildings">
</form>

<form action="university.php">
<input type="submit" value="Return to University">
</form>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>