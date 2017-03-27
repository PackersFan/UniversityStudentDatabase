<?php

include 'dbconnect.php';

$GuestName = $_REQUEST['GuestName'];
$GuestID = $_REQUEST['GuestID'];
$GuestAddress = $_REQUEST['GuestAddress'];
$GuestPhone = $_REQUEST['GuestPhone'];
$StudentID = $_REQUEST['StudentID'];

$sql = "INSERT INTO Guests (ID, Name, Address, Phone, StudentID) VALUES (" . $GuestID . ",'" . $GuestName . "','";
     $sql .= $GuestAddress . "'," . $GuestPhone  . "," . $StudentID . ")";

$mysqli->query($sql);

echo "<table border=1>";
echo "<tr><th>Guest ID</th><th>Name</th><th>Phone</th><th>Address</th><th>Student ID</th></tr>";
if ($result = $mysqli->query("SELECT * from Guests WHERE StudentID = '$StudentID'")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["ID"];
         echo "</td><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["Phone"];
	 echo "</td><td>";
         echo $row["Address"];
         echo "</td><td>";
         echo $row["StudentID"];
         echo "</td><td>";
          echo "<a href=deleteguest.php?GuestID=" . $row["ID"] . "><button>Delete Guest</button></a>";
         echo "</td></tr>";
    }
echo "</table>";    


}
	


?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>