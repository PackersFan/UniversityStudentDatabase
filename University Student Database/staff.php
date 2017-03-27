<?php

include 'dbconnect.php';


     $StaffName = $_REQUEST['StaffName'];
     $ID = $_REQUEST['ID'];
     $Position = $_REQUEST['Position'];
     $Email = $_REQUEST['Email'];
     $BuildingName = $_REQUEST['BuildingName'];

     $sql = "INSERT INTO Staff (ID, Name, Position, Email, Building) VALUES (" . $ID . ",'" . $StaffName . "','";
     $sql .= $Position . "','" . $Email . "','" . $BuildingName . "')";


     $mysqli->query($sql);
     

echo "<table border=1>";
echo "<tr><th>ID</th><th>Name</th><th>Position</th><th>Email</th><th>Building</th></tr>";
if ($result = $mysqli->query("SELECT * from Staff WHERE Building = '$BuildingName'")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["ID"];
         echo "</td><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["Position"];
	 echo "</td><td>";
         echo $row["Email"];
         echo "</td><td>";
         echo $row["Building"];
         echo "</td><td>";
         echo "<a href=editstaff.php><button>Edit Staff</button></a>";
         echo "<a href=deletestaff.php?StaffID=" . $row["ID"] . "><button>Delete Staff</button></a>";
         echo "</td></tr>";
         

    }
    }

echo "</table>";    



?>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>