<?php

include 'dbconnect.php';

$Room = $_REQUEST['Room'];
$BuildingName = $_REQUEST['BuildingName'];


$sql = "DROP VIEW IF EXISTS roommates";

$mysqli->query($sql); 

$sql = "CREATE VIEW roommates AS SELECT * FROM Student WHERE(Room = " . $Room ." AND Building = '" . $BuildingName . "')"; 


$mysqli->query($sql);


echo "<table border=1>";
echo "<tr><th>ID</th><th>Name</th><th>DOB</th><th>Major</th><th>Email</th><th>Phone</th><th>Building</th><th>Room</th></tr>";
if ($result = $mysqli->query("SELECT * FROM roommates")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         
         $name = str_replace(" ", "%20", $row["Building"]);
         echo "<tr><td>";
         echo $row["ID"];
         echo "</td><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["DOB"];
	 echo "</td><td>";
	 echo "<a href=addmajor.php?StudentID=" . $row['ID'] . "&StudentName=" . $row['Name'] . "><button>Add</button></a>";
         echo "<a href=major.php?StudentID=" . $row['ID'] . " ><button>View</button></a>";
	 echo "</td><td>";
         echo $row["Email"];
         echo "</td><td>";
         echo "<a href=addphone.php?id=" . $row['ID'] . "><button>Add</button></a>";
         echo "<a href=phone.php?StudentID=" . $row['ID'] . " ><button>View</button></a>";
         echo "</td><td>";
         echo $row["Building"];
         echo "</td><td>";
         echo $row["Room"];
         echo "</td><td>";
	 echo "<a href=deletestudent.php?StudentID=" . $row['ID'] . "><button>Delete Student</button></a>";
         echo "</td></tr>";
         

    }
    }

echo "</table>";    



?>


