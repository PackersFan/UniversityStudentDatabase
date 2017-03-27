<?php

include 'dbconnect.php';

$StudentID = $_REQUEST['id'];



?>

<form action="phone.php">
  <input type="hidden" value = <?php echo $StudentID ?> name="StudentID"></br>
  Number: <input type="text" name="Number"/><br>
  
  Type: <select name="Type">
  	<option value="Work">Work</option>
  	<option value="Mobile">Mobile</option>
  	<option value="Home">Home</option>
  	</select>
  <br>
  
  Carrier: <select name="Carrier">
  	<option value="Verizon">Verizon</option>
  	<option value="Sprint">Sprint</option>
  	<option value="AT&T">AT&T</option>
  	<option value="T-Mobile">T-Mobile</option>
  	<option value="Other">Other</option>
	</select>
  <input type="submit" value="Submit"/>
</form>

<form action="students.php">
<input type="submit" value="Return to Students">
</form>

