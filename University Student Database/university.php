<?php

include 'dbconnect.php';

$UniversityName = $_REQUEST['UniversityName'];
$State = $_REQUEST['State'];
$Type = $_REQUEST['Type'];

IF($UniversityName != ''){ 
     $sql = "INSERT INTO University (Name, State, Type) VALUES ('" . $UniversityName . "','" . $State . "','";
     $sql .= $Type . "')";

     $mysqli->query($sql);
     }


echo "<table border=1>";
echo "<tr><th>Name</th><th>State</th><th>Type</th></tr>";
if ($result = $mysqli->query("SELECT * from University")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    	
         $name = str_replace(" ", "%20", $row["Name"]);
         echo "<tr><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["State"];
         echo "</td><td>";
         echo $row["Type"];
	 echo "</td><td>";
	 echo "<a href=building.php?University=" . $name . "><button>View Buildings</button></a>";
       	 echo "</td><td>";
	 echo "<a href=addbuilding.php?name=" . $name . "><button>Add Building</button></a>";
	 echo "</td><td>";
	 echo "<a href=edituniversity.php?University=" . $name . "&State=" . $row['State'] . "&Type=" . $row['Type'] . "><button>Edit University</button></a>";
	 echo "<a href=deleteuniversity.php?UniversityName=" . $name . "><button>Delete University</button></a>";
         echo "</td></tr>";
         

    }
    }


echo "<table border=1>";

?>

<a href=adduniversity.php><button>Add University</button></a>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>