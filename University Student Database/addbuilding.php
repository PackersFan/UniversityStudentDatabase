<?php

include 'dbconnect.php';

$UniversityName = $_REQUEST['name'];
$name = str_replace(" ", "%20", $UniversityName);


?>

<form action="building.php">
  <input type="hidden" value="<?php echo $UniversityName ?>" name="University"><br>
  Name: <input type="text" name="BuildingName"/><br>
  Location: <input type="text" name="Location"/><br>
  Number of Students: <input type="text" name="NumStudents"/><br>
  Number of Rooms: <input type="text" name="NumRooms"/><br>
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