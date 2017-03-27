<?php

include 'dbconnect.php';

$BuildingName = $_REQUEST['BuildingName'];

$mysqli->query("DELETE FROM Building WHERE Name='"  . $BuildingName ."'");

echo "DELETE FROM Building WHERE Name='" . $BuildingName . "'";



?>

<script>
window.location = 'university.php';
</script>