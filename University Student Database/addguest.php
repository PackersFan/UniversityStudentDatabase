<?php

include 'dbconnect.php';

$StudentID = $_REQUEST['id'];



?>

<form action="guests.php">
  StudentID = <?php echo $StudentID ?><input type="hidden" value = <?php echo $StudentID ?> name="StudentID"></br>
  Name: <input type="text" name="GuestName"/><br>
  ID: <input type="number" name="GuestID"/><br>
  Address: <input type="text" name="GuestAddress"/><br>
  Phone: <input type="number" name="GuestPhone"/><br>
  <input type="submit" value="Submit"/>
</form>

<form action="students.php">
<input type="submit" value="Return to Students">
</form>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>