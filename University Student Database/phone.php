<?php

include 'dbconnect.php';

$StudentID = $_REQUEST['StudentID'];
$Number = $_REQUEST['Number'];
$Type = $_REQUEST['Type'];
$Carrier = $_REQUEST['Carrier'];

$sql = "INSERT INTO Phone (StudentID, Number, Type, Carrier) VALUES (" . $StudentID . ",'" . $Number . "','";
     $sql .= $Type . "','" . $Carrier  . "')";

$mysqli->query($sql);



echo "<table border=1>";
echo "<tr><th>Number</th><th>Type</th><th>Carrier</th></tr>";
if ($result = $mysqli->query("SELECT * from Phone WHERE StudentID = '$StudentID'")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["Number"];
         echo "</td><td>";
         echo $row["Type"];
         echo "</td><td>";
         echo $row["Carrier"];
         echo "</td><td>";
         echo "<a href=editphone.php><button>Edit Phone</button></a>";
         echo "<a href=deletephone.php><button>Delete Phone</button></a>";
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