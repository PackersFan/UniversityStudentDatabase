<?php

include 'dbconnect.php';



?>

<form action="university.php">
  Name: <input type="text" name="UniversityName"/><br>
  State: <input type="text" name="State"/><br>
  Type: <input type="text" name="Type"/><br>
  <input type="submit" value="Submit"/>
</form>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>