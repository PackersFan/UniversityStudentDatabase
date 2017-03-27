<?php

include 'dbconnect.php';

$StudentID = $_REQUEST['StudentID'];
$StudentName = $_REQUEST['StudentName'];
$Type = $_REQUEST['Type'];
$MajorName = $_REQUEST['MajorName'];

IF($MajorName != ''){
$sql = "INSERT INTO Major (StudentID, StudentName, Type, Name) VALUES (" . $StudentID . ",'" . $StudentName . "','";
     $sql .= $Type . "','" . $MajorName  . "')";

$mysqli->query($sql);
}


echo "<table border=1>";
echo "<tr><th>Major Name</th><th>Type</th></tr>";
if ($result = $mysqli->query("SELECT * from Major WHERE StudentID = '$StudentID'")) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
         echo "<tr><td>";
         echo $row["Name"];
         echo "</td><td>";
         echo $row["Type"];
         echo "</td><td>";
         echo "<a href=editmajor.php><button>Edit Major</button></a>";
         echo "<a href=deletemajor.php><button>Delete Major</button></a>";
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