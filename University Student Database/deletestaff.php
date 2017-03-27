<?php

include 'dbconnect.php';

$StaffID = $_REQUEST['StaffID'];

$mysqli->query("DELETE FROM Staff WHERE ID="  . $StaffID);







?>

<script>
window.location = 'university.php';
</script>