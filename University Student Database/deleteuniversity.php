<?php

include 'dbconnect.php';

$UniversityName = $_REQUEST['UniversityName'];

$mysqli->query("DELETE FROM University WHERE Name='"  . $UniversityName ."'");

echo "DELETE FROM University WHERE Name='"  . $UniversityName ."'";




?>

<script>
window.location = 'university.php';
</script>