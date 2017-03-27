<?php

include 'dbconnect.php';

$StudentID = $_REQUEST['StudentID'];
$StudentName = $_REQUEST['StudentName'];


?>

<form action="major.php">
  <input type="hidden" value = "<?php echo $StudentID ?>" name="StudentID">
  <input type="hidden" value = "<?php echo $StudentName ?>" name="StudentName">
  Major Name: <input type="text" name="MajorName"/><br>
  
  Type: <select name="Type">
  	<option value="Science">Science</option>
  	<option value="Humanity">Humanity</option>
  	<option value="SocialScience">SocialScience</option>
  	</select>
  <br>
  <input type="submit" value="Submit"/>
</form>

<form action="students.php">
<input type="submit" value="Return to Students">
</form>