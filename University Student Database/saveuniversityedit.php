<?php

include 'dbconnect.php';

$OldName = $_REQUEST['OldName'];
$UniversityName = $_REQUEST['UniversityName'];
$State = $_REQUEST['State'];
$Type = $_REQUEST['Type'];

     
$sql = "UPDATE University SET Name='" . $UniversityName . "',State='" . $State . "',Type='" . $Type . "' WHERE Name='" . $OldName . "'";


$mysqli->query($sql);

?>

<script>
    window.location.href = "university.php"
</script>