<?php

include 'dbconnect.php';

$UniversityName = $_REQUEST['University'];
$Type = $_REQUEST['Type'];
$State = $_REQUEST['State'];

?>

<form action="saveuniversityedit.php">
  <input type="hidden" name="OldName" value="<?php echo $UniversityName ?>"/><br>
  Name: <input type="text" name="UniversityName" value="<?php echo $UniversityName ?>"/><br>
  State: <input type="text" name="State"  value="<?php echo $State ?>"/><br>
  Type: <input type="text" name="Type"  value="<?php echo $Type ?>"/><br>
  <input type="submit" value="Submit"/>
</form>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

